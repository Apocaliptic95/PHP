<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Jezyk Entity.
 *
 * @property int $id_jezyk
 * @property string $nazwa_jezyk
 * @property \App\Model\Entity\Slowo[] $slowo
 */
class Jezyk extends Entity
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
        'id_jezyk' => false,
    ];
}
