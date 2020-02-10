<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<head>
    <?= $this->Html->css('/datetimepicker/css/jquery-ui.min.css') ?>
    <?= $this->Html->script('/datetimepicker/js/jquery-ui.min.js') ?>
</head>

<div class="users form large-9 medium-8 columns content">
    <br>
    <?= $this->Form->create($user) ?>
    <div class="row col-lg-6">
        <fieldset>
            <legend><?= __('Edit User') ?></legend>
            <p>Sections marked with a * are compulsory</p>
            <?php
            echo $this->Form->control('f_name', ['class' => 'form-control',
                'placeholder' => 'Enter First Name','label'=>'First Name*', 'required' => true]);
            echo $this->Form->control('l_name', ['class' => 'form-control',
                'placeholder' => 'Enter Last Name','label'=>'Last Name*', 'required' => true]);
            echo $this->Form->control('username', ['class' => 'form-control',
                'placeholder' => 'Enter username', 'label'=>'Username *', 'required' => true]);
            echo $this->Form->control('password', ['class' => 'form-control',
                'placeholder' => 'Enter password', 'label'=>'Password *', 'required' => true]);
            echo $this->Form->control('email', ['class' => 'form-control',
                'placeholder' => 'Enter email', 'label'=>'Email *']);
            echo $this->Form->control('phone', ['class' => 'form-control',
                'placeholder' => 'Enter phone number', 'label'=>'Phone *',
                'type'=>'number', 'rule'=>array('phone','/^(?:\+?61|0)[2-478](?:[ -]?[0-9]){8}$/','all' ),
                'required' => true]);
            echo $this->Form->control('birthdate', ['class' => 'form-control','id' => 'bd',
                'type' => 'text', 'placeholder' => 'Enter Birthdate', 'required' => false]);
            echo $this->Form->control('postcode', ['class' => 'form-control',
                'placeholder' => 'Enter Postcode', 'required' => false]);
            $options = array('teacher' => 'Teacher', 'admin' => 'Admin', 'staff'=>'Staff');
//            echo $this->Form->input('role', array('options'=>$options,
//                'type'=>'select', ['empty'=>true, 'label'=>'Role *']));
            echo $this->Form->control('role', array('options'=>$options,
                'type'=>'select', ['empty'=>true, 'label'=>'Role *']));
            ?>
        </fieldset>

        <?= $this->Form->button('Save Changes', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
        <?= $this->Form->end() ?>
        <?php echo $this->Html->link(__('Back to Users'), ['action' => 'index'],
            ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])
        ?>
    </div>
</div>
<script>
    $( "#bd" ).datepicker({dateFormat:'yy-mm-dd'});
</script>
