<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ZestawTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ZestawTable Test Case
 */
class ZestawTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ZestawTable
     */
    public $Zestaw;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.zestaw',
        'app.konto',
        'app.rola',
        'app.uprawnienia',
        'app.podkategoria',
        'app.kategoria',
        'app.wynik',
        'app.zestawienie'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Zestaw') ? [] : ['className' => 'App\Model\Table\ZestawTable'];
        $this->Zestaw = TableRegistry::get('Zestaw', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Zestaw);

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
