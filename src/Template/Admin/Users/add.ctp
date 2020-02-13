<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<head>
    <!-- datepicker -->
    <?= $this->Html->css('/datetimepicker/css/jquery-ui.min.css') ?>
    <?= $this->Html->script('/datetimepicker/js/jquery-ui.min.js') ?>
</head>
<br>
<div class="row col-lg-10">
    <?= $this->Form->create($user) ?>
    <div class="col-lg-6">
        <fieldset>
        <?php
        echo $this->Form->control('f_name', ['class' => 'form-control',
            'placeholder' => 'Enter First Name','label'=>'First Name*', 'required' => true]);
        echo $this->Form->control('l_name', ['class' => 'form-control',
            'placeholder' => 'Enter Last Name','label'=>'Last Name*', 'required' => true]);
//        echo $this->Form->control('username', ['class' => 'form-control',
//            'placeholder' => 'Enter username', 'value'=>'', 'label'=>'Username *', 'required' => true]);
        echo $this->Form->control('email', ['class' => 'form-control',
            'placeholder' => 'Enter email', 'value'=>'', 'label'=>'Email *', 'required' => true]);
        echo $this->Form->control('password', ['class' => 'form-control',
            'placeholder' => 'Enter password', 'value'=>'', 'autocomplete'=>"new-password",
                'label'=>'Password *', 'required' => true]);
        echo $this->Form->control('phone', ['class' => 'form-control',
            'placeholder' => 'Enter phone number', 'value'=>'', 'label'=>'Phone *', 'required' => true]);
        echo $this->Form->control('birthday', ['class' => 'form-control', 'id' => 'bd', 'type' => 'text',
            'placeholder' => 'Enter Birthday', 'value'=>'', 'required' => false]);
        echo $this->Form->control('postcode', ['class' => 'form-control',
            'placeholder' => 'Enter Postcode', 'value'=>'', 'required' => false]);
        $options = array('teacher' => 'Teacher', 'admin' => 'Admin', 'staff'=>'Staff'); ?>
        <div class="form-group"><?= $this->Form->control('role', array('class' => 'form-control', 'options'=>$options,
            'type'=>'select', ['empty'=>true, 'label'=>'Role *', 'class' => 'form-control','style' => 'margin-left: 10px;']));
            ?></div>
        </fieldset>
        <?= $this->Form->button('Save Changes', ['class' => 'btn btn-success pull-right',
            'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
        <?= $this->Form->end() ?>
        <?php echo $this->Html->link(__('Back'), ['action' => 'index'],
            ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])
        ?>
    </div>
</div>

<script>
    $( "#bd" ).datepicker({dateFormat:'yy-mm-dd'});
</script>
