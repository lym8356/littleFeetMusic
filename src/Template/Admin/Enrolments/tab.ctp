<html>
<head>
    <!-- Data Table Libraries-->
    <!-- Jquery UI library -->
    <?= $this->Html->css('/datetimepicker/css/jquery-ui.min.css') ?>
    <?= $this->Html->script('/datetimepicker/js/jquery-ui.min.js') ?>

    <style type="text/css">
        .tb-small{
            min-width: 350px;
            max-width: 350px;
            padding: 2%;
            background-color: white;
        }
        .tb-small-head{
            min-width: 130px;
            max-width: 130px;
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
        .modal-dialog{
            position: relative;
            display: table; /* This is important */
            overflow-y: auto;
            overflow-x: auto;
            width: auto;
            min-width: 300px;
        }
    </style>
</head>

<body>
<?php foreach ($dataArray as $data): ?>
    <button type="button" class="btn btn-success btn-md causal_price_btn pull-right"  data-backdrop="static" style="margin-left: 20px;"
            data-keyboard="false" data-toggle="modal" data-target="#enrolInfo" data-termid= "<?php echo $data['term_id']; ?>">
        Add Casual Enrolment
    </button>

    <button type="button" class="btn btn-primary btn-md term_price_btn pull-right"  data-backdrop="static"
            data-keyboard="false" data-toggle="modal" data-target="#enrolInfo" data-termid= "<?php echo $data['term_id']; ?>">
        Add Term Enrolment
    </button>

    <div style="margin-top: 6%; position: absolute; margin-left: 80%;">
        <div class="delete_icon" style="width:100px;height:100px;padding-left: 30px;padding-top: 20px;">
            <i class="fas fa-trash fa-3x"></i>
        </div>
    </div>

    <table class="table-bordered table-striped table-responsive m">
        <?php foreach ($data['termData'] as $key => $term) { ?>
            <tr>
                <th class="tb-small-head" scope="col"><?php echo $key ?></th>
                <td class="tb-small"><?php echo $term ?></td>
            </tr>
        <?php } ?>
    </table>
    <table class="table table-bordered table-striped table-responsive enrol_table">
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
        <tr data-enrol-id = "<?php echo $enrolment->id ?>">
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
    <hr>
<?php endforeach; ?>
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
<script>
    $(document).ready(function(){
        // $('.enrol_table').DataTable();
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
        });
    });

    $(function(){
        var c = {};
        $('.enrol_table tr').draggable({
            helper: "clone",
            start: function(event, ui){
                c.tr = this;
                c.helper = ui.helper;
            }
        });
        $('.delete_icon').droppable({
            drop: function(event, ui){
                let id = $(ui.draggable).attr("data-enrol-id");
                //var id =   $(this).attr('data-enrol-id');
                alert();
                $.ajax({
                    method: 'post',
                    url: "<?php echo $this->Url->build(['action' => 'delete']); ?>",
                    data: {id},
                    success: function(response){
                        console.log(response);
                        location.reload();
                    }
                })
            }
        })
    });
    let term_id;
    $('.term_price_btn').click(function (e) {
        term_id = $(this).data("termid");

        $('#header-title').html('<h5>Term Enrolment Form</h5>');
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['action' => 'addTerm']); ?>",
            data: {term_id},
            dataType: 'html',
            success: function (response) {
                $('.modal-body').html(response);
            }
        });
    });

    $('.causal_price_btn').click(function () {
        term_id = $(this).data("termid");

        $('#header-title').html('<h5>Casual Enrolment Form</h5>');
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['action' => 'addCasual']); ?>",
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
</body>
</html>

