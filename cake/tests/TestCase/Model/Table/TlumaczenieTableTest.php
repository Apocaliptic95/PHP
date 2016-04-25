<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TlumaczenieTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TlumaczenieTable Test Case
 */
class TlumaczenieTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TlumaczenieTable
     */
    public $Tlumaczenie;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.tlumaczenie'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tlumaczenie') ? [] : ['className' => 'App\Model\Table\TlumaczenieTable'];
        $this->Tlumaczenie = TableRegistry::get('Tlumaczenie', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tlumaczenie);

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
}
