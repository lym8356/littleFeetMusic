<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="card-header">Class Enrolment</h3>
            <div class="col-lg-6">
                <?php echo $this->Form->create($enrolment);
                echo $this->Form->control('price', ['class' => 'form-control',
                    'id' => 'start_date','value'=>$lfmdata['price'], 'type' => 'text']);
                echo $this->Form->control('location', ['class' => 'form-control','value'=>$termData['location']['name'], 'type' => 'text']);

                ?>
            </div>
            <div class="col-lg-6">
                <?php $this->Form->control('location', ['class' => 'form-control','value'=>$termData['location']['name'], 'type' => 'text']); ?>
            </div>
        </div>
    </div>
</body>

<script>
    $('#enrolNew').click(function (e) {
        e.preventDefault();
        $.ajax({
            method: 'post',
            url: "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'signup']); ?>",
            data: {},
            success: function (response) {
                $('.modal-body').html(response);
            }
        });
    });
</script>
</html>
