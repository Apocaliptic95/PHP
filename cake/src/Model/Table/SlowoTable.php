<?php
namespace App\Model\Table;

use App\Model\Entity\Slowo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Slowo Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Jezyk
 * @property \Cake\ORM\Association\HasMany $Zestawienie
 */
class SlowoTable extends Table
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

        $this->table('slowo');
        $this->displayField('nazwa_slowo');
        $this->primaryKey('id_slowo');

        $this->belongsTo('Jezyk', [
            'foreignKey' => 'jezyk_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Zestawienie', [
            'foreignKey' => 'slowo_id'
        ]);
		
		$this->hasMany('Tlumaczenie_one', [
		'className' => 'Tlumaczenie',
		'foreignKey' => 'slowo_id_one',
		'propertyName' => 'slowo_one'
		]);
		
		$this->hasMany('Tlumaczenie_two', [
			'className' => 'Tlumaczenie',
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
            ->integer('id_slowo')
            ->allowEmpty('id_slowo', 'create');

        $validator
            ->requirePresence('nazwa_slowo', 'create')
            ->notEmpty('nazwa_slowo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['jezyk_id'], 'Jezyk'));
        return $rules;
    }
	
	public function getIndex($nazwa)
	{
		$table = TableRegistry::get('Slowo');
		$slowa = $table->find('all')
					   ->where(['nazwa_slowo' => $nazwa]);
		if($slowa->count() > 0)
			return $slowa->first()->id_slowo;
		else
			return -1;
	}
}
