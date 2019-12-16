<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment $enrolment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $enrolment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $enrolment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Enrolments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Lfmclasses'), ['controller' => 'Lfmclasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lfmclass'), ['controller' => 'Lfmclasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Childs'), ['controller' => 'Childs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Child'), ['controller' => 'Childs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enrolments form large-9 medium-8 columns content">
    <?= $this->Form->create($enrolment) ?>
    <fieldset>
        <legend><?= __('Edit Enrolment') ?></legend>
        <?php
            echo $this->Form->control('enrolment_type');
            echo $this->Form->control('enrolment_status');
            echo $this->Form->control('enrolment_cost');
            echo $this->Form->control('lfmclasses_id', ['options' => $lfmclasses]);
            echo $this->Form->control('guardian_id', ['options' => $users]);
            echo $this->Form->control('child_id', ['options' => $childs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
