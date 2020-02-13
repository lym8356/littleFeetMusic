<html>
<head>
    <style type="text/css">
        .tb-small{
            min-width: 150px;
            max-width: 150px;
            padding: 2%;
            background-color: white;
        }
        .m{
            margin-bottom: 1rem;
        }
        .table{
            margin-bottom: 5rem;
        }
        .p_pending{
            color: #eed202;
        }
        .p_accepted{
            color: green;
        }
        .p_declined{
            color: red;
        }
    </style>
</head>

<body>
<?php foreach ($dataArray as $data): ?>
    <table class="table-bordered table-responsive m">
        <?php foreach ($data['termData'] as $key => $term) { ?>
            <tr>
                <th class="tb-small" scope="col"><?php echo $key ?></th>
                <td class="tb-small"><?php echo $term ?></td>
            </tr>
        <?php } ?>
    </table>
    <table class="table table-bordered table-responsive enrol_table">
        <thead>
        <tr>
            <tr>
                <?php foreach ($data['header'] as $header) { ?>
                    <th ><?php echo $header ?></th>
                <?php } ?>
            </tr>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($data['enrolData'] as $key=>$enrolment){
        $lengthforspace = count($data['header']) - count($staticHeader);
        $dateToCheck = array();
        $dateHeader = array();
        for($date = 9;$date < sizeof($data['header']); $date++){
            array_push($dateHeader, $data['header'][$date]);
        }
        ?>
        <tr>
            <td><?php echo $enrolment['child']['first_name'] . ' ' . $enrolment['child']['last_name']; ?></td>
            <td><?php echo $enrolment['user']['f_name'] . ' ' . $enrolment['user']['l_name']; ?></td>
            <td><?php echo date('d/m/Y', strtotime($enrolment['child']['dob'])); ?></td>
            <td><?php echo $enrolment['user']['phone']; ?></td>
            <td><?php echo $enrolment['comment'] ?></td>
            <td><?php echo $enrolment['enrolment_type'] ?></td>
            <td><?php echo $enrolment['enrolment_cost'] ?></td>
            <td><?php echo $enrolment['payment_method'] ?></td>
            <td class="p_status"><?php echo $enrolment['payment_status'] ?></td>
            <?php foreach($data['dateEnrolled'][$key] as $d): ?>
                <?php
                array_push($dateToCheck, $d);
                //pr($dateToCheck);
                ?>
            <?php endforeach; ?>
            <?php for ($i = 0; $i < sizeof($dateHeader); $i++) {
                $flag = false;
                for($j = 0; $j < sizeof($dateToCheck); $j++) {
                    if( $dateHeader[$i] == $dateToCheck[$j] ){ ?>
                        <td style = "background-color: green"></td>
                        <?php $flag = true;
                        break;
                        }
                 }
                if($flag == false){ ?>
                    <td></td>
                <?php }?>
            <?php } ?>
         <?php } ?>

        </tr>
        </tbody>
    </table>
<?php endforeach; ?>

<script>

    $(document).ready(function(){

        $('.p_status').each(function(){
            switch ($(this).text()){
                case 'Pending':
                    $(this).addClass('p_pending');
                    break;
                case 'Accepted':
                    $(this).addClass('p_accepted');
                    break;
                case 'Declined':
                    $(this).addClass('p_declined');
                    break;
                default:
                    break;
            }
        })

    });
</script>
</body>
</html>

