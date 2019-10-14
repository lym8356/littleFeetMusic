<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lfmclass $lfmclass
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $lfmclass->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $lfmclass->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Lfmclasses'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="lfmclasses form large-9 medium-8 columns content">
    <?= $this->Form->create($lfmclass) ?>
    <fieldset>
        <legend><?= __('Edit Lfmclass') ?></legend>
        <?php
            echo $this->Form->control('term_id', ['options' => $terms, 'empty' => true]);
            echo $this->Form->control('week_no');
            echo $this->Form->control('price');
            echo $this->Form->control('class_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
