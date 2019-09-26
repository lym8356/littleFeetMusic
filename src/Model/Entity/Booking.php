<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Booking Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $booking_date
 * @property \Cake\I18n\FrozenTime|null $booking_time
 * @property string|null $booking_type
 * @property string|null $booking_status
 * @property float|null $booking_cost
 * @property int|null $class_id
 * @property int|null $child_id
 *
 * @property \App\Model\Entity\Classlfm $classlfm
 * @property \App\Model\Entity\Child $child
 */
class Booking extends Entity
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
        'booking_date' => true,
        'booking_time' => true,
        'booking_type' => true,
        'booking_status' => true,
        'booking_cost' => true,
        'class_id' => true,
        'child_id' => true,
        'classlfm' => true,
        'child' => true
    ];
}
