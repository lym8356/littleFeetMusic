<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\RulesChecker;

class BookingTable extends Table
{

    public function initialize(array $config)
    {
        $this->addBehavior('Timestamp');
    }

    public function buildRules(RulesChecker $rules)
    {

        return $rules;
    }

    public function validationDefault(Validator $validator)
    {
        $validator;
//            ->notEmptyArray('name', 'Please Enter Full Name')
//            ->requirePresence('name');
        return $validator;
    }


    public function validationUpdate_booking($validator)
    {
        $validator
            ->notEmpty('name')
            ->requirePresence('name');

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
            ->requirePresence('phone')
            ->numeric('phone', 'Please enter only numbers.');

        return $validator;
    }

}
