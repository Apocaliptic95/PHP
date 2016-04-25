<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UprawnieniaFixture
 *
 */
class UprawnieniaFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'uprawnienia';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_uprawnienia' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'konto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'podkategoria_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'konto_id' => ['type' => 'index', 'columns' => ['konto_id'], 'length' => []],
            'podkategoria_id' => ['type' => 'index', 'columns' => ['podkategoria_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_uprawnienia'], 'length' => []],
            'uprawnienia_ibfk_1' => ['type' => 'foreign', 'columns' => ['konto_id'], 'references' => ['konto', 'id_konto'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'uprawnienia_ibfk_2' => ['type' => 'foreign', 'columns' => ['podkategoria_id'], 'references' => ['podkategoria', 'id_podkategoria'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'latin1_swedish_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id_uprawnienia' => 1,
            'konto_id' => 1,
            'podkategoria_id' => 1
        ],
    ];
}
