<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bookus $bookus
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bookus->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bookus->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bookus'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bookus form large-9 medium-8 columns content">
    <?= $this->Form->create($bookus) ?>
    <fieldset>
        <legend><?= __('Edit Bookus') ?></legend>
        <?php
            echo $this->Form->control('heading');
            echo $this->Form->control('paragraph1');
            echo $this->Form->control('title1');
            echo $this->Form->control('paragraph2');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
