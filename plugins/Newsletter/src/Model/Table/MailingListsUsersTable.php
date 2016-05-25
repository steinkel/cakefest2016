<?php
namespace Newsletter\Model\Table;

use Cake\Event\Event;
use Cake\Log\Log;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Newsletter\Model\Entity\MailingListsUser;

/**
 * MailingListsUsers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $MailingLists
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class MailingListsUsersTable extends Table
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

        $this->table('mailing_lists_users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('MailingLists', [
            'foreignKey' => 'mailing_list_id',
            'joinType' => 'INNER',
            'className' => 'Newsletter.MailingLists'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn(['mailing_list_id'], 'MailingLists'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        return $rules;
    }

    public function afterSave(Event $event, MailingListsUser $entity, $options)
    {
        $user = $this->Users->get($entity['user_id']);
        $mailingList = $this->MailingLists->get($entity['mailing_list_id']);
        $message = sprintf('(++) %s was subscribed to mailing list "%s"', $user['email'], $mailingList['name']);
        Log::info($message, 'subscription');
    }
}
