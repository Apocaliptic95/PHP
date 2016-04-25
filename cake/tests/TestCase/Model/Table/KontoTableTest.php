<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KontoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KontoTable Test Case
 */
class KontoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KontoTable
     */
    public $Konto;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.konto',
        'app.rola',
        'app.uprawnienia',
        'app.wynik',
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
        $config = TableRegistry::exists('Konto') ? [] : ['className' => 'App\Model\Table\KontoTable'];
        $this->Konto = TableRegistry::get('Konto', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Konto);

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
