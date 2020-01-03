<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Child $child
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $child->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $child->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Childs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enrolments'), ['controller' => 'Enrolments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enrolment'), ['controller' => 'Enrolments', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="childs form large-9 medium-8 columns content">
    <?= $this->Form->create($child) ?>
    <fieldset>
        <legend><?= __('Edit Child') ?></legend>
        <?php
            echo $this->Form->control('first_name');
            echo $this->Form->control('last_name');
            echo $this->Form->control('dob');
            echo $this->Form->control('note');
            echo $this->Form->control('users._ids', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
