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

<div class=" view col-md-8 content">
    <h2><center>Content of Home Page</center></h2>
    <div>
        <h3><?= h($home->heading) ?></h3>
    </div>
    <div class="row">
        <h4><?= h($home->p2) ?></h3>
    </div>
    <div class="row">
        <?= $this->Text->autoParagraph(h($home->p)); ?>
    </div>
    <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-5">
            <?php echo $this->Html->link(__('Back'), ['action' => '../cms'],
                ['class' => 'btn btn-info', 'style' => 'margin-right: 5px;'])?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $home->id], ['class' => 'btn btn-success']) ?>
        </div>     
    </div>

</div>