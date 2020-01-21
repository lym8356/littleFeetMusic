<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Home Entity
 *
 * @property int $id
 * @property string|null $heading
 * @property string|null $title
 * @property string $p
 * @property string|null $p2
 * @property string|null $p3
 * @property string|null $p4
 * @property string|null $p5
 * @property string|null $p6
 * @property string|null $p7
 * @property string|null $p8
 * @property string|null $p9
 * @property \Cake\I18n\FrozenTime|null $created
 */
class Home extends Entity
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
        'title' => true,
        'p' => true,
        'p2' => true,
        'p3' => true,
        'p4' => true,
        'p5' => true,
        'p6' => true,
        'p7' => true,
        'p8' => true,
        'p9' => true,
        'created' => true
    ];
}
