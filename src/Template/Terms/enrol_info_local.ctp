<!DOCTYPE html>
<html>
<head>
    <style>
        .enrol_info_table, .enrol_info_table th, .enrol_info_table td{
            border: 2px solid mediumseagreen !important;
        }
        th,td{
            max-width: 100px;
        }
        .fixed-col{
        min-width: 100px;
        max-width: 100px;
        }
    </style>
    <!-- custom css -->
    <?= $this->Html->css('homepage.css') ?>
    <!-- bootstrap -->
    <?= $this->Html->css('/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->script('/bootstrap/js/jquery-3.3.1.slim.min.js') ?>
    <?= $this->Html->script('/bootstrap/js/jquery-3.4.1.min.js') ?>
    <?= $this->Html->script('/bootstrap/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/bootstrap/js/popper.min.js') ?>
    <!-- font awesome -->
    <?= $this->Html->css('/font-awesome/css/all.min.css') ?>
    <?= $this->Html->script('/font-awesome/js/all.min.js') ?>

</head>
<body>
<section>

<div class="headpic">
    <div class="container">
        <?php echo $this->Html->image('LFM.jpg'); ?>
    </div>
</div>

<div class="Heading container ">
    <h2 class="mt-3"><b>Term 2 Starts on 2nd January 2020 and Finishes on 3rd April 2020</b></h2>
</div>

<div class="row">
    <div class="container">
<!--         <table class="enrol_info_table table-bordered">
            <thead>
                <tr>
                    <th> Head</th>
                </tr>
            </thead>
                <tr>
                    <td>td1</td>
                    <td>td2</td>
                </tr>
        </table> -->
        <?php foreach ($termsArray as $key=>$location_d): ?>
            <?php if(count($termsArray)>0){?>
<!--                     <div class="text-center" style="margin-top: 30px;font-weight:bold;color:#3a945b;" width="500"><h3><?php echo $key ." " ;?></h3></div> -->
                    <div class="text-center" width="500"><h3 style="color:#3a945b; margin-top: 30px; font-weight: bold;"><?php echo $key ." " ;?></h3></div>
                    <table style="margin-top: 10px;" class=" ab1 enrol_info_table table-bordered" align="center">
                    <thead class="col-sm-2">
                    <tr >
                        <th></th>
                        <?php $header=[];
                            foreach ($location_d as $key1=>$terms_d){ ?>
                            <?php

                            foreach($terms_d as $termd){$header[]=$termd['age_group'];

                                ?>

                                <?php echo "<th class='fixed-col'><span style='color: mediumseagreen;'>".$termd['age_group']."</span>"."<br>".date("h:i a", strtotime($termd['start_time']))."-".date("h:i a", strtotime($termd['end_time']))."
                                   <br>"."<span style='color: red'>".$termd['remaining_class_count']."</span>"." weeks"."</th>"; ?>

                            <?php }}?>
                    <tr>
                    </thead>

                    <?php foreach ($location_d as $key1=>$terms_d){
                        // array_column($terms_d,'age_group');
                        ?>
                        <tr>
                            <td id="locell">Location:<br><b><?php echo $key1 ?></b></td>
                            <?php $flag=false;foreach($terms_d as $termd){ ?>
                                <?php for($i=0;$i<count($header);$i++){?>
                                    <?php if($header[$i]==$termd['age_group']){$flag=true;?>
                                        <td class="text-center fixed-col">
                                            <button type="button" class="btn btn-primary term_price_btn mt-2 fixedsize p-1" style="background-color:#CC0000;" data-backdrop="static"
                                                    data-keyboard="false" data-toggle="modal" data-target="#enrolInfo" data-termid= "<?php echo $termd['term_id']."-".$termd['lfm_primary_key']; ?>">
                                                <b>Enrol:</b><?php echo " $".$termd['price'] ?>
                                            </button><br>

                                            <!--<strong>Casual:</strong>-->
                                            <button type="button" class="btn btn-info causal_price_btn mt-2 fixedsize p-1" style="background-color:orange;" data-backdrop="static"
                                                    data-keyboard="false" data-toggle="modal" data-target="#enrolInfo" data-termid= "<?php echo $termd['term_id']; ?>">
                                                <!--<?php echo "$".$termd['casual_rate'] ?>-->Casual
                                            </button>
                                        </td>
                                        <?php
                                        break;}else{?>
                                        <?php if(!$flag){?>
                                            <td>No Class</td>
                                        <?php }?>
                                    <?php }?>

                                <?php }?>

                            <?php }?>
                        </tr>
                    <?php }?>
                    <tbody>

                </table>
            <?php }?>

        <?php endforeach; ?>
    </div>
    <div class="modal fade" role="dialog" id="enrolInfo">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h6 id="header-title"><strong>Enrolment Form</strong></h6>
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>>
        </div>
    </div>
</div>
    </section>

</body>

<script>

    let term_id;
    $('.term_price_btn').click(function () {
        term_id = $(this).data("termid");

        $('#header-title').html('<h5>Enrolment Form</h5>');
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Enrolments', 'action' => 'add']); ?>",
            data: {term_id},
            success: function (response) {
                $('.modal-body').html(response);

            }
        });
    });

    $('.close').click(function () {
        location.reload();
    });


</script>
</html>

