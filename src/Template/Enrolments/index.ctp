<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment[]|\Cake\Collection\CollectionInterface $enrolments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Enrolment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?></li>
    </ul>
</nav>

<div class="enrolments index large-9 medium-8 columns content">
    <h3><?= __('Enrolments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_type') ?></th>
                <th scope="col"><?= $this->Paginator->sort('enrolment_cost') ?></th>
                <th scope="col"><?= $this->Paginator->sort('terms_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('customer_email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('child_name') ?></th>
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
