<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Home $home
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Home'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="home form large-9 medium-8 columns content">
    <?= $this->Form->create($home) ?>
    <fieldset>
        <legend><?= __('Add Home') ?></legend>
        <?php
            echo $this->Form->control('heading');
            echo $this->Form->control('title');
            echo $this->Form->control('p');
            echo $this->Form->control('p2');
            echo $this->Form->control('p3');
            echo $this->Form->control('p4');
            echo $this->Form->control('p5');
            echo $this->Form->control('p6');
            echo $this->Form->control('p7');
            echo $this->Form->control('p8');
            echo $this->Form->control('p9');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
