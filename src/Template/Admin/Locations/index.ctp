<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location[]|\Cake\Collection\CollectionInterface $locations
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classlfm'), ['controller' => 'Classlfm', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classlfm'), ['controller' => 'Classlfm', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="locations index large-9 medium-8 columns content">
    <h3><?= __('Locations') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('street_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('suburb') ?></th>
                <th scope="col"><?= $this->Paginator->sort('post_code') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($locations as $location): ?>
            <tr>
                <td><?= $this->Number->format($location->Id) ?></td>
                <td><?= h($location->name) ?></td>
                <td><?= h($location->street_address) ?></td>
                <td><?= h($location->suburb) ?></td>
                <td><?= $this->Number->format($location->post_code) ?></td>
                <td><?= h($location->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $location->Id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->Id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->Id)]) ?>
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
