<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;


/**
 * Tlumaczenie Entity.
 *
 * @property int $id_tlumaczenie
 * @property int $slowo_id_one
 * @property int $slowo_id_two
 */
class Tlumaczenie extends Entity
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
        'id_tlumaczenie' => false,
    ];
	
	protected function _getName()
	{
		$table = TableRegistry::get('Slowo');
		$slowo = $table->find()
					->where(['id_slowo' => $this->_properties['slowo_id_one']]);
		$row = $slowo->first();
		$slowo2 = $table->find()
					->where(['id_slowo' => $this->_properties['slowo_id_two']]);
		$row2 = $slowo2->first();
		return $row->nazwa_slowo.' - '.$row2->nazwa_slowo;
	}
}
