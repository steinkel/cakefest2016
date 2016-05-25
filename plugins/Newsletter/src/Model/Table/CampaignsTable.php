<?php
namespace Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
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
             ->inList('status', self::STATUSES, __('Invalid status, please use one of the following options: {0}', Text::toList(self::STATUSES, __('or'))));

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
        return $rules;
    }
}
