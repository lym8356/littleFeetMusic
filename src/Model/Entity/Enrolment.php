<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Enrolment Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $enrolment_date
 * @property \Cake\I18n\FrozenTime|null $enrolment_time
 * @property string|null $enrolment_type
 * @property string|null $enrolment_status
 * @property float|null $enrolment_cost
 * @property int|null $terms_id
 *
 * @property \App\Model\Entity\Lfmclass $lfmclass
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
        'enrolment_date' => true,
        'enrolment_time' => true,
        'enrolment_type' => true,
        'enrolment_status' => true,
        'enrolment_cost' => true,
        'terms_id' => true,
        'lfmclass' => true,
        'child' => true
    ];
}
