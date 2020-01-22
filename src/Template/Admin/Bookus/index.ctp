<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookus[]|\Cake\Collection\CollectionInterface $bookus
 */
?>
<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bookus'), ['action' => 'add']) ?></li>
    </ul>
</nav>
-->
<!--
<div class="bookus index large-9 medium-8 columns content">
    <h3><?= __('Bookus') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('heading') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookus as $bookus): ?>
            <tr>
                <td><?= $this->Number->format($bookus->id) ?></td>
                <td><?= h($bookus->heading) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bookus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bookus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bookus->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
-->

<div class=" view col-md-8 content">
    <h2><center>Contents of Book Us Page</center></h2>
    <div>
        <h3><?= h($bookus->heading) ?></h3>
    </div>
    <div class="row">
        <h4><?= h($bookus->title) ?></h3>
            <?= $this->Text->autoParagraph(h($bookus->paragraph1)); ?>
    </div>
    <div class="row">
        <h4><?= h($bookus->title1) ?></h4>
    </div>
    <div class="row">
        <?= $this->Text->autoParagraph(h($bookus->paragraph2)); ?>
    </div>

    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-5">
            <?php echo $this->Html->link(__('Back'), ['action' => '../cms'],
                ['class' => 'btn btn-info', 'style' => 'margin-right: 5px;'])?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bookus->id], ['class' => 'btn btn-success']) ?>
        </div>
    </div>

</div>
