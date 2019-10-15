<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="row">
    <div class="container">
        <?php foreach ($locationData as $location_d): ?>
            <div style="margin-top: 30px;">
                <h4><?php echo $location_d['name']; ?></h4>
            </div>
            <table class="table table-bordered table-info" style="margin-top: 10px;">
                <thead>
                <tr>
                    <th>Based on your child's age on 30 April 2019</th>
                    <?php foreach ($location_d['terms'] as $terms_d){ ?>
                        <?php echo "<th>".$terms_d['age_group']."</th>"; ?>
                    <?php }?>
                <tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Monday
                    </td>
                    <?php foreach ($location_d['terms'] as $terms_d){ ?>

                        <?php $lfmclassdata = $this->Lfmclass->getLfm($terms_d['id']); ?>
                        <?php foreach ($lfmclassdata as $class_d){ ?>
                            <td>
                                <p><?php echo date('H:i',strtotime($terms_d['start_time']));
                                echo "-";
                                echo date('H:i',strtotime($terms_d['end_time']));?></p>
                                <?php echo "$";echo $class_d['price']; ?>
                            </td>
                        <?php }?>

                    <?php }?>
                </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>
</div>
</body>

</html>
