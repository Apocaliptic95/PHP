<?php
namespace App\Model\Table;

use App\Model\Entity\Kategorium;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Kategoria Model
 *
 */
class KategoriaTable extends Table
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

        $this->table('kategoria');
        $this->displayField('nazwa_kategoria');
        $this->primaryKey('id_kategoria');
		
		$this->hasMany('Podkategoria', [
            'foreignKey' => 'kategoria_id'
        ]);
		
		$this->addBehavior('Proffer.Proffer', [
			'img_kategoria' => [
				'root' => WWW_ROOT.'img',
				'dir' => 'dir_kategoria',
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
		$validator->provider('proffer', 'Proffer\Model\Validation\ProfferRules');
		
        $validator
            ->integer('id_kategoria')
            ->allowEmpty('id_kategoria', 'create');

        $validator
            ->requirePresence('nazwa_kategoria', 'create')
            ->notEmpty('nazwa_kategoria')
			->add('nazwa_kategoria', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('opis_kategoria', 'create')
            ->notEmpty('opis_kategoria');

        $validator
            ->allowEmpty('img_kategoria');

        return $validator;
    }
}
