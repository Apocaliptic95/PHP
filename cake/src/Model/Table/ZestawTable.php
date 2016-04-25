<?php
namespace App\Model\Table;

use App\Model\Entity\Zestaw;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zestaw Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Konto
 * @property \Cake\ORM\Association\BelongsTo $Podkategoria
 * @property \Cake\ORM\Association\HasMany $Wynik
 * @property \Cake\ORM\Association\HasMany $Zestawienie
 */
class ZestawTable extends Table
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

        $this->table('zestaw');
        $this->displayField('nazwa_zestaw');
        $this->primaryKey('id_zestaw');

        $this->belongsTo('Konto', [
            'foreignKey' => 'konto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Jezyk_one', [
		'className' => 'Jezyk',
		'foreignKey' => 'jezyk_id_one',
		'propertyName' => 'jezyk_one'
		]);

		$this->belongsTo('Jezyk_two', [
			'className' => 'Jezyk',
			'foreignKey' => 'jezyk_id_two',
			'propertyName' => 'jezyk_two'
		]);
        $this->belongsTo('Podkategoria', [
            'foreignKey' => 'podkategoria_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Wynik', [
            'foreignKey' => 'zestaw_id'
        ]);
        $this->hasMany('Zestawienie', [
            'foreignKey' => 'zestaw_id'
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
            ->integer('id_zestaw')
            ->allowEmpty('id_zestaw', 'create');

        $validator
            ->requirePresence('nazwa_zestaw', 'create')
            ->notEmpty('nazwa_zestaw');

        $validator
            ->boolean('prywatny_zestaw')
            ->requirePresence('prywatny_zestaw', 'create')
            ->notEmpty('prywatny_zestaw');

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
        $rules->add($rules->existsIn(['konto_id'], 'Konto'));
        $rules->add($rules->existsIn(['podkategoria_id'], 'Podkategoria'));
		$rules->add($rules->existsIn(['jezyk_id_one'], 'Jezyk_one'));
		$rules->add($rules->existsIn(['jezyk_id_two'], 'Jezyk_two'));
        return $rules;
    }
}
