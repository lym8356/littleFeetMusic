<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EnrolTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EnrolTable Test Case
 */
class EnrolTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EnrolTable
     */
    public $Enrol;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Enrol',
        'app.Enrolments',
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
        $config = TableRegistry::getTableLocator()->exists('Enrol') ? [] : ['className' => EnrolTable::class];
        $this->Enrol = TableRegistry::getTableLocator()->get('Enrol', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Enrol);

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
