<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $term
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Term'), ['action' => 'edit', $term->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Term'), ['action' => 'delete', $term->id], ['confirm' => __('Are you sure you want to delete # {0}?', $term->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Terms'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Term'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="terms view large-9 medium-8 columns content">
    <h3><?= h($term->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Age Group') ?></th>
            <td><?= h($term->age_group) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($term->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($term->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location Id') ?></th>
            <td><?= $this->Number->format($term->location_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Week Length') ?></th>
            <td><?= $this->Number->format($term->week_length) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Duration') ?></th>
            <td><?= $this->Number->format($term->duration) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($term->capacity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Casual Rate') ?></th>
            <td><?= $this->Number->format($term->casual_rate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Date') ?></th>
            <td><?= h($term->start_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Date') ?></th>
            <td><?= h($term->end_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start Time') ?></th>
            <td><?= h($term->start_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End Time') ?></th>
            <td><?= h($term->end_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Overflow') ?></th>
            <td><?= $term->overflow ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>
