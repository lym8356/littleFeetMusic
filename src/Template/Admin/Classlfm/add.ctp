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
            $( function() {
                $( "#start_date" ).datepicker({dateFormat:'yy-mm-dd'});
                $( "#end_date" ).datepicker({dateFormat:'yy-mm-dd'});

                $('#start_date, #week_length').bind('change', function() {

                    var days = parseInt($('#week_length').val() * 7);
                    var endDate = new Date($('#start_date').val());
                    endDate.setDate(endDate.getDate() + days);
                    //$('#end_date').val( (endDate.getMonth() + 1)+ '/' + endDate.getDate() + '/' + endDate.getFullYear() );
                    $('#end_date').val( endDate.getFullYear() + '-' + (endDate.getMonth() + 1) + '-' + endDate.getDate() );
                });


            } );
            $( function () {

                $('#start_time').timepicker({ 'timeFormat': 'H:i' });
                $('#end_time').timepicker({ 'timeFormat': 'H:i' });

                $('#start_time, #duration').bind('change', function() {

                    var startTime = $('#start_time').val();
                    var timeChange = parseInt($('#duration').val());
                    var startHour = startTime.split(':')[0];
                    var startMin = startTime.split(':')[1];
                    var endHour = 0;
                    var endMin = 0;
                    var hour = Math.floor(timeChange/60);
                    var minute = timeChange % 60;
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
            <h3 class="card-header">Add Class</h3>
            <div class="col-lg-6">
                <?= $this->Form->create($classlfm) ?>

                <?php
                echo $this->Form->control('name', ['class' => 'form-control']);
                echo $this->Form->control('age_group', ['class' => 'form-control']);
                echo $this->Form->control('location_id', ['class' => 'form-control', 'empty' => 'Please Select']);
                echo $this->Form->control('start_date', ['class' => 'form-control',
                    'id' => 'start_date', 'type' => 'text']);
                echo $this->Form->control('week_length', ['class' => 'form-control', 'id' => 'week_length']);
                echo $this->Form->control('end_date', ['class' => 'form-control',
                    'id' => 'end_date', 'type' => 'text']);

                ?>
                <?php echo $this->Html->link('Back', ['action' => 'index'],
                    ['class' => 'btn btn-primary pull-left',
                        'style' => '',
                        'escape' => false]) ?>

            </div>
            <div class="col-lg-6">
                <?php
                echo $this->Form->control('start_time', ['class' => 'form-control',
                    'id' => 'start_time', 'type' => 'text']);
                echo $this->Form->control('duration', ['class' => 'form-control', 'value' => '0','label' => 'Class Duration (in minutes)',
                    'id' => 'duration']);
                echo $this->Form->control('end_time', ['class' => 'form-control',
                    'id' => 'end_time', 'type' => 'text']);
                echo $this->Form->control('capacity', ['class' => 'form-control']);
                echo $this->Form->control('cost_per_class', ['class' => 'form-control']);
                echo $this->Form->control('overflow', ['class' => 'custom-control-input']);
                echo $this->Form->control('note', ['class' => 'form-control', 'type' => 'textarea']);

                echo $this->Form->button('Create', ['class' => 'pt-5 btn btn-success pull-right']);
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</body>
</html>
