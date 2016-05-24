<?php
namespace Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Newsletter\Model\Entity\CampaignsMailingList;

/**
 * CampaignsMailingLists Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Campaigns
 * @property \Cake\ORM\Association\BelongsTo $MailingLists
 */
class CampaignsMailingListsTable extends Table
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

        $this->table('campaigns_mailing_lists');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Campaigns', [
            'foreignKey' => 'campaign_id',
            'joinType' => 'INNER',
            'className' => 'Newsletter.Campaigns'
        ]);
        $this->belongsTo('MailingLists', [
            'foreignKey' => 'mailing_list_id',
            'joinType' => 'INNER',
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
        $rules->add($rules->existsIn(['campaign_id'], 'Campaigns'));
        $rules->add($rules->existsIn(['mailing_list_id'], 'MailingLists'));
        return $rules;
    }
}
