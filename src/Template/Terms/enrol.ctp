<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 2px solid black !important;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="container">
        <?php foreach ($termsArray as $key=>$location_d): ?>
            <?php if(count($termsArray)>0){?>
                <div style="margin-top: 30px;"><?php echo $key; ?></div>
                <table style="margin-top: 10px;" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Location</th>
                        <?php $header=[];foreach ($location_d as $key1=>$terms_d){ ?>

                            <?php

                            foreach($terms_d as $termd){$header[]=$termd['age_group'];

                                ?>

                                <?php echo "<th>".$termd['age_group']."</th>"; ?>

                            <?php }}?>
                    <tr>
                    </thead>

                    <?php foreach ($location_d as $key1=>$terms_d){
                        // array_column($terms_d,'age_group');
                        ?>
                        <tr>
                            <td><?php echo $key1 ?></td>
                            <?php $flag=false;foreach($terms_d as $termd){ ?>
                                <?php for($i=0;$i<count($header);$i++){?>
                                    <?php if($header[$i]==$termd['age_group']){$flag=true;?>
                                        <td><a href="#"><?php echo $termd['price']; ?></a></td>
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
</div>
</body>

</html>
