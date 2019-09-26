<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $booking
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $booking->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bookings form large-9 medium-8 columns content">
    <?= $this->Form->create($booking) ?>
    <fieldset>
        <legend><?= __('Edit Booking') ?></legend>
        <?php
            echo $this->Form->control('booking_date', ['empty' => true]);
            echo $this->Form->control('booking_time', ['empty' => true]);
            echo $this->Form->control('booking_type');
            echo $this->Form->control('booking_status');
            echo $this->Form->control('booking_cost');
            echo $this->Form->control('class_id');
            echo $this->Form->control('child_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
