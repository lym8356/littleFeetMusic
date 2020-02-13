<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $term
 */
?>
<!DOCTYPE html>
<html>
<head>

    <!-- timepicker -->
    <?= $this->Html->css('/datetimepicker/css/jquery.timepicker.min.css') ?>
    <?= $this->Html->script('/datetimepicker/js/jquery.timepicker.min.js') ?>
</head>
<body>
<div class="row">
    <div class="col-lg-12">
    <?= $this->Flash->render(); ?>
        <h3 class="card-header">Edit Teaching Period</h3>
        <div class="col-lg-6">
        <?= $this->Form->create($term) ?>
            <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('age_group', ['class' => 'form-control']);
                echo $this->Form->control('location_id', ['class' => 'form-control']);
                echo $this->Form->control('note', ['class' => 'form-control', 'type' => 'textarea']);
                ?>

                <?php echo $this->Html->link('Back', ['action' => 'index'],
                    ['class' => 'btn btn-primary pull-left',
                        'style' => 'margin-top: 10px;',
                        'escape' => false]) ?>
        </div>
        <div class="col-lg-6">
            <?php
                echo $this->Form->control('start_time', ['class' => 'form-control',
                    'id' => 'start_time', 'type' => 'text', 'value'=>date('H:i',strtotime($term['start_time']))]);
                echo $this->Form->control('duration', ['class' => 'form-control']);
                echo $this->Form->control('end_time', ['class' => 'form-control',
                    'id' => 'end_time', 'type' => 'text', 'value'=>date('H:i',strtotime($term['end_time']))]);
                echo $this->Form->control('capacity', ['class' => 'form-control','type' => 'number']);
                echo $this->Form->control('casual_rate', ['class' => 'form-control','type' => 'number']);
                echo $this->Form->control('overflow', ['class' => 'custom-control-input']);

                ?>
            <?= $this->Form->button('Save Changes', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']) ?>
            <?= $this->Form->end() ?>
        </div>

        </div>
    </div>
</div>
</body>

<script>

    $( function () {

        $('#start_time').timepicker({ 'timeFormat': 'H:i' });
        $('#end_time').timepicker({ 'timeFormat': 'H:i' });

        $('#start_time, #duration').bind('change', function() {

            let startTime = $('#start_time').val();
            let timeChange = parseInt($('#duration').val());
            let startHour = startTime.split(':')[0];
            let startMin = startTime.split(':')[1];
            let endHour = 0;
            let endMin = 0;
            let hour = Math.floor(timeChange/60);
            let minute = timeChange % 60;
            if(hour >= 1){
                endHour = parseInt(startHour) + parseInt(hour);
                endMin = parseInt(startMin) + parseInt(minute);
                if(endMin >= 60){
                    endHour++;
                    endMin = endMin - 60;
                }
                if(endHour > 23){
                    endHour = 24 - endHour;
                }
                if(endHour < 10){
                    endHour = '0' + endHour;
                }
                if(endMin < 10){
                    endMin = '0' + endMin;
                }
            }else{
                endHour = parseInt(startHour);
                endMin = parseInt(startMin) + parseInt(timeChange);
                if(endMin >= 60){
                    endHour++;
                    endMin = endMin - 60;
                }
                if(endHour > 23){
                    endHour = 24 - endHour;
                }
                if(endHour < 10){
                    endHour = '0' + endHour;
                }
                if(endMin < 10){
                    endMin = '0' + endMin;
                }
            }
            $('#end_time').val(endHour + ':' + endMin);

        });

    });
</script>

</html>
