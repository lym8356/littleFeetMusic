<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $term
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $term->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $term->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Terms'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="terms form large-9 medium-8 columns content">
    <?= $this->Form->create($term) ?>
    <fieldset>
        <legend><?= __('Edit Term') ?></legend>
        <?php
            echo $this->Form->control('age_group');
            echo $this->Form->control('location_id');
            echo $this->Form->control('start_date');
            echo $this->Form->control('end_date');
            echo $this->Form->control('week_length');
            echo $this->Form->control('start_time');
            echo $this->Form->control('end_time');
            echo $this->Form->control('duration');
            echo $this->Form->control('capacity');
            echo $this->Form->control('casual_rate');
            echo $this->Form->control('overflow');
            echo $this->Form->control('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
