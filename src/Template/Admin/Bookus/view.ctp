<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookus $bookus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bookus'), ['action' => 'edit', $bookus->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bookus'), ['action' => 'delete', $bookus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookus->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bookus'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookus view large-9 medium-8 columns content">
    <h3><?= h($bookus->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Heading') ?></th>
            <td><?= h($bookus->heading) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bookus->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Paragraph1') ?></h4>
        <?= $this->Text->autoParagraph(h($bookus->paragraph1)); ?>
    </div>
    <div class="row">
        <h4><?= __('Title1') ?></h4>
        <?= $this->Text->autoParagraph(h($bookus->title1)); ?>
    </div>
    <div class="row">
        <h4><?= __('Paragraph2') ?></h4>
        <?= $this->Text->autoParagraph(h($bookus->paragraph2)); ?>
    </div>
</div>
