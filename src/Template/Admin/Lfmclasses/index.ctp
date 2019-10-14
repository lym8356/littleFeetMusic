<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lfmclass[]|\Cake\Collection\CollectionInterface $lfmclasses
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Lfmclass'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lfmclasses index large-9 medium-8 columns content">
    <h3><?= __('Lfmclasses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('term_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('week_no') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('class_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($lfmclasses as $lfmclass): ?>
            <tr>
                <td><?= $this->Number->format($lfmclass->id) ?></td>
                <td><?= $lfmclass->has('term') ? $this->Html->link($lfmclass->term->id, ['controller' => 'Terms', 'action' => 'view', $lfmclass->term->id]) : '' ?></td>
                <td><?= $this->Number->format($lfmclass->week_no) ?></td>
                <td><?= $this->Number->format($lfmclass->price) ?></td>
                <td><?= h($lfmclass->class_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $lfmclass->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lfmclass->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lfmclass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lfmclass->id)]) ?>
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
