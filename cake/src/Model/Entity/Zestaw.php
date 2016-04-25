<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Zestaw Entity.
 *
 * @property int $id_zestaw
 * @property int $konto_id
 * @property \App\Model\Entity\Konto $konto
 * @property int $jezyk_id_one
 * @property int $jezyk_id_two
 * @property int $podkategoria_id
 * @property \App\Model\Entity\Podkategorium $podkategorium
 * @property string $nazwa_zestaw
 * @property int $ilosc_slowek_zestaw
 * @property \Cake\I18n\Time $data_edycji_zestaw
 * @property bool $prywatny_zestaw
 * @property \App\Model\Entity\Wynik[] $wynik
 * @property \App\Model\Entity\Zestawienie[] $zestawienie
 */
class Zestaw extends Entity
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
        'id_zestaw' => false,
    ];
}
