<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $location->Id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $location->Id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Location'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Classlfm'), ['controller' => 'Classlfm', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Classlfm'), ['controller' => 'Classlfm', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="location form large-9 medium-8 columns content">
    <?= $this->Form->create($location) ?>
    <fieldset>
        <legend><?= __('Edit Location') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('street_address');
            echo $this->Form->control('suburb');
            echo $this->Form->control('post_code');
            echo $this->Form->control('note');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
