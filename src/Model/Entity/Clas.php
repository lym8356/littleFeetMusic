<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Clas Entity
 *
 * @property int $id
 * @property string $location
 * @property \Cake\I18n\FrozenTime $start_time
 * @property int $duration
 * @property int $capacity
 * @property int $cost
 */
class Clas extends Entity
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
        'location' => true,
        'start_time' => true,
        'duration' => true,
        'capacity' => true,
        'cost' => true
    ];
}
