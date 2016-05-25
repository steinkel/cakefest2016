<?php
namespace Newsletter\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Newsletter\Model\Entity\Template;

/**
 * Templates Model
 *
 * @property \Cake\ORM\Association\HasMany $Campaigns
 */
class TemplatesTable extends Table
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

        $this->table('templates');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Campaigns', [
            'foreignKey' => 'template_id',
            'className' => 'Newsletter.Campaigns'
        ]);
        $this->hasMany('NewCampaigns', [
            'foreignKey' => 'template_id',
            'className' => 'Newsletter.Campaigns',
            'conditions' => ['NewCampaigns.status' => 'new']
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
            ->requirePresence('subject', 'create')
            ->notEmpty('subject');

        $validator
            ->requirePresence('body', 'create')
            ->notEmpty('body');

        $validator
            ->boolean('active')
            ->allowEmpty('active');

        return $validator;
    }
}
