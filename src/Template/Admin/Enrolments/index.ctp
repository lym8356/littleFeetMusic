<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment[]|\Cake\Collection\CollectionInterface $enrolments
 */
?>

<head>
    <style>
        .full-width-tabs > ul.nav.nav-pills {
            display: table;
            width: 100%;
            table-layout: fixed;
        }
        .full-width-tabs > ul.nav.nav-pills > li {
            float: none;
            display: table-cell;
        }
        .full-width-tabs > ul.nav.nav-pills > li > a {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-lg-12 full_width_tabs">
        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist" style="font-size: large;">
            <li class="nav-item active">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mon PM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tues Mord</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Wed Gas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Thurs Park</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Fri Gas</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="row col-lg-4 tab-pane fade in active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">Day</th>
                            <th scope="col">Time</th>
                            <th scope="col">Age</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Child's Name</th>
                            <th scope="col">Adult</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Comments</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

            </div>
        </div>
    </div>
</div>

<div class="enrolments index large-9 medium-8 columns content">
    <h3><?= __('Enrolments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<!--                <th scope="col">--><?//= $this->Paginator->sort('id') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('enrolment_date') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('enrolment_time') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('enrolment_type') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('enrolment_status') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('enrolment_cost') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('terms_id') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('customer_name') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('customer_phone') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('customer_email') ?><!--</th>-->
<!--                <th scope="col">--><?//= $this->Paginator->sort('child_name') ?><!--</th>-->
<!--                <th scope="col" class="actions">--><?//= __('Actions') ?><!--</th>-->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enrolments as $enrolment): ?>
            <tr>
                <td><?= $this->Number->format($enrolment->id) ?></td>
                <td><?= h($enrolment->enrolment_date) ?></td>
                <td><?= h($enrolment->enrolment_time) ?></td>
                <td><?= h($enrolment->enrolment_type) ?></td>
                <td><?= h($enrolment->enrolment_status) ?></td>
                <td><?= $this->Number->format($enrolment->enrolment_cost) ?></td>
                <td><?= $enrolment->has('term') ? $this->Html->link($enrolment->term->name, ['controller' => 'Terms', 'action' => 'view', $enrolment->term->id]) : '' ?></td>
                <td><?= h($enrolment->customer_name) ?></td>
                <td><?= h($enrolment->customer_phone) ?></td>
                <td><?= h($enrolment->customer_email) ?></td>
                <td><?= h($enrolment->child_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $enrolment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enrolment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enrolment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enrolment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
</body>
