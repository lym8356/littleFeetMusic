<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UsersChild Entity
 *
 * @property int $id
 * @property int $child_id
 * @property int $user_id
 * @property string $relationship
 *
 * @property \App\Model\Entity\Child $child
 * @property \App\Model\Entity\User $user
 */
class UsersChild extends Entity
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
        'child_id' => true,
        'user_id' => true,
        'relationship' => true,
        'child' => true,
        'user' => true
    ];
}
