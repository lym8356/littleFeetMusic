<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lfmclasses Model
 *
 * @property \App\Model\Table\TermsTable&\Cake\ORM\Association\BelongsTo $Terms
 *
 * @method \App\Model\Entity\Lfmclass get($primaryKey, $options = [])
 * @method \App\Model\Entity\Lfmclass newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Lfmclass[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Lfmclass|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lfmclass saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Lfmclass patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Lfmclass[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Lfmclass findOrCreate($search, callable $callback = null, $options = [])
 */
class LfmclassesTable extends Table
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

        $this->setTable('lfmclasses');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Terms', [
            'foreignKey' => 'terms_id'
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
            ->integer('week_no')
            ->allowEmptyString('week_no');

        $validator
            ->numeric('price')
            ->allowEmptyString('price');

        $validator
            ->date('class_date')
            ->allowEmptyDate('class_date');

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
        $rules->add($rules->existsIn(['terms_id'], 'Terms'));

        return $rules;
    }
}
