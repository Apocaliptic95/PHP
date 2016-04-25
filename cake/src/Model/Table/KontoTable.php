<?php
namespace App\Model\Table;

use App\Model\Entity\Konto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Rule\IsUnique;
use Cake\ORM\TableRegistry;

/**
 * Konto Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Rola
 * @property \Cake\ORM\Association\HasMany $Uprawnienia
 * @property \Cake\ORM\Association\HasMany $Wynik
 * @property \Cake\ORM\Association\HasMany $Zestaw
 */
class KontoTable extends Table
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

        $this->table('konto');
        $this->displayField('name');
        $this->primaryKey('id_konto');

        $this->belongsTo('Rola', [
            'foreignKey' => 'rola_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Uprawnienia', [
            'foreignKey' => 'konto_id'
        ]);
        $this->hasMany('Wynik', [
            'foreignKey' => 'konto_id'
        ]);
        $this->hasMany('Zestaw', [
            'foreignKey' => 'konto_id'
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
            ->integer('id_konto')
            ->allowEmpty('id_konto', 'create');

        $validator
            ->requirePresence('imie_konto', 'create')
            ->notEmpty('imie_konto');

        $validator
            ->requirePresence('nazwisko_konto', 'create')
            ->notEmpty('nazwisko_konto');

        $validator
            ->requirePresence('email_konto', 'create')
            ->notEmpty('email_konto');

        $validator
            ->requirePresence('login_konto', 'create')
            ->notEmpty('login_konto');

        $validator
            ->requirePresence('haslo_konto', 'create')
            ->notEmpty('haslo_konto');

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
        $rules->add($rules->existsIn(['rola_id'], 'Rola'));
		$rules->add($rules->isUnique(['login_konto']));
        return $rules;
    }
	
	public function podkategorie($id)
	{
		$table = TableRegistry::get('Uprawnienia');
		$table2 = TableRegistry::get('Podkategoria');
		$konto = $this->get($id);
		if($konto->rola_id == 4)
			$uprawnienia = $table2->find()
					->select(['id_podkategoria']);
		else
			$uprawnienia = $table->find()
					->where(['Uprawnienia.konto_id =' => $id])
					->select(['podkategoria_id']);
		return $uprawnienia;
	}
}
