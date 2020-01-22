<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bookus Entity
 *
 * @property int $id
 * @property string|null $heading
 * @property string|null $paragraph1
 * @property string|null $title1
 * @property string|null $paragraph2
 */
class Bookus extends Entity
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
        'heading' => true,
        'paragraph1' => true,
        'title1' => true,
        'paragraph2' => true
    ];
}
