<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\About $about
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit About'), ['action' => 'edit', $about->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete About'), ['action' => 'delete', $about->id], ['confirm' => __('Are you sure you want to delete # {0}?', $about->id)]) ?> </li>
        <li><?= $this->Html->link(__('List About'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New About'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="about view large-9 medium-8 columns content">
    <h2><center>Content of About Us Page</center></h2>
    <div>
        <h3><?= h($about->heading) ?></h3>
    </div>
    <div class="row">
        <h4><?= h($about->title) ?></h3>
        <?= $this->Text->autoParagraph(h($about->body)); ?>
    </div>
    <div class="row">
        <h4><?= h($about->title2) ?></h3>
        <?= $this->Text->autoParagraph(h($about->body2)); ?>
        <p>Created on : <?= h($about->created) ?></p>
    </div>

</div>

