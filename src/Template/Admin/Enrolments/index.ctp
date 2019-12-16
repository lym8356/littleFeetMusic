<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment[]|\Cake\Collection\CollectionInterface $enrolments
 */
?>
<html>
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
                <a class="nav-link active" id="mon_tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mon PM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="tue_tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tues Mord</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="wed_tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Wed Gas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="thu_tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Thurs Park</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="fri_tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Fri Gas</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="row col-lg-12 tab-pane fade in active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <?php foreach($terms as $term): ?>
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
                        <td><?= $term->day->name  ?></td>
                        <td><?= date("G:i", strtotime($term->start_time))."-".date("G:i", strtotime($term->end_time));  ?></td>
                        <td><?= $term->age_group  ?></td>
                        <td><?= $term->lfmclasses[0]['price'];  ?></td>
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
                    <tbody>
                    <tr>
                        <?php $i=0 ?>
                        <td><?= $i++ ?></td>
                    </tr>
                    </tbody>
                </table>
                <?php endforeach; ?>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

            </div>
        </div>
    </div>
</div>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Enrolment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lfmclasses'), ['controller' => 'Lfmclasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lfmclass'), ['controller' => 'Lfmclasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Childs'), ['controller' => 'Childs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Child'), ['controller' => 'Childs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enrolments index large-9 medium-8 columns content">
    <h3><?= __('Enrolments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lfmclasses_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('guardian_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('child_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enrolments as $enrolment): ?>
            <tr>
                <td><?= $this->Number->format($enrolment->id) ?></td>
                <td><?= h($enrolment->enrolment_type) ?></td>
                <td><?= h($enrolment->enrolment_status) ?></td>
                <td><?= $this->Number->format($enrolment->enrolment_cost) ?></td>
                <td><?= $enrolment->has('lfmclass') ? $this->Html->link($enrolment->lfmclass->id, ['controller' => 'Lfmclasses', 'action' => 'view', $enrolment->lfmclass->id]) : '' ?></td>
                <td><?= $enrolment->has('user') ? $this->Html->link($enrolment->user->name, ['controller' => 'Users', 'action' => 'view', $enrolment->user->id]) : '' ?></td>
                <td><?= h($enrolment->created) ?></td>
                <td><?= h($enrolment->modified) ?></td>
                <td><?= $enrolment->has('child') ? $this->Html->link($enrolment->child->id, ['controller' => 'Childs', 'action' => 'view', $enrolment->child->id]) : '' ?></td>
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
<script>

</script>
</html>
