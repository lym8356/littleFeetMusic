<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classlfm $classlfm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Classlfm'), ['action' => 'edit', $classlfm->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Classlfm'), ['action' => 'delete', $classlfm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classlfm->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Classlfm'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classlfm'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="classlfm view large-9 medium-8 columns content">
    <h3><?= h($classlfm->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($classlfm->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age Group') ?></th>
            <td><?= h($classlfm->age_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($classlfm->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($classlfm->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Id') ?></th>
            <td><?= $this->Number->format($classlfm->location_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Week Length') ?></th>
            <td><?= $this->Number->format($classlfm->week_length) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($classlfm->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($classlfm->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cost Per Class') ?></th>
            <td><?= $this->Number->format($classlfm->cost_per_class) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($classlfm->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($classlfm->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($classlfm->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($classlfm->end_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Overflow') ?></th>
            <td><?= $classlfm->overflow ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
