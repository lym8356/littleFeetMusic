<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment[]|\Cake\Collection\CollectionInterface $enrolments
 */
?>

<link rel="stylesheet" type="text/css" href="../../../../webroot/css/base.css">

<style type="text/css">
    table{
        border: 1px solid black;
        position: center;
    }
    th, td{
        padding: 15px;
        vertical-align: center;
        text-align: left;
        border: 1px solid black;
    }

    tr:hover{
        background-color: #f5f5f5;
    }

    #loc-dt{

    }

    a:hover{
        text-decoration: none;
    }

    .btn{
        margin-left: 5px;
    }
    .btn:hover{
        background-color: #4da6ff;
    }

    .tbn{
        float: right;
        margin-right: 5%;
    }

</style>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
<!--        <li class="heading">--><?//= __('Actions') ?><!--</li>-->
    </ul>
</nav>
<div class="enrolments index large-9 medium-8 columns content">
    <h3><?= __('Enrolments') ?></h3>
    <br>
    <button><?= $this->Html->link(__('New Enrolment'), ['action' => 'add']) ?></button>
    <button><?= $this->Html->link(__('List Lfmclasses'), ['controller' => 'Lfmclasses', 'action' => 'index']) ?></button>
    <button><?= $this->Html->link(__('New Lfmclass'), ['controller' => 'Lfmclasses', 'action' => 'add']) ?></button>
<!--    <button>--><!--<?//= $this->Html->link(__('List Childs'), ['controller' => 'Childs', 'action' => 'index']) ?>--><!--</button>-->
<!--    <button>--><!--<?//= $this->Html->link(__('New Child'), ['controller' => 'Childs', 'action' => 'add']) ?>--><!--</button>-->
    <br><br>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lfmclasses_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('child_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
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
                <td><?= $this->Number->format($enrolment->lfmclasses_id) ?></td>
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
