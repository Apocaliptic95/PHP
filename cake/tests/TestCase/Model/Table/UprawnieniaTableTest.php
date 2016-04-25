<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UprawnieniaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UprawnieniaTable Test Case
 */
class UprawnieniaTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UprawnieniaTable
     */
    public $Uprawnienia;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.uprawnienia',
        'app.konto',
        'app.rola',
        'app.wynik',
        'app.zestaw',
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
        $config = TableRegistry::exists('Uprawnienia') ? [] : ['className' => 'App\Model\Table\UprawnieniaTable'];
        $this->Uprawnienia = TableRegistry::get('Uprawnienia', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Uprawnienia);

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
