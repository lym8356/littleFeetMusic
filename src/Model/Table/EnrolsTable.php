<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Enrols Model
 *
 * @property \App\Model\Table\EnrolmentsTable&\Cake\ORM\Association\BelongsTo $Enrolments
 * @property \App\Model\Table\LfmclassesTable&\Cake\ORM\Association\BelongsTo $Lfmclasses
 *
 * @method \App\Model\Entity\Enrol get($primaryKey, $options = [])
 * @method \App\Model\Entity\Enrol newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Enrol[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Enrol|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enrol saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Enrol patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Enrol[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Enrol findOrCreate($search, callable $callback = null, $options = [])
 */
class EnrolsTable extends Table
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

        $this->setTable('enrols');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Enrolments', [
            'foreignKey' => 'enrolment_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Lfmclasses', [
            'foreignKey' => 'lfmclass_id',
            'joinType' => 'INNER'
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
            ->scalar('attendance')
            ->allowEmptyString('attendance');

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
        $rules->add($rules->existsIn(['enrolment_id'], 'Enrolments'));
        $rules->add($rules->existsIn(['lfmclass_id'], 'Lfmclasses'));

        return $rules;
    }
}
