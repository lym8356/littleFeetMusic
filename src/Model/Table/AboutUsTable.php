<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AboutUs Model
 *
 * @method \App\Model\Entity\AboutU get($primaryKey, $options = [])
 * @method \App\Model\Entity\AboutU newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\AboutU[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AboutU|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AboutU saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AboutU patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AboutU[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\AboutU findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AboutUsTable extends Table
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

        $this->setTable('about_us');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('heading')
            ->maxLength('heading', 100)
            ->requirePresence('heading', 'create')
            ->notEmptyString('heading');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('body')
            ->allowEmptyString('body');

        $validator
            ->scalar('title2')
            ->maxLength('title2', 500)
            ->requirePresence('title2', 'create')
            ->notEmptyString('title2');

        $validator
            ->scalar('body2')
            ->allowEmptyString('body2');

        return $validator;
    }
}
