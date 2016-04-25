<?php
namespace App\Model\Table;

use App\Model\Entity\Wynik;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wynik Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Konto
 * @property \Cake\ORM\Association\BelongsTo $Zestaw
 */
class WynikTable extends Table
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

        $this->table('wynik');
        $this->displayField('id_wynik');
        $this->primaryKey('id_wynik');

        $this->belongsTo('Konto', [
            'foreignKey' => 'konto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Zestaw', [
            'foreignKey' => 'zestaw_id',
            'joinType' => 'INNER'
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
            ->integer('id_wynik')
            ->allowEmpty('id_wynik', 'create');

        $validator
            ->integer('wynik_wynik')
            ->requirePresence('wynik_wynik', 'create')
            ->notEmpty('wynik_wynik');

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
        $rules->add($rules->existsIn(['zestaw_id'], 'Zestaw'));
        return $rules;
    }
}
