<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Location Entity
 *
 * @property int $Id
 * @property string $name
 * @property string $street_address
 * @property string $suburb
 * @property int $post_code
 * @property string|null $note
 *
 * @property \App\Model\Entity\Classlfm[] $classlfm
 */
class Location extends Entity
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
        'name' => true,
        'street_address' => true,
        'suburb' => true,
        'post_code' => true,
        'note' => true,
        'classlfm' => true
    ];
}
