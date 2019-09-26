<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $booking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookings view large-9 medium-8 columns content">
    <h3><?= h($booking->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Booking Type') ?></th>
            <td><?= h($booking->booking_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking Status') ?></th>
            <td><?= h($booking->booking_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($booking->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking Cost') ?></th>
            <td><?= $this->Number->format($booking->booking_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Class Id') ?></th>
            <td><?= $this->Number->format($booking->class_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Child Id') ?></th>
            <td><?= $this->Number->format($booking->child_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking Date') ?></th>
            <td><?= h($booking->booking_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Booking Time') ?></th>
            <td><?= h($booking->booking_time) ?></td>
        </tr>
    </table>
</div>
