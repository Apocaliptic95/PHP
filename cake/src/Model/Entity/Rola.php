<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rola Entity.
 *
 * @property int $id_rola
 * @property string $nazwa_rola
 * @property string $opis_rola
 * @property \App\Model\Entity\Konto[] $konto
 */
class Rola extends Entity
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
        'id_rola' => false,
    ];
}
