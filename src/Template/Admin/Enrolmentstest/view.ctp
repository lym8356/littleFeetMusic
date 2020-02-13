<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolmentstest $enrolmentstest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enrolmentstest'), ['action' => 'edit', $enrolmentstest->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enrolmentstest'), ['action' => 'delete', $enrolmentstest->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enrolmentstest->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Enrolmentstest'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enrolmentstest'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="enrolmentstest view large-9 medium-8 columns content">
    <h3><?= h($enrolmentstest->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Enrolment Type') ?></th>
            <td><?= h($enrolmentstest->enrolment_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enrolment Status') ?></th>
            <td><?= h($enrolmentstest->enrolment_status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comment') ?></th>
            <td><?= h($enrolmentstest->comment) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($enrolmentstest->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Enrolment Cost') ?></th>
            <td><?= $this->Number->format($enrolmentstest->enrolment_cost) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Guardian Id') ?></th>
            <td><?= $this->Number->format($enrolmentstest->guardian_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Child Id') ?></th>
            <td><?= $this->Number->format($enrolmentstest->child_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($enrolmentstest->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($enrolmentstest->modified) ?></td>
        </tr>
    </table>
</div>
