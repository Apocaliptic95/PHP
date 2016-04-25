<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WynikTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WynikTable Test Case
 */
class WynikTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WynikTable
     */
    public $Wynik;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.wynik',
        'app.konto',
        'app.rola',
        'app.uprawnienia',
        'app.podkategoria',
        'app.kategoria',
        'app.zestaw'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Wynik') ? [] : ['className' => 'App\Model\Table\WynikTable'];
        $this->Wynik = TableRegistry::get('Wynik', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Wynik);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
