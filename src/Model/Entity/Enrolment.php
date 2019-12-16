<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enrolment Entity
 *
 * @property int $id
 * @property string|null $enrolment_type
 * @property string|null $enrolment_status
 * @property float|null $enrolment_cost
 * @property int $lfmclasses_id
 * @property int $guardian_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property int $child_id
 *
 * @property \App\Model\Entity\Class $class
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Child $child
 */
class Enrolment extends Entity
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
        'enrolment_type' => true,
        'enrolment_status' => true,
        'enrolment_cost' => true,
        'lfmclasses_id' => true,
        'guardian_id' => true,
        'created' => true,
        'modified' => true,
        'child_id' => true,
        'class' => true,
        'user' => true,
        'child' => true
    ];
}
