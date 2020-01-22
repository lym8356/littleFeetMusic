<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Home[]|\Cake\Collection\CollectionInterface $home
 */
?>
<div class="home index col-md-8 content">
    <h3><?= __('Home') ?></h3>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('heading') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($home as $home): ?>
            <tr>
                <td><?= h($home->title) ?></td>
                <td><?= h($home->heading) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $home->id], ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $home->id], ['class' => 'btn btn-success']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


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
