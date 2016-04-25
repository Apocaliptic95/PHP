<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SlowoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SlowoTable Test Case
 */
class SlowoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SlowoTable
     */
    public $Slowo;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.slowo',
        'app.jezyk',
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
        $config = TableRegistry::exists('Slowo') ? [] : ['className' => 'App\Model\Table\SlowoTable'];
        $this->Slowo = TableRegistry::get('Slowo', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Slowo);

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
