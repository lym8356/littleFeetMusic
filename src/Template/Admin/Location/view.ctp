<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->Id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->Id)]) ?> </li>
        <li><?= $this->Html->link(__('List Location'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classlfm'), ['controller' => 'Classlfm', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Classlfm'), ['controller' => 'Classlfm', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="location view large-9 medium-8 columns content">
    <h3><?= h($location->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Street Address') ?></th>
            <td><?= h($location->street_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suburb') ?></th>
            <td><?= h($location->suburb) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($location->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($location->Id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Post Code') ?></th>
            <td><?= $this->Number->format($location->post_code) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Classlfm') ?></h4>
        <?php if (!empty($location->classlfm)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Age Group') ?></th>
                <th scope="col"><?= __('Location Id') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Week Length') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col"><?= __('End Time') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Capacity') ?></th>
                <th scope="col"><?= __('Cost Per Class') ?></th>
                <th scope="col"><?= __('Overflow') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->classlfm as $classlfm): ?>
            <tr>
                <td><?= h($classlfm->id) ?></td>
                <td><?= h($classlfm->name) ?></td>
                <td><?= h($classlfm->age_group) ?></td>
                <td><?= h($classlfm->location_id) ?></td>
                <td><?= h($classlfm->start_date) ?></td>
                <td><?= h($classlfm->end_date) ?></td>
                <td><?= h($classlfm->week_length) ?></td>
                <td><?= h($classlfm->start_time) ?></td>
                <td><?= h($classlfm->end_time) ?></td>
                <td><?= h($classlfm->duration) ?></td>
                <td><?= h($classlfm->capacity) ?></td>
                <td><?= h($classlfm->cost_per_class) ?></td>
                <td><?= h($classlfm->overflow) ?></td>
                <td><?= h($classlfm->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Classlfm', 'action' => 'view', $classlfm->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Classlfm', 'action' => 'edit', $classlfm->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Classlfm', 'action' => 'delete', $classlfm->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classlfm->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
