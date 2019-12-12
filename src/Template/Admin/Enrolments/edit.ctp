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
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="enrolments form large-9 medium-8 columns content">
    <?= $this->Form->create($enrolment) ?>
    <fieldset>
        <legend><?= __('Edit Enrolment') ?></legend>
        <?php
            echo $this->Form->control('enrolment_date', ['empty' => true]);
            echo $this->Form->control('enrolment_time', ['empty' => true]);
            echo $this->Form->control('enrolment_type');
            echo $this->Form->control('enrolment_status');
            echo $this->Form->control('enrolment_cost');
            echo $this->Form->control('terms_id', ['options' => $terms, 'empty' => true]);
            echo $this->Form->control('customer_name');
            echo $this->Form->control('customer_phone');
            echo $this->Form->control('customer_email');
            echo $this->Form->control('child_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
