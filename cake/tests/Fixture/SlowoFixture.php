<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SlowoFixture
 *
 */
class SlowoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'slowo';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_slowo' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'jezyk_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'nazwa_slowo' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'jezyk_id' => ['type' => 'index', 'columns' => ['jezyk_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_slowo'], 'length' => []],
            'slowo_ibfk_1' => ['type' => 'foreign', 'columns' => ['jezyk_id'], 'references' => ['jezyk', 'id_jezyk'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_slowo' => 1,
            'jezyk_id' => 1,
            'nazwa_slowo' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
