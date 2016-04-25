<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ZestawienieFixture
 *
 */
class ZestawienieFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'zestawienie';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_zestawienie' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'slowo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'zestaw_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'slowo_id' => ['type' => 'index', 'columns' => ['slowo_id'], 'length' => []],
            'zestaw_id' => ['type' => 'index', 'columns' => ['zestaw_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_zestawienie'], 'length' => []],
            'zestawienie_ibfk_1' => ['type' => 'foreign', 'columns' => ['slowo_id'], 'references' => ['slowo', 'id_slowo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'zestawienie_ibfk_2' => ['type' => 'foreign', 'columns' => ['zestaw_id'], 'references' => ['zestaw', 'id_zestaw'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_zestawienie' => 1,
            'slowo_id' => 1,
            'zestaw_id' => 1
        ],
    ];
}
