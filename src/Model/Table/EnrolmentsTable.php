<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enrolments Model
 *
 * @property \App\Model\Table\LfmclassesTable&\Cake\ORM\Association\BelongsTo $Lfmclasses
 * @property \App\Model\Table\ChildsTable&\Cake\ORM\Association\BelongsTo $Childs
 *
 * @method \App\Model\Entity\Enrolment get($primaryKey, $options = [])
 * @method \App\Model\Entity\Enrolment newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Enrolment[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enrolment|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enrolment saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enrolment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Enrolment[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enrolment findOrCreate($search, callable $callback = null, $options = [])
 */
class EnrolmentsTable extends Table
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

        $this->setTable('enrolments');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Lfmclasses', [
            'foreignKey' => 'lfmclasses_id'
        ]);
        $this->belongsTo('Childs', [
            'foreignKey' => 'child_id'
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
            ->allowEmptyString('id', null, 'create');

        $validator
            ->date('enrolment_date')
            ->allowEmptyDate('enrolment_date');

        $validator
            ->time('enrolment_time')
            ->allowEmptyTime('enrolment_time');

        $validator
            ->scalar('enrolment_type')
            ->maxLength('enrolment_type', 20)
            ->allowEmptyString('enrolment_type');

        $validator
            ->scalar('enrolment_status')
            ->maxLength('enrolment_status', 20)
            ->allowEmptyString('enrolment_status');

        $validator
            ->numeric('enrolment_cost')
            ->allowEmptyString('enrolment_cost');

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
        $rules->add($rules->existsIn(['lfmclasses_id'], 'Lfmclasses'));
        $rules->add($rules->existsIn(['child_id'], 'Childs'));

        return $rules;
    }
}