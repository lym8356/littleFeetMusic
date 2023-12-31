<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClassTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClassTable Test Case
 */
class ClassTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClassTable
     */
    public $Class;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Class'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Class') ? [] : ['className' => ClassTable::class];
        $this->Class = TableRegistry::getTableLocator()->get('Class', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Class);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
