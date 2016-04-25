<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PodkategoriaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PodkategoriaTable Test Case
 */
class PodkategoriaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PodkategoriaTable
     */
    public $Podkategoria;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.podkategoria',
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
        $config = TableRegistry::exists('Podkategoria') ? [] : ['className' => 'App\Model\Table\PodkategoriaTable'];
        $this->Podkategoria = TableRegistry::get('Podkategoria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Podkategoria);

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
