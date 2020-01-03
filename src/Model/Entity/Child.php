<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Child Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property \Cake\I18n\FrozenDate $dob
 * @property string|null $note
 *
 * @property \App\Model\Entity\Enrolment[] $enrolments
 * @property \App\Model\Entity\User[] $users
 */
class Child extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'dob' => true,
        'note' => true,
        'enrolments' => true,
        'users' => true
    ];
}
