<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Classlfm Entity
 *
 * @property int $id
 * @property string $age_group
 * @property int $location_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property int $week_length
 * @property \Cake\I18n\FrozenTime $start_time
 * @property int $duration
 * @property int $capacity
 * @property int $cost_per_class
 * @property string $overflow
 * @property string|null $note
 *
 * @property \App\Model\Entity\Location $location
 */
class Classlfm extends Entity
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
        'age_group' => true,
        'location_id' => true,
        'start_date' => true,
        'week_length' => true,
        'start_time' => true,
        'duration' => true,
        'capacity' => true,
        'cost_per_class' => true,
        'overflow' => true,
        'note' => true,
        'location' => true
    ];
}