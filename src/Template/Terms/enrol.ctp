<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="row" id="enrol_status">
    <div class="col-lg-6">
        <?php
        echo $this->Form->control('price', ['class' => 'form-control',
            'id' => 'start_date', 'value' => $lfmdata['price'], 'type' => 'text']);
        echo $this->Form->control('location', ['class' => 'form-control', 'value' => $termData['location']['name'], 'type' => 'text']);
        echo $this->Form->control('phone', ['class' => 'form-control', 'type' => 'number']);
        echo $this->Form->control('child_name', ['class' => 'form-control']);

        ?>
    </div>
    <div class="col-lg-6">
        <?php echo $this->Form->control('class_time', ['class' => 'form-control',
            'value' => date("G:i", strtotime($termData['start_time'])), 'type' => 'text']);
        echo $this->Form->control('age_group', ['class' => 'form-control', 'value' => $termData['age_group'], 'type' => 'text']);
        echo $this->Form->control('Customer Name', ['class' => 'form-control']);
        echo $this->Form->control('email', ['class' => 'form-control']);

        echo $this->Form->button('Create', ['class' => 'btn btn-success mt-3 pull-right','id'=> 'enrolBtn']);
        $this->Form->end();
        ?>
    </div>
</div>
</body>

<script>
    $('#enrolBtn').click(function (e) {
        //e.preventDefault();
        let csrf_token = $("input [name = '_ csrfToken']").val() ;
        let formSerialize = $('#enrol_form').serialize();
        $.ajax({
            beforeSend : function (xhr){
                xhr.setRequestHeader('X-CSRF-Token' , csrf_token)
            }
            type: "POST",
            dataType: "JSON",
            async: true,
            url: "<?php echo $this->Url->build(['controller' => 'Terms', 'action' => 'enrol']); ?>",
            data: formSerialize,
            success: function (response) {
                $('#enrol_status').html(response);
            }
        });
    });
</script>
</html>
