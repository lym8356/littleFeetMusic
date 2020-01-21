<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\About[]|\Cake\Collection\CollectionInterface $about
 */
?>
<!-- DON'T DELETE!!!
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New About'), ['action' => 'add']) ?></li>
    </ul>
</nav> -->
<!-- <div class="about index large-9 medium-8 columns content">
    <h3><?= __('About') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('heading') ?></th>
                <th scope="col" colspan="2" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($about as $about): ?>
            <tr>
                <td><?= h($about->heading) ?></td>
                <td class="actions">
                    <div class="btn" role="group">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $about->id], ['class' => 'btn btn-primary']) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $about->id], ['class' => 'btn btn-success']) ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div> -->
<div class="about view col-md-8 large-9 medium-8 columns content">
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
    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $about->id], ['class' => 'btn btn-success pull-right']) ?>

</div>
