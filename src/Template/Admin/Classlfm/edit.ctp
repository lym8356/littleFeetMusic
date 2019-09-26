<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classlfm $classlfm
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Class</title>
    <script>
        let options = {twentyFour: true};
        $( function() {
            $( "#start_date" ).datepicker({dateFormat:'yy-mm-dd'});
            $( "#end_date" ).datepicker({dateFormat:'yy-mm-dd'});


            $('#start_time').timepicker({ 'timeFormat': 'H:i' });
            $('#end_time').timepicker({ 'timeFormat': 'H:i' });
        } );
    </script>
    <!-- datepicker -->
    <?= $this->Html->css('/datetimepicker/css/jquery-ui.min.css') ?>
    <?= $this->Html->script('/datetimepicker/js/jquery-ui.min.js') ?>

    <!-- timepicker -->
    <?= $this->Html->css('/datetimepicker/css/jquery.timepicker.min.css') ?>
    <?= $this->Html->script('/datetimepicker/js/jquery.timepicker.min.js') ?>


</head>

<body>
<div class="row">
    <div class="col-lg-12">
        <?php
        echo $this->Flash->render();

        $this->Form->setTemplates([

            'inputContainerError' => '<div class="form-group has-danger {{type}}{{required}}">{{content}}{{error}}</div>',
            'error' => '<div class="text-danger">{{content}}</div>',
        ]);
        ?>
        <h3 class="card-header">Edit Class</h3>
        <div class="col-lg-6">
            <?= $this->Form->create($classlfm) ?>

            <?php
            echo $this->Form->control('name', ['class' => 'form-control']);
            echo $this->Form->control('age_group', ['class' => 'form-control']);
            echo $this->Form->control('location_id', ['class' => 'form-control']);
            echo $this->Form->control('start_date', ['class' => 'form-control',
                'id' => 'start_date', 'type' => 'text']);
            echo $this->Form->control('end_date', ['class' => 'form-control',
                'id' => 'end_date', 'type' => 'text']);
            echo $this->Form->control('week_length', ['class' => 'form-control']);
            echo $this->Form->control('start_time', ['class' => 'form-control',
                'id' => 'start_time', 'type' => 'text']);
            echo $this->Form->control('end_time', ['class' => 'form-control',
                'id' => 'end_time', 'type' => 'text']);

            ?>
            <?php echo $this->Html->link('Back', ['action' => 'index'],
                ['class' => 'btn btn-primary pull-left',
                    'style' => 'margin-bottom: 20px',
                    'escape' => false]) ?>

        </div>
        <div class="col-lg-6">
            <?php
            echo $this->Form->control('duration', ['class' => 'form-control']);
            echo $this->Form->control('capacity', ['class' => 'form-control']);
            echo $this->Form->control('cost_per_class', ['class' => 'form-control']);
            echo $this->Form->control('overflow', ['class' => 'custom-control-input']);
            echo $this->Form->control('note', ['class' => 'form-control', 'type' => 'textarea']);

            echo $this->Form->button('Confirm', ['class' => 'pt-5 btn btn-success pull-right']);
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>
</div>
</body>
</html>
