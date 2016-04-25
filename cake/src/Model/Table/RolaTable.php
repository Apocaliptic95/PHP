<?php
namespace App\Model\Table;

use App\Model\Entity\Rola;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rola Model
 *
 * @property \Cake\ORM\Association\HasMany $Konto
 */
class RolaTable extends Table
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

        $this->table('rola');
        $this->displayField('nazwa_rola');
        $this->primaryKey('id_rola');

        $this->hasMany('Konto', [
            'foreignKey' => 'rola_id'
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
            ->integer('id_rola')
            ->allowEmpty('id_rola', 'create');

        $validator
            ->requirePresence('nazwa_rola', 'create')
            ->notEmpty('nazwa_rola');

        $validator
            ->requirePresence('opis_rola', 'create')
            ->notEmpty('opis_rola');

        return $validator;
    }
}
