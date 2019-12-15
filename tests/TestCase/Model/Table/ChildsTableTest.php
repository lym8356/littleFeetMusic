<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ChildsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ChildsTable Test Case
 */
class ChildsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ChildsTable
     */
    public $Childs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Childs',
        'app.Enrolments',
        'app.Relations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Childs') ? [] : ['className' => ChildsTable::class];
        $this->Childs = TableRegistry::getTableLocator()->get('Childs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Childs);

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
