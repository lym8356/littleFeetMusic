<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;
use Cake\Auth\DefaultPasswordHasher;

class UsersTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['username'],
            'This username already exists'));
        return $rules;
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmptyArray('name', 'Please Enter Full Name')
            ->requirePresence('name');
        return $validator;
    }

    public function validationUpdate($validator)
    {
        $validator
            ->notEmpty('name')
            ->requirePresence('name');


        $validator
            ->notEmpty('username')
            ->requirePresence('username')
            ->lengthBetween('username', [4,10]);

        //password confirm
        $validator
            ->notEmpty('password')
            ->requirePresence('password')
            ->add('password', [
                    'minLength' => [
                    'rule' => ['minLength', 6],
                    'last' => false,
                    'message' => 'Password should be at least 6 characters long.'
                    ],
                    'maxLength' => ['rule' => ['maxLength', 16],
                    'message' => 'Password cannot exceed 16 characters.'
                    ]
            ])

            ->add('confirm_password', 'no-misspelling', [
                'rule' => ['compareWith', 'password'],
                'message' => 'Password does not match'
            ]);


        //check email
        $validator
            ->notEmpty('email')
            ->requirePresence('email')
            ->add('email', 'valid', [
                'rule' => 'email',
                'message' => 'Please enter a valid email'
            ]);

        $validator
            ->notEmpty('phone')
            ->requirePresence('phone');
        return $validator;
    }

    public function validationLogin($validator)
    {
        
    }

}
