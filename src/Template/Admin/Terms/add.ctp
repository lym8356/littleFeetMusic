<?php
/**
 * @let \App\View\AppView $this
 * @let \Cake\Datasource\EntityInterface $term
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add New Term</title>

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
        <h3 class="card-header">Add New Teaching Period</h3>
        <div class="col-lg-6">
            <?php echo $this->Form->create($term);
            echo $this->Form->control('start_date', ['class' => 'form-control',
                'id' => 'start_date', 'type' => 'text']);
            echo $this->Form->control('week_length', ['class' => 'form-control', 'id' => 'week_length']);
            ?>
            <table class="table table-bordered" style="margin-top: 10px;">
                <thead>
                    <tr>
                        <th scope="col">Week Number </th>
                        <th scope="col">Price For Each Week</th>
                    </tr>
                </thead>
                <tbody id="price_tb">

                </tbody>

            </table>
            <?php echo $this->Form->control('end_date', ['class' => 'form-control',
                'id' => 'end_date', 'type' => 'text']); ?>
            <?php echo $this->Html->link('Back', ['action' => 'index'],
                ['class' => 'btn btn-primary pull-left',
                    'style' => 'margin-top: 10px;',
                    'escape' => false]) ?>

        </div>
        <div class="col-lg-6">
            <?php
            echo $this->Form->control('age_group', ['class' => 'form-control']);
            echo $this->Form->control('location_id', ['class' => 'form-control', 'empty' => 'Please Select']);
            echo $this->Form->control('start_time', ['class' => 'form-control',
                'id' => 'start_time', 'type' => 'text']);
            echo $this->Form->control('duration', ['class' => 'form-control', 'value' => '0','label' => 'Class Duration (in minutes)',
                'id' => 'duration']);
            echo $this->Form->control('end_time', ['class' => 'form-control',
                'id' => 'end_time', 'type' => 'text']);
            echo $this->Form->control('capacity', ['class' => 'form-control']);
            echo $this->Form->control('casual_rate', ['class' => 'form-control']);
            echo $this->Form->control('overflow', ['class' => 'custom-control-input']);
            echo $this->Form->control('note', ['class' => 'form-control', 'type' => 'textarea']);

            echo $this->Form->button('Create', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;']);
            echo $this->Form->end();
            ?>
        </div>
    </div>
</div>

<script>


    $( function() {
        $( "#start_date" ).datepicker({dateFormat:'yy-mm-dd'});
        $( "#end_date" ).datepicker({dateFormat:'yy-mm-dd'});

        $('#start_date, #week_length').bind('change', function() {

            let days = parseInt($('#week_length').val() * 7);
            let endDate = new Date($('#start_date').val());
            endDate.setDate(endDate.getDate() + days);
            //$('#end_date').val( (endDate.getMonth() + 1)+ '/' + endDate.getDate() + '/' + endDate.getFullYear() );
            $('#end_date').val( endDate.getFullYear() + '-' + (endDate.getMonth() + 1) + '-' + endDate.getDate() );
        });


    } );
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

        let weekNum = 1;

        $("#week_length").blur(function(){
            let rowCount = $('#price_tb tr').length;
            let weekLength = $("#week_length").val();

            if(rowCount < weekLength){
                for(let i = 0; i < weekLength - rowCount; i++){
                    $("#price_tb").append("<tr><td>" + weekNum + "<td>" +"<input name='week_no[]' type='hidden' value='"+weekNum+"'/>"+
                        '<?php echo $this->Form->control('price[]', ['class' => 'form-inline','label'=>'Price']) ?>'+ "</td>" +"</td></tr>");
                    weekNum++;
                }
            }else if(weekLength < rowCount){
                for(let j = 0; j < rowCount - weekLength; j++){
                    $('#price_tb tr:last').remove();
                    weekNum--;
                }
            }
        });
    });
</script>
</body>
</html>