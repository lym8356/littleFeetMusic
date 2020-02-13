<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnrolmentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnrolmentTable Test Case
 */
class EnrolmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnrolmentTable
     */
    public $Enrolment;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Enrolment',
        'app.Enrolmentstest',
        'app.Lfmclasses'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Enrolment') ? [] : ['className' => EnrolmentTable::class];
        $this->Enrolment = TableRegistry::getTableLocator()->get('Enrolment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Enrolment);

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
