<?php
namespace App\Model\Table;

use App\Model\Entity\Tlumaczenie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Tlumaczenie Model
 *
 */
class TlumaczenieTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tlumaczenie');
        $this->displayField('name');
        $this->primaryKey('id_tlumaczenie');
		
		$this->belongsTo('Slowo_one', [
		'className' => 'Slowo',
		'foreignKey' => 'slowo_id_one',
		'propertyName' => 'slowo_one'
		]);

		$this->belongsTo('Slowo_two', [
			'className' => 'Slowo',
			'foreignKey' => 'slowo_id_two',
			'propertyName' => 'slowo_two'
		]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id_tlumaczenie')
            ->allowEmpty('id_tlumaczenie', 'create');

        $validator
            ->integer('slowo_id_one')
            ->requirePresence('slowo_id_one', 'create')
            ->notEmpty('slowo_id_one');

        $validator
            ->integer('slowo_id_two')
            ->requirePresence('slowo_id_two', 'create')
            ->notEmpty('slowo_id_two');

        return $validator;
    }
	
	public function getIndex($id1,$id2)
	{
		$table = TableRegistry::get('Tlumaczenie');
		$tlumaczenia = $table->find('all')
					   ->where(['slowo_id_one' => $id1, 'slowo_id_two' => $id2]);
		if($tlumaczenia->count() > 0)
			return $tlumaczenia->first()->id_tlumaczenie;
		else
			return -1;
	}
}
