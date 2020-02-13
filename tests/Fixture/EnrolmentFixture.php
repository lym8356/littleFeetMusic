<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnrolmentFixture
 */
class EnrolmentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'enrolment';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'enrol_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'lfmclass_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'attendance' => ['type' => 'string', 'length' => null, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'lfmclass_id' => ['type' => 'index', 'columns' => ['lfmclass_id'], 'length' => []],
            'enrol_id' => ['type' => 'index', 'columns' => ['enrol_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'enrol_id' => ['type' => 'foreign', 'columns' => ['enrol_id'], 'references' => ['enrolmentstest', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'lfmclass_id' => ['type' => 'foreign', 'columns' => ['lfmclass_id'], 'references' => ['lfmclasses', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'enrol_id' => 1,
                'lfmclass_id' => 1,
                'attendance' => 'Lorem ipsum dolor sit amet'
            ],
        ];
        parent::init();
    }
}
