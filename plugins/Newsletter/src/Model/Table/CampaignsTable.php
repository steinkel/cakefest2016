<?php
namespace Newsletter\Model\Table;

use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\I18n\Time;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Utility\Hash;
use Cake\Utility\Text;
use Cake\Validation\Validator;
use Newsletter\Model\Entity\Campaign;

/**
 * Campaigns Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Templates
 * @property \Cake\ORM\Association\HasMany $Logs
 * @property \Cake\ORM\Association\BelongsToMany $MailingLists
 */
class CampaignsTable extends Table
{
    use MailerAwareTrait;
    const STATUSES = ['new', 'in-progress', 'completed'];


    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('campaigns');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Templates', [
            'foreignKey' => 'template_id',
            'joinType' => 'INNER',
            'className' => 'Newsletter.Templates',
            'conditions' => ['Templates.active' => true],
        ]);
        $this->hasMany('Logs', [
            'foreignKey' => 'campaign_id',
            'className' => 'Newsletter.Logs'
        ]);
        $this->belongsToMany('MailingLists', [
            'foreignKey' => 'campaign_id',
            'targetForeignKey' => 'mailing_list_id',
            'joinTable' => 'campaigns_mailing_lists',
            'className' => 'Newsletter.MailingLists'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('status', 'create')
            ->inList('status', self::STATUSES, __('Invalid status, please use one of the following options: {0}', Text::toList(self::STATUSES, __('or'))))
            ->add('status', 'inProgressOnlyWeekdays', [
                'rule' => function ($value, $context) {
                    return $value !== 'in-progress';
                },
                'on' => function ($context) {
                    $now = Time::now();
                    return ($now->isSaturday() || $now->isSunday());
                },
                'message' => __('Campaigns can only be set as in-progress in work days')
            ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['template_id'], 'Templates'));
        $rules->add(function ($campaign) {
            $mailingListIds = Hash::extract($campaign, 'mailing_lists.{n}.id');
            if (empty($mailingListIds)) {
                return false;
            }
            $query = TableRegistry::get('MailingListsUsers')->find()
                ->where(['mailing_list_id IN' => $mailingListIds]);
            return $query->count() > 0;
        }, 'notEmptyUsers', [
            'errorField' => 'mailing_lists',
            'message' => __d('Newsletter', 'Selected mailing lists do not have associated users, please select at least one mailing list with users.')
        ]);
        return $rules;
    }

    public function send($id)
    {
        $campaign = $this->get($id, [
            'contain' => ['Templates' => function (Query $query) {
                return $query->find('translations');
            }]
        ]);
        //first approach, using containable
        $query = $this->MailingLists->Users->find('campaignUniqueUsers', ['campaign_id' => $id]);
        //check unique #1 :(
        $users = $query->hydrate(false)->toArray();
        foreach ($users as $user) {
            $this->emailMerge($campaign, $user);
        }
    }

    public function emailMerge(Campaign $campaign, $user = [])
    {
        $localizedTemplate = $campaign->template->translation($user['locale']);
        if ($localizedTemplate->isNew()) {
            $localizedTemplate = $campaign->template;
        }
        $subjectTemplate = $localizedTemplate['subject'];
        $bodyTemplate = $localizedTemplate['body'];
        $this->getMailer('Newsletter.Campaign')->send('merge', compact('user', 'subjectTemplate', 'bodyTemplate'));
    }
}
