<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DaysTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DaysTable Test Case
 */
class DaysTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\DaysTable
     */
    public $Days;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Days'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Days') ? [] : ['className' => DaysTable::class];
        $this->Days = TableRegistry::getTableLocator()->get('Days', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Days);

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
