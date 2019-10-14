<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Lfmclass Entity
 *
 * @property int $id
 * @property int|null $term_id
 * @property int|null $week_no
 * @property float|null $price
 * @property \Cake\I18n\FrozenDate|null $class_date
 *
 * @property \App\Model\Entity\Term $term
 */
class Lfmclass extends Entity
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
        'terms_id' => true,
        'week_no' => true,
        'price' => true,
        'class_date' => true,
        'term' => true
    ];
}
