<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Konto Entity.
 *
 * @property int $id_konto
 * @property int $rola_id
 * @property \App\Model\Entity\Rola $rola
 * @property string $imie_konto
 * @property string $nazwisko_konto
 * @property string $email_konto
 * @property string $login_konto
 * @property string $haslo_konto
 * @property \App\Model\Entity\Uprawnienium[] $uprawnienia
 * @property \App\Model\Entity\Wynik[] $wynik
 * @property \App\Model\Entity\Zestaw[] $zestaw
 */
class Konto extends Entity
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
        'id_konto' => false,
    ];
	protected function _getName()    
	{      
		return $this->_properties['imie_konto'] . '  ' .$this->_properties['nazwisko_konto'];
	}
}
