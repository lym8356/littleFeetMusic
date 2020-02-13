<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment[]|\Cake\Collection\CollectionInterface $enrolments
 */
?>
<html>
<head>
    <style>
        .full-width-tabs > ul.nav.nav-pills {
            display: table;
            width: 100%;
            table-layout: fixed;
        }
        .full-width-tabs > ul.nav.nav-pills > li {
            float: none;
            display: table-cell;
        }
        .full-width-tabs > ul.nav.nav-pills > li > a {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="row">
    <div class="col-lg-12 full_width_tabs">
        <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist" style="font-size: large;">
            <li class="nav-item active">
                <a class="nav-link ajaxTab active" id="mon_tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mon PM</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ajaxTab" id="tue_tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-profile" aria-selected="false">Tues Mord</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ajaxTab" id="wed_tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-contact" aria-selected="false">Wed Gas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ajaxTab" id="thu_tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-contact" aria-selected="false">Thurs Park</a>
            </li>
            <li class="nav-item">
                <a class="nav-link ajaxTab" id="fri_tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-contact" aria-selected="false">Fri Gas</a>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="row col-lg-12 tab-pane fade in active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            </div>
        </div>
    </div>
</div>
</body>
<script>

    let dayID = 1;

    $(document).ready(function(){
        $.ajax({
            type: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Enrolmentstest', 'action' => 'tabTest']); ?>",
            data: {'dayID': dayID},
            success: function (response){
                $('#pills-home').html(response);
            }
        });
    });

    $('.ajaxTab').click(function(e) {

        let day = e.target.id;

        switch(day){
            case 'mon_tab':
                dayID = 1;
                break;
            case 'tue_tab':
                dayID = 2;
                break;
            case 'wed_tab':
                dayID = 3;
                break;
            case 'thu_tab':
                dayID = 4;
                break;
            case 'fri_tab':
                dayID = 5;
                break;
            default:
                dayID = 1;
        }
        $.ajax({
            type: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Enrolmentstest', 'action' => 'tabTest']); ?>",
            data: {'dayID': dayID},
            success: function (response){
                $('#pills-home').html(response);
            }
        });
    });
</script>
</html>
