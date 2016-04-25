<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\JezykTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\JezykTable Test Case
 */
class JezykTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\JezykTable
     */
    public $Jezyk;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.jezyk',
        'app.slowo'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Jezyk') ? [] : ['className' => 'App\Model\Table\JezykTable'];
        $this->Jezyk = TableRegistry::get('Jezyk', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Jezyk);

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
