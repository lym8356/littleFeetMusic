<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolmentstest $enrolmentstest
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Enrolmentstest'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="enrolmentstest form large-9 medium-8 columns content">
    <?= $this->Form->create($enrolmentstest) ?>
    <fieldset>
        <legend><?= __('Add Enrolmentstest') ?></legend>
        <?php
            echo $this->Form->control('enrolment_type');
            echo $this->Form->control('enrolment_status');
            echo $this->Form->control('enrolment_cost');
            echo $this->Form->control('comment');
            echo $this->Form->control('guardian_id');
            echo $this->Form->control('child_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
