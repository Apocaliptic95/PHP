<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ZestawFixture
 *
 */
class ZestawFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'zestaw';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_zestaw' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'konto_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jezyk_id_one' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'jezyk_id_two' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'podkategoria_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nazwa_zestaw' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'ilosc_slowek_zestaw' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'data_edycji_zestaw' => ['type' => 'date', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'prywatny_zestaw' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'konto_id' => ['type' => 'index', 'columns' => ['konto_id'], 'length' => []],
            'jezyk_id_one' => ['type' => 'index', 'columns' => ['jezyk_id_one'], 'length' => []],
            'jezyk_id_two' => ['type' => 'index', 'columns' => ['jezyk_id_two'], 'length' => []],
            'podkategoria_id' => ['type' => 'index', 'columns' => ['podkategoria_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_zestaw'], 'length' => []],
            'zestaw_ibfk_1' => ['type' => 'foreign', 'columns' => ['konto_id'], 'references' => ['konto', 'id_konto'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'zestaw_ibfk_2' => ['type' => 'foreign', 'columns' => ['jezyk_id_one'], 'references' => ['jezyk', 'id_jezyk'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'zestaw_ibfk_3' => ['type' => 'foreign', 'columns' => ['jezyk_id_two'], 'references' => ['jezyk', 'id_jezyk'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'zestaw_ibfk_4' => ['type' => 'foreign', 'columns' => ['podkategoria_id'], 'references' => ['podkategoria', 'id_podkategoria'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_zestaw' => 1,
            'konto_id' => 1,
            'jezyk_id_one' => 1,
            'jezyk_id_two' => 1,
            'podkategoria_id' => 1,
            'nazwa_zestaw' => 'Lorem ipsum dolor sit amet',
            'ilosc_slowek_zestaw' => 1,
            'data_edycji_zestaw' => '2016-04-10',
            'prywatny_zestaw' => 1
        ],
    ];
}
