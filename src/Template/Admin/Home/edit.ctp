<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Home $home
 */
?>
<div class="home form col-md-9 content">
    <?= $this->Form->create($home) ?>
    <fieldset>
        <legend><?= __('CMS for Homepage elements') ?></legend>
        <p color="red"> * required </p><br>
        <?php
            echo $this->Form->control('heading', ['class' => 'form-control',
                'label'=>'Heading', 'required' => false]);
            echo $this->Form->control('p2', ['class' => 'form-control',
                'label'=>'Title', 'required' => false]);
            echo $this->Form->control('p', ['class' => 'form-control',
                'label'=>'Paragraph *', 'required' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button('Submit', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
    <?php echo $this->Html->link(__('Back'), ['action' => 'view/1'],
            ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])?>
    <?= $this->Form->end() ?>
</div>
