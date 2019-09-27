<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classlfm[]|\Cake\Collection\CollectionInterface $classlfm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Classlfm'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="classlfm index large-9 medium-8 columns content">
    <h3><?= __('Classlfm') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('age_group') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('week_length') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                <th scope="col"><?= $this->Paginator->sort('capacity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('cost_per_class') ?></th>
                <th scope="col"><?= $this->Paginator->sort('overflow') ?></th>
                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classlfm as $classlfm): ?>
            <tr>
                <td><?= $this->Number->format($classlfm->id) ?></td>
                <td><?= h($classlfm->name) ?></td>
                <td><?= h($classlfm->age_group) ?></td>
                <td><?= $classlfm->has('location') ? $this->Html->link($classlfm->location->name, ['controller' => 'Locations', 'action' => 'view', $classlfm->location->Id]) : '' ?></td>
                <td><?= h($classlfm->start_date) ?></td>
                <td><?= h($classlfm->end_date) ?></td>
                <td><?= $this->Number->format($classlfm->week_length) ?></td>
                <td><?= h($classlfm->start_time) ?></td>
                <td><?= h($classlfm->end_time) ?></td>
                <td><?= $this->Number->format($classlfm->duration) ?></td>
                <td><?= $this->Number->format($classlfm->capacity) ?></td>
                <td><?= $this->Number->format($classlfm->cost_per_class) ?></td>
                <td><?= h($classlfm->overflow) ?></td>
                <td><?= h($classlfm->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $classlfm->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $classlfm->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $classlfm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classlfm->id)]) ?>
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
