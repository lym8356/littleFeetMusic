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
        'term_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'guardian_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'child_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'enrolment_type' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'payment_method' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'payment_status' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'enrolment_cost' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'comment' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'enrolments_users__fk' => ['type' => 'index', 'columns' => ['guardian_id'], 'length' => []],
            'enrol_terms_id' => ['type' => 'index', 'columns' => ['term_id'], 'length' => []],
            'enrolments_child-id_uindex' => ['type' => 'index', 'columns' => ['child_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'enrolments_childs__fk' => ['type' => 'foreign', 'columns' => ['child_id'], 'references' => ['childs', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'enrolments_terms_fk' => ['type' => 'foreign', 'columns' => ['term_id'], 'references' => ['terms', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'term_id' => 1,
                'guardian_id' => 1,
                'child_id' => 1,
                'enrolment_type' => 'Lorem ipsum dolor ',
                'payment_method' => 'Lorem ipsum dolor ',
                'payment_status' => 'Lorem ipsum dolor ',
                'enrolment_cost' => 1,
                'comment' => 'Lorem ipsum dolor sit amet',
                'created' => '2020-02-15 18:36:22',
                'modified' => '2020-02-15 18:36:22'
            ],
        ];
        parent::init();
    }
}
