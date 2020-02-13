<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrol $enrol
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $enrol->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $enrol->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Enrol'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Enrolmentstest'), ['controller' => 'Enrolmentstest', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enrolmentstest'), ['controller' => 'Enrolmentstest', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Lfmclasses'), ['controller' => 'Lfmclasses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Lfmclass'), ['controller' => 'Lfmclasses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Enrol'), ['controller' => 'Enrol', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Enrol'), ['controller' => 'Enrol', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enrol form large-9 medium-8 columns content">
    <?= $this->Form->create($enrol) ?>
    <fieldset>
        <legend><?= __('Edit Enrol') ?></legend>
        <?php
            echo $this->Form->control('enrol_id', ['options' => $enrolmentstest]);
            echo $this->Form->control('lfmclass_id', ['options' => $lfmclasses]);
            echo $this->Form->control('attendance');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
