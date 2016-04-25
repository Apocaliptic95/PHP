<?php
namespace App\Model\Table;

use App\Model\Entity\Podkategorium;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Podkategoria Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Kategoria
 */
class PodkategoriaTable extends Table
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

        $this->table('podkategoria');
        $this->displayField('nazwa_podkategoria');
        $this->primaryKey('id_podkategoria');

        $this->belongsTo('Kategoria', [
            'foreignKey' => 'kategoria_id',
            'joinType' => 'INNER'
        ]);
		
		$this->hasMany('Zestaw', [
            'foreignKey' => 'podkategoria_id'
        ]);
		
		$this->addBehavior('Proffer.Proffer', [
			'img_podkategoria' => [
				'root' => WWW_ROOT.'img',
				'dir' => 'dir_podkategoria',
				'thumbnailSizes' => [
					'square' => [
						'w' => 300,
						'h' => 300,
						'crop' => false,
						'jpeg_quality'  => 100,
						'png_compression_level' => 9
					]
				],
				'thumbnailMethod' => 'GD'
			]
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
            ->integer('id_podkategoria')
            ->allowEmpty('id_podkategoria', 'create');

        $validator
            ->requirePresence('nazwa_podkategoria', 'create')
            ->notEmpty('nazwa_podkategoria');

        $validator
            ->requirePresence('opis_podkategoria', 'create')
            ->notEmpty('opis_podkategoria');

        $validator
            ->allowEmpty('obrazek_podkategoria');

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
        $rules->add($rules->existsIn(['kategoria_id'], 'Kategoria'));
        return $rules;
    }
}
