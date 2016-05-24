<?php
namespace Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Newsletter\Model\Entity\MailingList;

/**
 * MailingLists Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Campaigns
 * @property \Cake\ORM\Association\BelongsToMany $Users
 */
class MailingListsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('mailing_lists');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('Campaigns', [
            'foreignKey' => 'mailing_list_id',
            'targetForeignKey' => 'campaign_id',
            'joinTable' => 'campaigns_mailing_lists',
            'className' => 'Newsletter.Campaigns'
        ]);
        $this->belongsToMany('Users', [
            'foreignKey' => 'mailing_list_id',
            'targetForeignKey' => 'user_id',
            'joinTable' => 'mailing_lists_users',
            'className' => 'Newsletter.Users'
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

        return $validator;
    }
}
