<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookusTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookusTable Test Case
 */
class BookusTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BookusTable
     */
    public $Bookus;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Bookus'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Bookus') ? [] : ['className' => BookusTable::class];
        $this->Bookus = TableRegistry::getTableLocator()->get('Bookus', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bookus);

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
