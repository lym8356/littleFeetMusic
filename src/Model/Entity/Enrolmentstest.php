<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enrolmentstest Entity
 *
 * @property int $id
 * @property int $child_id
 * @property int $term_id
 * @property int $guardian_id
 * @property string|null $enrolment_type
 * @property string|null $enrolment_status
 * @property float|null $enrolment_cost
 * @property string|null $payment_method
 * @property string|null $comment
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Child $child
 * @property \App\Model\Entity\Term $term
 */
class Enrolmentstest extends Entity
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
        'term_id' => true,
        'guardian_id' => true,
        'enrolment_type' => true,
        'enrolment_status' => true,
        'enrolment_cost' => true,
        'payment_method' => true,
        'comment' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'child' => true,
        'term' => true
    ];
}