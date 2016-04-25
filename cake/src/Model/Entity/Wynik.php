<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wynik Entity.
 *
 * @property int $id_wynik
 * @property int $konto_id
 * @property \App\Model\Entity\Konto $konto
 * @property int $zestaw_id
 * @property \App\Model\Entity\Zestaw $zestaw
 * @property \Cake\I18n\Time $data_wynik
 * @property int $wynik_wynik
 */
class Wynik extends Entity
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
        'id_wynik' => false,
    ];
}
