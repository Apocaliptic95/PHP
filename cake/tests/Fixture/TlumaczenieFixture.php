<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TlumaczenieFixture
 *
 */
class TlumaczenieFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'tlumaczenie';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_tlumaczenie' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'slowo_id_one' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'slowo_id_two' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'slowo_id_one' => ['type' => 'index', 'columns' => ['slowo_id_one'], 'length' => []],
            'slowo_id_two' => ['type' => 'index', 'columns' => ['slowo_id_two'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_tlumaczenie'], 'length' => []],
            'tlumaczenie_ibfk_1' => ['type' => 'foreign', 'columns' => ['slowo_id_one'], 'references' => ['slowo', 'id_slowo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'tlumaczenie_ibfk_2' => ['type' => 'foreign', 'columns' => ['slowo_id_two'], 'references' => ['slowo', 'id_slowo'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_tlumaczenie' => 1,
            'slowo_id_one' => 1,
            'slowo_id_two' => 1
        ],
    ];
}
