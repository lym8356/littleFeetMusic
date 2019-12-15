<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment $enrolment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enrolment'), ['action' => 'edit', $enrolment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enrolment'), ['action' => 'delete', $enrolment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enrolment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Enrolments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enrolment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="enrolments view large-9 medium-8 columns content">
    <h3><?= h($enrolment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Enrolment Type') ?></th>
            <td><?= h($enrolment->enrolment_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enrolment Status') ?></th>
            <td><?= h($enrolment->enrolment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Term') ?></th>
            <td><?= $enrolment->has('term') ? $this->Html->link($enrolment->term->name, ['controller' => 'Terms', 'action' => 'view', $enrolment->term->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Name') ?></th>
            <td><?= h($enrolment->customer_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Phone') ?></th>
            <td><?= h($enrolment->customer_phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Customer Email') ?></th>
            <td><?= h($enrolment->customer_email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Child Name') ?></th>
            <td><?= h($enrolment->child_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($enrolment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enrolment Cost') ?></th>
            <td><?= $this->Number->format($enrolment->enrolment_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enrolment Date') ?></th>
            <td><?= h($enrolment->enrolment_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enrolment Time') ?></th>
            <td><?= h($enrolment->enrolment_time) ?></td>
        </tr>
    </table>
</div>
