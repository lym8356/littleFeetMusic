<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Class Model
 *
 * @method \App\Model\Entity\Clas get($primaryKey, $options = [])
 * @method \App\Model\Entity\Clas newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Clas[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Clas|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clas saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Clas patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Clas[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Clas findOrCreate($search, callable $callback = null, $options = [])
 */
class ClassTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->setTable('class');
        $this->addBehavior('Timestamp');
    }

    public function buildRules(RulesChecker $rules)
    {

        return $rules;
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
            ->notBlank('location')
            ->notBlank('start_date')
            ->notBlank('start_time')
            ->notBlank('duration')
            ->notBlank('capacity')
            ->notBlank('cost');


        return $validator;
    }


}
