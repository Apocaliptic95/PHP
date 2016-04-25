<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WynikFixture
 *
 */
class WynikFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'wynik';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_wynik' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'konto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'zestaw_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_wynik' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'wynik_wynik' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'konto_id' => ['type' => 'index', 'columns' => ['konto_id'], 'length' => []],
            'zestaw_id' => ['type' => 'index', 'columns' => ['zestaw_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_wynik'], 'length' => []],
            'wynik_ibfk_1' => ['type' => 'foreign', 'columns' => ['konto_id'], 'references' => ['konto', 'id_konto'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'wynik_ibfk_2' => ['type' => 'foreign', 'columns' => ['zestaw_id'], 'references' => ['zestaw', 'id_zestaw'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_wynik' => 1,
            'konto_id' => 1,
            'zestaw_id' => 1,
            'data_wynik' => '2016-04-10',
            'wynik_wynik' => 1
        ],
    ];
}
