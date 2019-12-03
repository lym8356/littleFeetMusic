<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 2px solid mediumseagreen !important;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="container">
        <?php foreach ($termsArray as $key=>$location_d): ?>
            <?php if(count($termsArray)>0){?>
                <div style="margin-top: 30px;font-weight:bold;color:#3a945b;font-size: larger;"><?php echo $key; ?></div>
                <table style="margin-top: 10px;" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Location</th>
                        <?php $header=[];foreach ($location_d as $key1=>$terms_d){ ?>

                            <?php

                            foreach($terms_d as $termd){$header[]=$termd['age_group'];

                                ?>

                                <?php echo "<th><span style='color: mediumseagreen'>".$termd['age_group']."</span>"."<br>First Class Started on: ".date("d-m-Y",strtotime($termd['start_date']))."</br>
                                   Time: ".date("G:i", strtotime($termd['start_time']))."
                                   <br>Class Remaining: "."<span style='color: red'>".$termd['remaining_class_count']."</span>"."</th>"; ?>

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
                                            <button type="button" class="btn btn-primary" data-backdrop="static"
                                                    data-keyboard="false" data-toggle="modal" data-target="#enrolInfo">
                                                <?php echo "$".$termd['price']

                                                ?>
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
        <div class="modal-dialog modal-dialog-centered"">
            <div class="modal-content" id="modal-content">
                <div class="modal-header">
                    <h6 id="header-title"><strong>Are You A Returning Customer ?</strong></h6>
                    <button type="button" data-dismiss="modal" class="close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container row">
                        <div class="col-md-6">
                            <button class="btn btn-primary" id="enrolNew">New <br> Customer</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info" id="enrolRet">Returning Customer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

<script>
    $('.close').click(function () {

    });

    $('#enrolNew').click(function (e) {
        e.preventDefault();
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
        e.preventDefault();
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Terms', 'action' => 'enrol']); ?>",
            data: {},
            success: function (response) {
                $('.modal-body').html(response);
            }
        });
    });

</script>
</html>
