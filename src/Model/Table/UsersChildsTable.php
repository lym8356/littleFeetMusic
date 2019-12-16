<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * UsersChilds Model
 *
 * @property \App\Model\Table\ChildsTable&\Cake\ORM\Association\BelongsTo $Childs
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\UsersChild get($primaryKey, $options = [])
 * @method \App\Model\Entity\UsersChild newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\UsersChild[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\UsersChild|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersChild saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\UsersChild patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\UsersChild[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\UsersChild findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersChildsTable extends Table
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

        $this->setTable('users_childs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Childs', [
            'foreignKey' => 'child_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
            ->scalar('relationship')
            ->maxLength('relationship', 50)
            ->requirePresence('relationship', 'create')
            ->notEmptyString('relationship');

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
        $rules->add($rules->existsIn(['child_id'], 'Childs'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
