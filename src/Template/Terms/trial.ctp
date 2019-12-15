<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 2px solid mediumseagreen !important;
        }
    </style>
    <!-- custom css -->
    <?= $this->Html->css('homepage.css') ?>
    <!-- bootstrap -->
    <?= $this->Html->css('/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->script('/bootstrap/js/jquery-3.3.1.slim.min.js') ?>
    <?= $this->Html->script('/bootstrap/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/bootstrap/js/popper.min.js') ?>
    <!-- font awesome -->
    <?= $this->Html->css('/font-awesome/css/all.min.css') ?>
    <?= $this->Html->script('/font-awesome/js/all.min.js') ?>

</head>
<body>

<div class="headpic">
    <div class="container">
        <?php echo $this->Html->image('LFM.jpg'); ?>
    </div>
</div>
<div class="Heading container mt-10">
    <h2><b>Term 2 Starts on  2nd January 2020 and Finishes on 3rd april 2020</b></h2>    



</div>

<div class="row">
    <div class="container">
        <?php foreach ($termsArray as $key=>$location_d): ?>
            <?php if(count($termsArray)>0){?>
                <div class="" style="margin-top: 30px;font-weight:bold;color:#3a945b;font-size: larger;"><?php echo $key; ?></div>
                <table style="margin-top: 10px;" class="table table-bordered">
                    <thead class="col-sm-2">
                    <tr >
                        <th class="">Location</th>
                        <?php $header=[];foreach ($location_d as $key1=>$terms_d){ ?>

                            <?php

                            foreach($terms_d as $termd){$header[]=$termd['age_group'];

                                ?>

                                <?php echo "<th><span style='color: mediumseagreen'>".$termd['age_group']."</span>"."<br>Start:".date("d-m-Y",strtotime($termd['start_date']))."</br>
                                   Time: ".date("G:i", strtotime($termd['start_time']))."
                                   <br>Week Remaining: "."<span style='color: red'>".$termd['remaining_class_count']."</span>"."</th>"; ?>

                            <?php }}?>
                    <tr>
                    </thead>

                    <?php foreach ($location_d as $key1=>$terms_d){
                        // array_column($terms_d,'age_group');
                        ?>
                        <tr>
                            <td><b><?php echo $key1 ?></b></td>
                            <?php $flag=false;foreach($terms_d as $termd){ ?>
                                <?php for($i=0;$i<count($header);$i++){?>
                                    <?php if($header[$i]==$termd['age_group']){$flag=true;?>
                                        <td>
                                            <strong>Enrol:</strong>
                                            <button type="button" class="btn btn-primary term_price_btn mt-2 fixedsize p-1" style="background-color:#CC0000;" data-backdrop="static"
                                                    data-keyboard="false" data-toggle="modal" data-target="#enrolInfo" data-termid= "<?php echo $termd['term_id']."-".$termd['lfm_primary_key']; ?>">
                                                <?php echo "$".$termd['price'] ?>
                                            </button>

                                            <!--<strong>Casual:</strong>-->
                                            <button type="button" class="btn btn-info causal_price_btn ml-5 mt-2 fixedsize p-1" style="background-color:orange;" data-backdrop="static"
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
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <!--                    <h6 id="header-title"><strong>Are You A Returning Customer ?</strong></h6>-->
                    <!--                    <button type="button" data-dismiss="modal" class="close">&times;</button>-->
                    <h6 id="header-title"><strong>Enrolment Form</strong></h6>
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <!--                    <div class="container row">-->
                    <!--                        <div class="col-md-6">-->
                    <!--                            <button class="btn btn-primary" id="enrolNew">New <br> Customer</button>-->
                    <!--                        </div>-->
                    <!--                        <div class="col-md-6">-->
                    <!--                            <button class="btn btn-info" id="enrolRet">Returning Customer</button>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>
                <div class="modal-footer">

                </div>
            </div>>
        </div>
    </div>
</div>
</body>

<script>

    let term_id;
    $('.term_price_btn').click(function () {
        term_id = $(this).data("termid");

        //$.ajax({
        //    method: 'get',
        //    url: "<?php //echo $this->Url->build(['controller'=> 'Terms', 'action' => 'modal']); ?>//",
        //    data: {},
        //    success: function(response){
        //        $('#modal-content').html(response);
        //    }
        //})

        $('#header-title').html('<h5>Enrolment Form</h5>');
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Terms', 'action' => 'formPrefill']); ?>",
            data: {term_id},
            success: function (response) {
                $('.modal-body').html(response);

            }
        });
    });

    $('.close').click(function () {
        location.reload();
    });

    $('#enrolNew').click(function (e) {

        //e.preventDefault();
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'signup']); ?>",
            data: {},
            success: function (response) {
                $('.modal-body').html(response);
            }
        });
    });

    $('#enrolRet').click(function (e) {
        //e.preventDefault();
        $('#header-title').html('<h5>Enrolment Form</h5>');
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Terms', 'action' => 'enrol']); ?>",
            data: {term_id},
            success: function (response) {
                $('.modal-body').html(response);
                // let m_content = $(response).filter("#login_content");
                // let m_footer = $(response).filter("#m_footer");
                // $('.modal-body').html(m_content);
                // $('.modal-footer').html(m_footer);
            }
        });
    });

</script>
</html>
