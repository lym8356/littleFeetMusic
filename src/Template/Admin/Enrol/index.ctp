<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrol[]|\Cake\Collection\CollectionInterface $enrol
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Enrol'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enrolmentstest'), ['controller' => 'Enrolmentstest', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enrolmentstest'), ['controller' => 'Enrolmentstest', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lfmclasses'), ['controller' => 'Lfmclasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lfmclass'), ['controller' => 'Lfmclasses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enrol index large-9 medium-8 columns content">
    <h3><?= __('Enrol') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrol_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lfmclass_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('attendance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($enrol as $enrol): ?>
            <tr>
                <td><?= $this->Number->format($enrol->id) ?></td>
                <td><?= $enrol->has('enrolmentstest') ? $this->Html->link($enrol->enrolmentstest->id, ['controller' => 'Enrolmentstest', 'action' => 'view', $enrol->enrolmentstest->id]) : '' ?></td>
                <td><?= $enrol->has('lfmclass') ? $this->Html->link($enrol->lfmclass->id, ['controller' => 'Lfmclasses', 'action' => 'view', $enrol->lfmclass->id]) : '' ?></td>
                <td><?= h($enrol->attendance) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $enrol->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $enrol->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $enrol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enrol->id)]) ?>
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
