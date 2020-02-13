<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrol $enrol
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Enrol'), ['action' => 'edit', $enrol->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Enrol'), ['action' => 'delete', $enrol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enrol->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Enrol'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enrol'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enrolmentstest'), ['controller' => 'Enrolmentstest', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enrolmentstest'), ['controller' => 'Enrolmentstest', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Lfmclasses'), ['controller' => 'Lfmclasses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lfmclass'), ['controller' => 'Lfmclasses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enrol'), ['controller' => 'Enrol', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enrol'), ['controller' => 'Enrol', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="enrol view large-9 medium-8 columns content">
    <h3><?= h($enrol->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Enrolmentstest') ?></th>
            <td><?= $enrol->has('enrolmentstest') ? $this->Html->link($enrol->enrolmentstest->id, ['controller' => 'Enrolmentstest', 'action' => 'view', $enrol->enrolmentstest->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Lfmclass') ?></th>
            <td><?= $enrol->has('lfmclass') ? $this->Html->link($enrol->lfmclass->id, ['controller' => 'Lfmclasses', 'action' => 'view', $enrol->lfmclass->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Attendance') ?></th>
            <td><?= h($enrol->attendance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($enrol->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Enrol') ?></h4>
        <?php if (!empty($enrol->enrol)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Enrol Id') ?></th>
                <th scope="col"><?= __('Lfmclass Id') ?></th>
                <th scope="col"><?= __('Attendance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($enrol->enrol as $enrol): ?>
            <tr>
                <td><?= h($enrol->id) ?></td>
                <td><?= h($enrol->enrol_id) ?></td>
                <td><?= h($enrol->lfmclass_id) ?></td>
                <td><?= h($enrol->attendance) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Enrol', 'action' => 'view', $enrol->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Enrol', 'action' => 'edit', $enrol->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Enrol', 'action' => 'delete', $enrol->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enrol->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
