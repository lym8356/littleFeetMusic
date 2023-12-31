<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
 */
?>
<div class="users form large-9 medium-8 columns content">
    <br>
    <?= $this->Form->create($location) ?>
    <div class="row col-lg-6">
        <fieldset>
            <legend><?= __('Edit Location') ?></legend>
            <?php
            echo $this->Form->control('name', ['class' => 'form-control',
                'placeholder' => 'Please enter location name', 'required' => true]);
            echo $this->Form->control('street_address', ['class' => 'form-control',
                'placeholder' => 'Please enter street address', 'required' => true]);
            echo $this->Form->control('suburb', ['class' => 'form-control',
                'placeholder' => 'Please enter suburb name', 'required' => true]);
            echo $this->Form->control('post_code', ['class' => 'form-control',
                'placeholder' => 'Please enter postcode', 'required' => true]);
            echo $this->Form->control('note', ['class' => 'form-control',
                'placeholder' => 'Add any notes here', 'required' => false]);            ?>
        </fieldset>
        <?= $this->Form->button('Save Changes', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
        <?= $this->Form->end() ?>
        <?php echo $this->Html->link(__('Back to Location List'), ['action' => 'index'],
            ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])
        ?>
    </div>
</div>
