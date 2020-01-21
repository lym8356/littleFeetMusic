<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\About $about
 */
?>
<div class="about form col-md-9 content">
    <?= $this->Form->create($about) ?>
    <fieldset>
        <legend><?= __('Edit Content') ?></legend>
        <p color="red"> * required </p><br>
        <?php
            echo $this->Form->control('heading', ['class' => 'form-control',
                'label'=>'Heading *', 'required' => true]);
            echo $this->Form->control('title', ['class' => 'form-control',
                'label'=>'Title *', 'required' => true]);
            echo $this->Form->control('body', ['class' => 'form-control',
                'label'=>'Body *', 'required' => true]);
            echo $this->Form->control('title2', ['class' => 'form-control',
                'label'=>'Title 2', 'required' => false]);
            echo $this->Form->control('body2', ['class' => 'form-control',
                'label'=>'Body 2', 'required' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button('Submit', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
    <?php echo $this->Html->link(__('Back'), ['action' => 'index'],
            ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])
        ?>
    <?= $this->Form->end() ?>
</div>