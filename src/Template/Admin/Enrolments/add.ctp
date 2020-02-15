<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment $enrolment
 */
?>
<li><?= $this->Html->link(__('List Enrolments'), ['action' => 'index']) ?></li>
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
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="row col-lg-12 tab-pane fade in active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

            </div>
        </div>
    </div>
</div>

