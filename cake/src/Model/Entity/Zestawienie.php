<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Zestawienie Entity.
 *
 * @property int $id_zestawienie
 * @property int $slowo_id
 * @property \App\Model\Entity\Slowo $slowo
 * @property int $zestaw_id
 * @property \App\Model\Entity\Zestaw $zestaw
 */
class Zestawienie extends Entity
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
        '*' => true,
        'id_zestawienie' => false,
    ];
}
