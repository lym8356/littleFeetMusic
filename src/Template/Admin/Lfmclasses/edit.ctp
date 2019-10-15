<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lfmclass $lfmclass
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Class</title>
    <!-- datepicker -->
    <?= $this->Html->css('/datetimepicker/css/jquery-ui.min.css') ?>
    <?= $this->Html->script('/datetimepicker/js/jquery-ui.min.js') ?>
</head>
<body>
<div class="row">
    <div class="col-lg-12">
        <?= $this->Flash->render(); ?>
        <h3 class="card-header">Add New Class</h3>
        <div class="col-lg-4">
            <?= $this->Form->create($lfmclass) ?>
            <?php
            echo $this->Form->control('terms_id', ['options' => $terms, 'empty' => true, 'class' => 'form-control']);
            echo $this->Form->control('week_no', ['class' => 'form-control']);
            echo $this->Form->control('price', ['class' => 'form-control']);
            echo $this->Form->control('class_date', ['empty' => true, 'class' => 'form-control',
                'id' => 'class_date', 'type' => 'text','value'=>date('Y-m-d',strtotime($lfmclass['class_date']))]);
            ?>
            <?= $this->Form->button('Submit', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top:20px;']) ?>
            <?= $this->Form->end() ?>
            <?php echo $this->Html->link('Back', ['controller' => 'Terms','action' => 'index', $lfmclass->terms_id],
                ['class' => 'btn btn-primary pull-left',
                    'style' => 'margin-top: 20px;']) ?>
        </div>
    </div>
</div>
</body>
<script>
    $("#class_date").datepicker({dateFormat: 'yy-mm-dd'});
</script>
</html>
