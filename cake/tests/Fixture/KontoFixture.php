<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * KontoFixture
 *
 */
class KontoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'konto';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id_konto' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'rola_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'imie_konto' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'nazwisko_konto' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'email_konto' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'login_konto' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'haslo_konto' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'rola_id' => ['type' => 'index', 'columns' => ['rola_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_konto'], 'length' => []],
            'konto_ibfk_1' => ['type' => 'foreign', 'columns' => ['rola_id'], 'references' => ['rola', 'id_rola'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
            'id_konto' => 1,
            'rola_id' => 1,
            'imie_konto' => 'Lorem ipsum dolor ',
            'nazwisko_konto' => 'Lorem ipsum dolor sit amet',
            'email_konto' => 'Lorem ipsum dolor sit amet',
            'login_konto' => 'Lorem ipsum dolor sit amet',
            'haslo_konto' => 'Lorem ipsum dolor sit amet'
        ],
    ];
}
