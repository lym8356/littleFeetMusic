<html>
<head>
    <!--Jquery stepper plugin -->
    <!-- URL https://jsfiddle.net/yeyene/59e5e1ya/ -->
    <style>
        body {
            margin-top:30px;
        }
        .stepwizard-step p {
            margin-top: 0px;
            color:#666;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            /*opacity: 1 !important;
            filter: alpha(opacity=100) !important;*/
        }
        .stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
            opacity:1 !important;
            color:#bbb;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content:" ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-index: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

    </style>
</head>
<body>
<div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-3">
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Enrolment Summary</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p><small>Child's Info</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p><small>Guardian's Info</small></p>
            </div>
            <div class="stepwizard-step col-xs-3">
                <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
                <p><small>Enrolment Summary</small></p>
            </div>
        </div>
    </div>

    <?php echo $this->Form->create('enrolment', ['id' => 'enrol_form']); ?>
    <div class="panel panel-primary setup-content" id="step-1">
        <div class="panel-heading">
            <h3 class="panel-title">Available Classes</h3>
        </div>
        <div class="panel-body">
            <div class="form-row">
                <h5 class="card-header">Please pick a class date</h5>
                <div class="col-sm-12 card-body class_select" style="margin-bottom: 10px;">
                    <?php foreach($classData as $class): ?>

                        <button type="button" class="btn_class_select"><?php echo date("d-m-Y",strtotime($class->class_date)); ?></button>

                    <?php endforeach; ?>
                </div>
                <h5 class="card-header">Selected classes</h5>
                <div class="col-sm-12 card-body selected_class">
                    <!---selected classes go here --->
                </div>
            </div>
            <div class="btn-group-md">
                <button class="btn btn-primary nextBtn pull-right casual-next-btn" type="button">Next</button>
            </div>
        </div>
    </div>

    <div class="panel panel-primary setup-content" id="step-2">
        <div class="panel-heading">
            <h3 class="panel-title">Child's Information</h3>
        </div>
        <div class="panel-body child_panel">
            <div class="form-row child_field">
                <div class="col-sm-6">
                    <?php echo $this->Form->control('child_first_name[]', ['class' => 'form-control', 'label' => "Child's first name *"]); ?>
                    <?php echo $this->Form->control('child_last_name[]', ['class' => 'form-control', 'label' => "Child's last name *"]); ?>
                </div>
                <div class="col-sm-6">
                    <?php echo $this->Form->control('child_dob[]', ['class' => 'form-control mb-4 child_dob', 'label' => "Child's DOB *"]); ?>
                    <?php echo $this->Form->control('child_note[]', ['class' => 'form-control valid', 'type' => 'text', 'label' => 'Extra note']); ?>
                </div>
            </div>
            <button type="button" style="margin-top: 10px; margin-left: 15px;" class="btn btn-info add_row">Add A Sibling</button>
            <div class="btn-group-md">
                <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
            </div>
        </div>
    </div>

    <div class="panel panel-primary setup-content" id="step-3">
        <div class="panel-heading">
            <h3 class="panel-title">Guardian's Info</h3>
        </div>
        <div class="panel-body">
            <div class="col-12 col-sm-6">
                <?php echo $this->Form->control('user_first_name', ['class' => 'form-control', 'label' => 'First Name *']); ?>
                <?php echo $this->Form->control('user_last_name', ['class' => 'form-control', 'label' => 'Last Name *']); ?>
            </div>
            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                <?php echo $this->Form->control('user_email', ['class' => 'form-control', 'type' => 'text', 'label' => 'Email *']); ?>
                <?php echo $this->Form->control('user_phone', ['class' => 'form-control', 'label' => 'Phone *(10 digit)']); ?>
            </div>
            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                <?php echo $this->Form->control('user_postcode', ['class' => 'form-control', 'type' => 'text', 'label' => 'Postcode']); ?>
            </div>
            <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                <?php echo $this->Form->control('relation', ['class' => 'form-control',
                    'label' => 'Relationship to children *', 'type' => 'select', 'options' => array('Parent' => 'Parent', 'Grandparent' => 'Grandparent',
                        'Carer' => 'Carer', 'Nanny' => 'Nanny', 'Other' => 'Other')]); ?>
            </div>
            <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
        </div>
    </div>

    <div class="panel panel-primary setup-content" id="step-4">
        <div class="panel-heading">
            <h3 class="panel-title">Class Information</h3>
        </div>
        <p class="panel-body">
        <div style="display:none;">
            <?php echo $this->Form->control('price', ['class' => 'form-control', 'id' => 'sub_total', 'label' => '', 'style'=>'display:none']); ?>
            <?php echo $this->Form->control('class_time', ['class' => 'form-control', 'id' => 'class_time', 'label' => '','style'=>'display:none']); ?>
            <?php echo $this->Form->control('price', ['label' => '', 'id' => 'class_price', 'hidden']); ?>
        </div>
        <div style="display:none;">
            <?php echo $this->Form->control('location', ['class' => 'form-control', 'id' => 'class_location', 'label' => '','style'=>'display:none']); ?>
            <?php echo $this->Form->control('age_group', ['class' => 'form-control', 'id' => 'class_ageGroup', 'type' => 'text', 'label' => '','style'=>'display:none']); ?>
            <?php echo $this->Form->control('term_id', ['type' => 'text', 'label' => '','style'=>'display:none']); ?>
        </div>
        <div class="card">
            <span class="card-header">Class Information</span>
            <div class="card-body">
                <table class="table table-borderless">
                    <thead>
                    <tr>
                        <th>Location</th>
                        <th>Age Group</th>
                        <th>Class Time</th>
                        <th>Price Per Class</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td id="tb_class_location" style="max-width: 150px;"></td>
                        <td id="tb_class_ageGroup"></td>
                        <td id="tb_class_time"></td>
                        <td id="tb_class_price"></td>
                    </tr>
                    </tbody>
                </table>
                <h6 style="color: red;">Class Selected</h6>
                <hr>
                <div id="selected_class_summary">

                </div>
            </div>
        </div>
        <table class="table table-striped table-light">
            <tbody>
            <tr>
                <td class="left">
                    <strong class="text-dark">Total</strong>
                </td>
                <td class="right" style="text-align: right;">
                    <strong class="text-dark" id="tb_total_price"></strong>
                </td>
            </tr>
            </tbody>
        </table>
        <h5 style="color:red;">*Please double check every information with the customer before proceeding to payment</h5>
        <p><h5 style="color:red;">*Click on the numbers on top to navigate to each panel</h5></p>
        <hr>
        <div class="col-sm-6">
            <?php echo $this->Form->control('payment_method', ['class'=>'form-control','type' => 'select', 'required'=> true,
                'label' => 'Payment Method*','options' => ['Cash'=>'Cash','Direct Debit' =>'Direct Debit', 'Credit Card'=>'Credit Card']]); ?>
        </div>
        <div class="col-sm-6">
            <?php echo $this->Form->control('payment_status', ['class'=>'form-control','type' => 'select', 'required'=> true,
                'label' => 'Payment Status*','options' => ['Accepted'=>'Accepted', 'Pending'=>'Pending', 'Declined'=>'Declined']]); ?>
        </div>
        <button id="enrol_btn" class="btn btn-success pull-right" style="margin-top: 10px;" type="submit">Enrol</button>
    </div>
</div>
<?php echo $this->Form->end(); ?>
</div>
<script>

    selected_class_array = [];
    $(document).ready(function () {

        $('[name^="child_dob"]').datepicker({dateFormat:'dd-mm-yy'});

        var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

        allWells.hide();

        navListItems.click(function (e) {
            e.preventDefault();
            var $target = $($(this).attr('href')),
                $item = $(this);

            if (!$item.hasClass('disabled')) {
                navListItems.removeClass('btn-success').addClass('btn-default');
                $item.addClass('btn-success');
                allWells.hide();
                $target.show();
                $target.find('input:eq(0)').focus();
            }
        });

        allNextBtn.click(function () {
            var curStep = $(this).closest(".setup-content"),
                curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),
                isValid = true;

            $(".form-group").removeClass("has-error");
            for (var i = 0; i < curInputs.length; i++) {
                if (!curInputs[i].validity.valid) {
                    isValid = false;
                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                }
            }

            if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
        });

        $('div.setup-panel div a.btn-success').trigger('click');

    });
    $('.add_row').click(function (e) {
        if (($('.child_field').length) < 10) {
            let clone = $('.child_field').first().clone();
            clone.append("<div class='col-sm-12' style='margin-top: 10px;'><button type='button' class='btn btn-danger pull-right remove_row'>Remove</button></div>");

            clone.insertBefore('.add_row');

            $('[name^="child_dob"]').datepicker({dateFormat:'dd-mm-yy'});
        } else {
            alert('You Can Only Enrol 10 Children At Once');
        }
    });
    $(".child_panel").on("click", ".remove_row", function () {
        $(this).parents('.child_field').remove();
    });

    $('#tb_class_location').html($('#class_location').val());
    $('#tb_class_ageGroup').html($('#class_ageGroup').val());
    $('#tb_class_time').html($('#class_time').val());
    $('#tb_class_price').text("$"+$('#class_price').val());


    $('.casual-next-btn').click(function(){

        selected_class_array = [];
        let buttonInDiv = $('.selected_class button');
        for(let i=0;i<buttonInDiv.length;i++){
            selected_class_array.push(buttonInDiv[i].innerText);
        }
        for(let j=0;j<selected_class_array.length;j++){
            $('.selected_class').append("<input name='date[]' type='hidden' value='"+selected_class_array[j]+"'/>");
        }
    });

    $('#enrol_btn').click(function(e){

        //e.preventDefault();
        let csrf_token = $('[name="_csrfToken"]').val();
        let formSerialized = $('#enrol_form').serialize();

        $.ajax({
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', csrf_token);
            },
            method: 'post',
            url: "<?php echo $this->Url->build(['action' => 'addCasual']); ?>",
            data: {formSerialized},
            success: function (response) {
                //location.reload();
            }
        });
    });

    $('.class_select button').click(function(){

        let buttonInDiv = $('.selected_class button');
        let flag = false;
        let buttonClone = $(this).clone().addClass('btn_selected_class');

        if(buttonInDiv.length == 0){
            $('.selected_class').append(buttonClone);

        }else if(buttonInDiv.length > 0){

            for(let i=0;i<buttonInDiv.length;i++){
                if(buttonInDiv[i].innerText == $(this).text()){
                    flag = true;
                    break;
                }
            }
        }

        if(flag == false && buttonInDiv.length != 0){
            let buttonClone = $(this).clone().addClass('btn_selected_class');
            $('.selected_class').append(buttonClone);
        }
    });

    $('.panel-body').on('click', '.btn_selected_class', function(){
        $(this).remove();
    });

    // update the list every time this button is clicked
    $('.casual-next-btn').click(function(){
        selected_class_array = [];
        let buttonInDiv = $('.selected_class button');
        for(let i=0;i<buttonInDiv.length;i++){
            selected_class_array.push(buttonInDiv[i].innerText);
        }
        $('#selected_class_summary').html("");
        for(let j=0; j<selected_class_array.length;j++){
            $('#selected_class_summary').append("<button disabled>"+selected_class_array[j]+"</button>"+" ");
        }
        $('#tb_total_price').text("$"+($('#class_price').val()*selected_class_array.length));

        $('.selected_class').html("");
        for(let j=0;j<selected_class_array.length;j++){
            $('.selected_class').append("<button type='button' class='btn_selected_class'>"+selected_class_array[j]+"</button>");
            $('.selected_class').append("<input name='date[]' type='hidden' value='"+selected_class_array[j]+"'/>");
        }

    });



</script>
</body>
</html>
