<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enrol Entity
 *
 * @property int $id
 * @property int $enrolment_id
 * @property int $lfmclass_id
 * @property string|null $attendance
 *
 * @property \App\Model\Entity\Enrolment $enrolment
 * @property \App\Model\Entity\Lfmclass $lfmclass
 */
class Enrol extends Entity
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
        'enrolment_id' => true,
        'lfmclass_id' => true,
        'attendance' => true,
        'enrolment' => true,
        'lfmclass' => true
    ];
}
