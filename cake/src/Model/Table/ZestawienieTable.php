<?php
namespace App\Model\Table;

use App\Model\Entity\Zestawienie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Zestawienie Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Slowo
 * @property \Cake\ORM\Association\BelongsTo $Zestaw
 */
class ZestawienieTable extends Table
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

        $this->table('zestawienie');
        $this->displayField('id_zestawienie');
        $this->primaryKey('id_zestawienie');

        $this->belongsTo('Tlumaczenie', [
            'foreignKey' => 'tlumaczenie_id',
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
            ->integer('id_zestawienie')
            ->allowEmpty('id_zestawienie', 'create');

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
        $rules->add($rules->existsIn(['tlumaczenie_id'], 'Tlumaczenie'));
        $rules->add($rules->existsIn(['zestaw_id'], 'Zestaw'));
        return $rules;
    }
}
