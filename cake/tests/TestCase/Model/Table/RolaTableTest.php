<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RolaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RolaTable Test Case
 */
class RolaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RolaTable
     */
    public $Rola;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rola',
        'app.konto',
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
        $config = TableRegistry::exists('Rola') ? [] : ['className' => 'App\Model\Table\RolaTable'];
        $this->Rola = TableRegistry::get('Rola', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rola);

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
