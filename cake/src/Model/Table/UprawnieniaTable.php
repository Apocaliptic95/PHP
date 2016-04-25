<?php
namespace App\Model\Table;

use App\Model\Entity\Uprawnienium;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uprawnienia Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Konto
 * @property \Cake\ORM\Association\BelongsTo $Podkategoria
 */
class UprawnieniaTable extends Table
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

        $this->table('uprawnienia');
        $this->displayField('id_uprawnienia');
        $this->primaryKey('id_uprawnienia');

        $this->belongsTo('Konto', [
            'foreignKey' => 'konto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Podkategoria', [
            'foreignKey' => 'podkategoria_id',
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
            ->integer('id_uprawnienia')
            ->allowEmpty('id_uprawnienia', 'create');

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
        return $rules;
    }
}
