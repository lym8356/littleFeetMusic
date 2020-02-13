<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnrolmentstestTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnrolmentstestTable Test Case
 */
class EnrolmentstestTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnrolmentstestTable
     */
    public $Enrolmentstest;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Enrolmentstest',
        'app.Users',
        'app.Childs',
        'app.Terms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Enrolmentstest') ? [] : ['className' => EnrolmentstestTable::class];
        $this->Enrolmentstest = TableRegistry::getTableLocator()->get('Enrolmentstest', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Enrolmentstest);

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
