<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<br>
<div class="row col-lg-4">
    <?= $this->Form->create($location) ?>
        <?php
            echo $this->Form->control('name', ['class' => 'form-control']);
            echo $this->Form->control('street_address', ['class' => 'form-control']);
            echo $this->Form->control('suburb', ['class' => 'form-control']);
            echo $this->Form->control('post_code', ['class' => 'form-control']);
            echo $this->Form->control('note', ['class' => 'form-control']);
        ?>
    <?= $this->Form->button('Create', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
    <?= $this->Form->end() ?>
    <?php echo $this->Html->link(__('Back to Users'), ['action' => 'index'],
    ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])
    ?>
</div>
