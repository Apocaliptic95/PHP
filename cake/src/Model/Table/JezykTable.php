<?php
namespace App\Model\Table;

use App\Model\Entity\Jezyk;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Jezyk Model
 *
 * @property \Cake\ORM\Association\HasMany $Slowo
 */
class JezykTable extends Table
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

        $this->table('jezyk');
        $this->displayField('nazwa_jezyk');
        $this->primaryKey('id_jezyk');

        $this->hasMany('Slowo', [
            'foreignKey' => 'jezyk_id'
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
            ->integer('id_jezyk')
            ->allowEmpty('id_jezyk', 'create');

        $validator
            ->requirePresence('nazwa_jezyk', 'create')
            ->notEmpty('nazwa_jezyk');

        return $validator;
    }
}
