<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Home $home
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Home'), ['action' => 'edit', $home->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Home'), ['action' => 'delete', $home->id], ['confirm' => __('Are you sure you want to delete # {0}?', $home->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Home'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Home'), ['action' => 'add']) ?> </li>
    </ul>
</nav> -->

<div class=" view col-md-8 large-9 medium-8 columns content">
    <h2><center>Content of Home Page</center></h2>
    <div>
        <h3><?= h($home->heading) ?></h3>
    </div>
    <div class="row">
        <h4><?= h($home->title) ?></h3>
        <?= $this->Text->autoParagraph(h($home->p)); ?>
    </div>
    <div class="row">
        <?= $this->Text->autoParagraph(h($home->p2)); ?>
    </div>
    <div class="row">
        <?= $this->Text->autoParagraph(h($home->p3)); ?>
    </div>
        <div class="row">
        <?= $this->Text->autoParagraph(h($home->p4)); ?>
    </div>
        <div class="row">
        <?= $this->Text->autoParagraph(h($home->p5)); ?>
    </div>
        <div class="row">
        <?= $this->Text->autoParagraph(h($home->p6)); ?>
    </div>
        <div class="row">
        <?= $this->Text->autoParagraph(h($home->p7)); ?>
    </div>
        <div class="row">
        <?= $this->Text->autoParagraph(h($home->p8)); ?>
    </div>
        <div class="row">
        <?= $this->Text->autoParagraph(h($home->p9)); ?>
    </div>
        </div>
        <div class="row">
        <?= $this->Text->autoParagraph(h($home->p10)); ?>
    </div>
    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $home->id], ['class' => 'btn btn-success pull-right']) ?>

</div>