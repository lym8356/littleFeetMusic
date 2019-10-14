<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Terms Model
 *
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\Term get($primaryKey, $options = [])
 * @method \App\Model\Entity\Term newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Term[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Term|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Term saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Term patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Term[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Term findOrCreate($search, callable $callback = null, $options = [])
 */
class TermsTable extends Table
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

        $this->setTable('terms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Lfmclasses', [
            'foreignKey' => 'terms.id'
        ])->setDependent(true);
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
            ->date('end_date')
            ->requirePresence('end_date', 'create')
            ->notEmptyDate('end_date');

        $validator
            ->integer('week_length')
            ->requirePresence('week_length', 'create')
            ->notEmptyString('week_length');

        $validator
            ->time('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyTime('start_time');

        $validator
            ->time('end_time')
            ->requirePresence('end_time', 'create')
            ->notEmptyTime('end_time');

        $validator
            ->integer('duration')
            ->requirePresence('duration', 'create')
            ->notEmptyString('duration');

        $validator
            ->integer('capacity')
            ->requirePresence('capacity', 'create')
            ->notEmptyString('capacity');

        $validator
            ->numeric('casual_rate')
            ->notEmptyString('casual_rate');

        $validator
            ->boolean('overflow')
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
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
