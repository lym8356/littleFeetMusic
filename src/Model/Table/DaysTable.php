<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Days Model
 *
 * @method \App\Model\Entity\Day get($primaryKey, $options = [])
 * @method \App\Model\Entity\Day newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Day[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Day|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Day saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Day patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Day[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Day findOrCreate($search, callable $callback = null, $options = [])
 */
class DaysTable extends Table
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

        $this->setTable('days');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');
        $this->hasMany('Terms', [
            'foreignKey' => 'day_id'
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
            ->allowEmptyString('id');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        return $validator;
    }
}
