<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment $enrolment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
<!--        <li class="heading">--><?//= __('Actions') ?><!--</li>-->
<!--        <li>--><!--<?//= $this->Html->link(__('List Childs'), ['controller' => 'Childs', 'action' => 'index']) ?>--><!--</li>-->
    </ul>
</nav>
<!--        <li>--><!--<?//= $this->Html->link(__('New Child'), ['controller' => 'Childs', 'action' => 'add']) ?>--><!--</li>-->
<div class="enrolments form large-9 medium-8 columns content">
    <?= $this->Form->create($enrolment) ?>
    <fieldset>
        <legend><?= __('Add Enrolment') ?></legend>
        <button><?= $this->Html->link(__('List Enrolments'), ['action' => 'index']) ?></button>
        <button><?= $this->Html->link(__('List Lfmclasses'), ['controller' => 'Lfmclasses', 'action' => 'index']) ?></button>
        <button><?= $this->Html->link(__('New Lfmclass'), ['controller' => 'Lfmclasses', 'action' => 'add']) ?></button>
        <br><br>
        <?php
            echo $this->Form->control('enrolment_date', ['empty' => true]);
            echo $this->Form->control('enrolment_time', ['empty' => true]);
            echo $this->Form->control('enrolment_type');
            echo $this->Form->control('enrolment_status');
            echo $this->Form->control('enrolment_cost');
            echo $this->Form->control('lfmclasses_id');
//            echo $this->Form->control('child_id', ['options' => $childs, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
