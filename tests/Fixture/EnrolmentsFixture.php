<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EnrolmentsFixture
 */
class EnrolmentsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'enrolment_type' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'enrolment_status' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'enrolment_cost' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'lfmclasses_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'guardian_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'child_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'enrolments_users__fk' => ['type' => 'index', 'columns' => ['guardian_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'enrol_terms_id' => ['type' => 'unique', 'columns' => ['lfmclasses_id'], 'length' => []],
            'enrolments_child-id_uindex' => ['type' => 'unique', 'columns' => ['child_id'], 'length' => []],
            'enrolments_childs__fk' => ['type' => 'foreign', 'columns' => ['child_id'], 'references' => ['childs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'enrolments_lfmclasses_fk' => ['type' => 'foreign', 'columns' => ['lfmclasses_id'], 'references' => ['lfmclasses', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'enrolments_users__fk' => ['type' => 'foreign', 'columns' => ['guardian_id'], 'references' => ['users', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'enrolment_type' => 'Lorem ipsum dolor ',
                'enrolment_status' => 'Lorem ipsum dolor ',
                'enrolment_cost' => 1,
                'lfmclasses_id' => 1,
                'guardian_id' => 1,
                'created' => '2019-12-16 05:42:28',
                'modified' => '2019-12-16 05:42:28',
                'child_id' => 1
            ],
        ];
        parent::init();
    }
}
