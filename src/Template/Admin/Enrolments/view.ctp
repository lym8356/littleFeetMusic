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
        <li><?= $this->Html->link(__('List Lfmclasses'), ['controller' => 'Lfmclasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lfmclass'), ['controller' => 'Lfmclasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Childs'), ['controller' => 'Childs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child'), ['controller' => 'Childs', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('Lfmclass') ?></th>
            <td><?= $enrolment->has('lfmclass') ? $this->Html->link($enrolment->lfmclass->id, ['controller' => 'Lfmclasses', 'action' => 'view', $enrolment->lfmclass->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $enrolment->has('user') ? $this->Html->link($enrolment->user->name, ['controller' => 'Users', 'action' => 'view', $enrolment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Child') ?></th>
            <td><?= $enrolment->has('child') ? $this->Html->link($enrolment->child->id, ['controller' => 'Childs', 'action' => 'view', $enrolment->child->id]) : '' ?></td>
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
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($enrolment->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($enrolment->modified) ?></td>
        </tr>
    </table>
</div>
