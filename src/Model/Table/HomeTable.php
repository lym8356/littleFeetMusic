<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Home Model
 *
 * @method \App\Model\Entity\Home get($primaryKey, $options = [])
 * @method \App\Model\Entity\Home newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Home[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Home|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Home saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Home patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Home[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Home findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HomeTable extends Table
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

        $this->setTable('home');
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
            ->allowEmptyString('heading');

        $validator
            ->scalar('title')
            ->maxLength('title', 100)
            ->allowEmptyString('title');

        $validator
            ->scalar('p')
            ->requirePresence('p', 'create')
            ->notEmptyString('p');

        $validator
            ->scalar('p2')
            ->allowEmptyString('p2');

        $validator
            ->scalar('p3')
            ->allowEmptyString('p3');

        $validator
            ->scalar('p4')
            ->allowEmptyString('p4');

        $validator
            ->scalar('p5')
            ->allowEmptyString('p5');

        $validator
            ->scalar('p6')
            ->allowEmptyString('p6');

        $validator
            ->scalar('p7')
            ->allowEmptyString('p7');

        $validator
            ->scalar('p8')
            ->allowEmptyString('p8');

        $validator
            ->scalar('p9')
            ->allowEmptyString('p9');

        return $validator;
    }
}
