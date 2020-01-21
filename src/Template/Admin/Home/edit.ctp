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
            echo $this->Form->control('title', ['class' => 'form-control',
                'label'=>'Title', 'required' => false]);
            echo $this->Form->control('p', ['class' => 'form-control',
                'label'=>'Paragraph *', 'required' => true]);
            echo $this->Form->control('p2', ['class' => 'form-control',
                'label'=>'Additional Paragraph', 'required' => false]);
            echo $this->Form->control('p3', ['class' => 'form-control',
                'label'=>'Additional Paragraph', 'required' => false]);
            echo $this->Form->control('p4', ['class' => 'form-control',
                'label'=>'Additional Paragraph', 'required' => false]);
            echo $this->Form->control('p5', ['class' => 'form-control',
                'label'=>'Additional Paragraph', 'required' => false]);
            echo $this->Form->control('p6', ['class' => 'form-control',
                'label'=>'Additional Paragraph', 'required' => false]);
            echo $this->Form->control('p7', ['class' => 'form-control',
                'label'=>'Additional Paragraph', 'required' => false]);
            echo $this->Form->control('p8', ['class' => 'form-control',
                'label'=>'Additional Paragraph', 'required' => false]);
            echo $this->Form->control('p9', ['class' => 'form-control',
                'label'=>'Additional Paragraph', 'required' => false]);
        ?>
    </fieldset>
    <?= $this->Form->button('Submit', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
    <?php echo $this->Html->link(__('Back'), ['action' => 'index'],
            ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])
        ?>
    <?= $this->Form->end() ?>
</div>
