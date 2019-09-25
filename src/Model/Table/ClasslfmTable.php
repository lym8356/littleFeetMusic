<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classlfm Model
 *
 * @property \App\Model\Table\LocationTable&\Cake\ORM\Association\BelongsTo $Location
 *
 * @method \App\Model\Entity\Classlfm get($primaryKey, $options = [])
 * @method \App\Model\Entity\Classlfm newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Classlfm[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Classlfm|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classlfm saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classlfm patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Classlfm[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Classlfm findOrCreate($search, callable $callback = null, $options = [])
 */
class ClasslfmTable extends Table
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

        $this->setTable('classlfm');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Location', [
            'foreignKey' => 'location_id',
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
            ->scalar('age_group')
            ->maxLength('age_group', 50)
            ->requirePresence('age_group', 'create')
            ->notEmptyString('age_group');

        $validator
            ->date('start_date')
            ->requirePresence('start_date', 'create')
            ->notEmptyDate('start_date');

        $validator
            ->integer('week_length')
            ->requirePresence('week_length', 'create')
            ->notEmptyString('week_length');

        $validator
            ->time('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyTime('start_time');

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->integer('capacity')
            ->requirePresence('capacity', 'create')
            ->notEmptyString('capacity');

        $validator
            ->integer('cost_per_class')
            ->requirePresence('cost_per_class', 'create')
            ->notEmptyString('cost_per_class');

        $validator
            ->scalar('overflow')
            ->notEmptyString('overflow');

        $validator
            ->scalar('note')
            ->maxLength('note', 100)
            ->allowEmptyString('note');

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
        $rules->add($rules->existsIn(['location_id'], 'Location'));

        return $rules;
    }
}