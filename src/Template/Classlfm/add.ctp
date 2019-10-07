<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classlfm $classlfm
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Classlfm'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="classlfm form large-9 medium-8 columns content">
    <?= $this->Form->create($classlfm) ?>
    <fieldset>
        <legend><?= __('Add Classlfm') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('age_group');
            echo $this->Form->control('location_id', ['options' => $locations]);
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('week_length');
            echo $this->Form->control('start_time');
            echo $this->Form->control('end_time');
            echo $this->Form->control('duration');
            echo $this->Form->control('capacity');
            echo $this->Form->control('cost_per_class');
            echo $this->Form->control('overflow');
            echo $this->Form->control('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
