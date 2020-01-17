<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Child $child
 */

?>
<br>
<div class="row col-lg-4">
    <?= $this->Form->create($child) ?>
        <?php
            echo $this->Form->control('first_name', ['class' => 'form-control',
                'placeholder' => 'Please enter first name', 'required' => true]);
            echo $this->Form->control('last_name', ['class' => 'form-control mt-2',
                'placeholder' => 'Please enter last name', 'required' => true]);
            echo $this->Form->control('dob', ['class' => 'form-control',
                'placeholder' => 'Please enter Date of birth', 'required' => true]);
            echo $this->Form->control('note', ['class' => 'form-control',
                'placeholder' => 'Any additional note', 'required' => false])
        ?>
    <?= $this->Form->button('Create', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
    <?= $this->Form->end() ?>
    <?php echo $this->Html->link(__('Back to child'), ['action' => 'index'],
    ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])
    ?>
</div>
