<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Slowo Entity.
 *
 * @property int $id_slowo
 * @property int $jezyk_id
 * @property \App\Model\Entity\Jezyk $jezyk
 * @property string $nazwa_slowo
 * @property \App\Model\Entity\Zestawienie[] $zestawienie
 */
class Slowo extends Entity
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
        'id_slowo' => false,
    ];
}
