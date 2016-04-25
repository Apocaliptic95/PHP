<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KategoriaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KategoriaTable Test Case
 */
class KategoriaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\KategoriaTable
     */
    public $Kategoria;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.kategoria'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Kategoria') ? [] : ['className' => 'App\Model\Table\KategoriaTable'];
        $this->Kategoria = TableRegistry::get('Kategoria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Kategoria);

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
