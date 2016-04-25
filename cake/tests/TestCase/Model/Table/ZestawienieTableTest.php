<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZestawienieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZestawienieTable Test Case
 */
class ZestawienieTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZestawienieTable
     */
    public $Zestawienie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zestawienie',
        'app.slowo',
        'app.jezyk',
        'app.zestaw',
        'app.konto',
        'app.rola',
        'app.uprawnienia',
        'app.podkategoria',
        'app.kategoria',
        'app.wynik'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Zestawienie') ? [] : ['className' => 'App\Model\Table\ZestawienieTable'];
        $this->Zestawienie = TableRegistry::get('Zestawienie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Zestawienie);

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
