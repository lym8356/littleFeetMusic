<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lfmclass $lfmclass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Lfmclass'), ['action' => 'edit', $lfmclass->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Lfmclass'), ['action' => 'delete', $lfmclass->id], ['confirm' => __('Are you sure you want to delete # {0}?', $lfmclass->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Lfmclasses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lfmclass'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="lfmclasses view large-9 medium-8 columns content">
    <h3><?= h($lfmclass->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Term') ?></th>
            <td><?= $lfmclass->has('term') ? $this->Html->link($lfmclass->term->id, ['controller' => 'Terms', 'action' => 'view', $lfmclass->term->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($lfmclass->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Week No') ?></th>
            <td><?= $this->Number->format($lfmclass->week_no) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($lfmclass->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class Date') ?></th>
            <td><?= h($lfmclass->class_date) ?></td>
        </tr>
    </table>
</div>
