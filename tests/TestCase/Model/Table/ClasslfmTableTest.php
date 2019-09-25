<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ClasslfmTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ClasslfmTable Test Case
 */
class ClasslfmTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ClasslfmTable
     */
    public $Classlfm;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Classlfm',
        'app.Location'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Classlfm') ? [] : ['className' => ClasslfmTable::class];
        $this->Classlfm = TableRegistry::getTableLocator()->get('Classlfm', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Classlfm);

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
