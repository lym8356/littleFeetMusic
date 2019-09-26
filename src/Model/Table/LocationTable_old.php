<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Location Model
 *
 * @property \App\Model\Table\ClasslfmTable&\Cake\ORM\Association\HasMany $Classlfm
 *
 * @method \App\Model\Entity\Location get($primaryKey, $options = [])
 * @method \App\Model\Entity\Location newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Location[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Location|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Location patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Location[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Location findOrCreate($search, callable $callback = null, $options = [])
 */
class LocationTable extends Table
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

        $this->setTable('location');
        $this->setDisplayField('name');
        $this->setPrimaryKey('Id');

        $this->hasMany('Classlfm', [
            'foreignKey' => 'location_id'
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
            ->integer('Id')
            ->allowEmptyString('Id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        $validator
            ->scalar('street address')
            ->maxLength('street address', 50)
            ->allowEmptyString('street address');

        $validator
            ->scalar('suberb')
            ->maxLength('suberb', 20)
            ->requirePresence('suberb', 'create')
            ->notEmptyString('suberb');

        $validator
            ->integer('post_code')
            ->requirePresence('post_code', 'create')
            ->notEmptyString('post_code');

        $validator
            ->scalar('note')
            ->maxLength('note', 100)
            ->allowEmptyString('note');

        return $validator;
    }
}
