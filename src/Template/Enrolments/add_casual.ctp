<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment $enrolment
 */
?>
<!DOCTYPE html>
<html>
<head>
    <!-- jquery validation -->
    <?= $this->Html->script('/jquery-validation/jquery.validate.js') ?>

    <!-- datepicker -->
    <?= $this->Html->css('/datetimepicker/css/jquery-ui.min.css') ?>
    <?= $this->Html->script('/datetimepicker/js/jquery-ui.min.js') ?>

    <style>
        .multisteps-form__progress {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(0, 1fr));
        }

        .multisteps-form__progress-btn {
            transition-property: all;
            transition-duration: 0.15s;
            transition-timing-function: linear;
            transition-delay: 0s;
            position: relative;
            padding-top: 20px;
            color: rgba(108, 117, 125, 0.7);
            text-indent: -9999px;
            border: none;
            background-color: transparent;
            outline: none !important;
            cursor: pointer;
        }

        @media (min-width: 500px) {
            .multisteps-form__progress-btn {
                text-indent: 0;
            }
        }

        .multisteps-form__progress-btn:before {
            position: absolute;
            top: 0;
            left: 50%;
            display: block;
            width: 13px;
            height: 13px;
            content: '';
            -webkit-transform: translateX(-50%);
            transform: translateX(-50%);
            transition: all 0.15s linear 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            transition: all 0.15s linear 0s, transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s, -webkit-transform 0.15s cubic-bezier(0.05, 1.09, 0.16, 1.4) 0s;
            border: 2px solid currentColor;
            border-radius: 50%;
            background-color: #fff;
            box-sizing: border-box;
            z-index: 3;
        }

        .multisteps-form__progress-btn:after {
            position: absolute;
            top: 5px;
            left: calc(-50% - 13px / 2);
            transition-property: all;
            transition-duration: 0.15s;
            transition-timing-function: linear;
            transition-delay: 0s;
            display: block;
            width: 100%;
            height: 2px;
            content: '';
            background-color: currentColor;
            z-index: 1;
        }

        .multisteps-form__progress-btn:first-child:after {
            display: none;
        }

        .multisteps-form__progress-btn.js-active {
            color: #007bff;
        }

        .multisteps-form__progress-btn.js-active:before {
            -webkit-transform: translateX(-50%) scale(1.2);
            transform: translateX(-50%) scale(1.2);
            background-color: currentColor;
        }

        .multisteps-form__form {
            position: relative;
            height: auto !important;
        }

        .multisteps-form__panel {
            /*position: absolute;*/
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            opacity: 0;
            visibility: hidden;
        }

        .multisteps-form__panel.js-active {
            height: auto;
            opacity: 1;
            visibility: visible;
        }

        .error {
            border-color: red;
            color: #FF0000;
        }

        .hide_row{
            display:none;
        }
        .btn_class_select{
            background-color: orange;
        }
        .btn_class_select:focus{
            background-color: green;
        }
        .btn_selected_class{
            background-color: green;
            }

        }


    </style>
</head>
<body>
<div class="multisteps-form" id="enrol_status">
    <!--progress bar-->
    <div class="row">
        <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn child_progress_btn js-active" type="button" title="Child Info">Select a class
                </button>
                <button class="multisteps-form__progress-btn child_progress_btn" type="button" title="Child Info">Child's info
                </button>
                <button class="multisteps-form__progress-btn user_progress_btn " type="button" title="Your Contact Details">Your contact
                    details
                </button>
                <button class="multisteps-form__progress-btn sum_progress_btn " type="button" title="Class Summary">Enrolment summary
                </button>
                <button class="multisteps-form__progress-btn payment_progress_btn " type="button" title="Payment">Payment</button>
            </div>
        </div>
    </div>
    <!--form panels-->
    <div class="row">
        <div class="col-12 col-lg-8 m-auto">
            <?php echo $this->Form->create('enrolment', ['class' => 'multisteps-form__form', 'id' => 'enrol_form']); ?>
            <!-- Class Info Section -->
            <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Available Classes</h3>
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken'); ?>"/>
                <div class="multisteps-form__content">
                    <h5 class="card-header">Please pick a class date</h5>
                    <div class="col-sm-12 card-body class_select">
                        <?php foreach($classData as $class): ?>

                        <button type="button" class="btn btn_class_select p-1 m-1"><?php echo date("d-m-Y",strtotime($class->class_date)); ?></button>

                        <?php endforeach; ?>
                    </div>
                    <h5 class="card-header">Selected classes</h5>
                    <div class="col-sm-12 card-body selected_class">
                        <!---selected classes go here --->
                    </div>
                    <div class="button-row d-flex mt-4">
                        <button class="btn btn-primary ml-auto casual-next-btn js-btn-next" type="button" title="Next">Next</button>
                    </div>
                </div>
            </div>
            <!--Child form panel-->
            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Child's Info</h3>
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken'); ?>"/>
                <div class="multisteps-form__content">
                    <label class="text-danger">* Required</label> <br>
                    <p id="child_validation_error" style="color: red;"></p>
                    <div class="form-row mt-2 child_field">
                        <div class="col-12 col-sm-6">
                            <?php echo $this->Form->control('child_first_name[]', ['class' => 'form-control mb-4', 'label' => "Child's first name *"]); ?>
                            <?php echo $this->Form->control('child_last_name[]', ['class' => 'form-control', 'label' => "Child's last name *"]); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('child_dob[]', ['class' => 'form-control child_dob mb-4', 'label' => "Child's DOB *"]); ?>
                            <?php echo $this->Form->control('child_note[]', ['class' => 'form-control valid', 'type' => 'text', 'label' => 'Extra note']); ?>
                        </div>
                    </div>
                    <span class="input-group-btn">
                            <button type="button" class="btn btn-info add_row mt-3">Add Another Child</button>
                    </span>
                    <div class="button-row d-flex mt-4">
                        <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                        <button class="btn btn-primary ml-auto js-btn-next child-btn-next" id="child_next_btn" type="button"
                                title="Next">Next
                        </button>
                    </div>
                </div>
            </div>
            <!--User form panel-->
            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Your Details</h3>
                <div class="multisteps-form__content">

                    <label class="text-danger">* Required</label>
                    <p id="user_validation_error" style="color: red;"></p>

                    <div class="form-row mt-4 user_field">
                        <div class="col-12 col-sm-6">
                            <?php echo $this->Form->control('user_first_name', ['class' => 'form-control mb-4', 'label' => 'First Name *']); ?>
                            <?php echo $this->Form->control('user_last_name', ['class' => 'form-control mb-4', 'label' => 'Last Name *']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('user_email', ['class' => 'form-control mb-4', 'type' => 'text', 'label' => 'Email *']); ?>
                            <?php echo $this->Form->control('user_phone', ['class' => 'form-control mb-4', 'label' => 'Phone *(10 digit)']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('user_postcode', ['class' => 'form-control', 'type' => 'text', 'label' => 'Postcode']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('relation', ['class' => 'form-control',
                                'label' => 'Relationship to children *', 'type' => 'select', 'options' => array('Parent' => 'Parent', 'Grandparent' => 'Grandparent',
                                    'Carer' => 'Carer', 'Nanny' => 'Nanny', 'Other' => 'Other')]); ?>
                        </div>
                    </div>
                </div>
                <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev user-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next user-btn-next" type="button" title="Next">Next</button>
                </div>
            </div>
            <!--Order Summary form panel-->
            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Enrolment Summary</h3>
                <div class="multisteps-form__content">
                    <label>
                        Child Info Summary
                    </label>
                    <div id="enrolment_detail_table">

                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chb_tshirt">
                        <label class="form-check-label h6" for="chb_tshirt">
                            Can I also get a T-shirt please (+$22)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="chb_cd">
                        <label class="form-check-label h6" for="chb_cd">
                            I'd like a CD of Rachel's album, I'm Jelly (+$10)
                        </label>
                    </div>
                    <div class="form-row mt-4" style="display:none;">
                        <div class="col-12 col-sm-6">
                            <?php echo $this->Form->control('price', ['class' => 'form-control', 'id' => 'sub_total', 'label' => '', 'style'=>'display:none']); ?>
                            <?php echo $this->Form->control('class_time', ['class' => 'form-control', 'id' => 'class_time', 'label' => '','style'=>'display:none']); ?>
                            <?php echo $this->Form->control('price', ['label' => '', 'id' => 'class_price', 'hidden']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('location', ['class' => 'form-control', 'id' => 'class_location', 'label' => '','style'=>'display:none']); ?>
                            <?php echo $this->Form->control('age_group', ['class' => 'form-control', 'id' => 'class_ageGroup', 'type' => 'text', 'label' => '','style'=>'display:none']); ?>
                            <?php echo $this->Form->control('term_id', ['type' => 'text', 'label' => '','style'=>'display:none']); ?>
                        </div>
                    </div>
                    <hr>
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
                                <strong class="text-dark">Subtotal</strong>
                            </td>
                            <td class="right" id="tb_sub_total"></td>
                        </tr>
                        <tr class="hide_row" id="tb_tshirt_row">
                            <td class="left" id="t_shirt_price">
                                <strong class="text-dark">T-Shirt</strong>
                            </td>
                            <td class="right">$22</td>
                        </tr>
                        <tr class="hide_row" id="tb_cd_row">
                            <td class="left" id="cd_price">
                                <strong class="text-dark">CD</strong>
                            </td>
                            <td class="right">$10</td>
                        </tr>
                        <tr>
                            <td class="left">
                                <strong class="text-dark">Total</strong>
                            </td>
                            <td class="right">
                                <strong class="text-dark" id="tb_total_price"></strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                            <button class="btn btn-primary ml-auto js-btn-next" id="enrol_btn" type="button" title="Next">Next</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--            payment panel-->
            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Please wait while we redirect to payment website</h3>

            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
</body>

<script>

    $('[name^="child_dob"]').datepicker({dateFormat:'dd-mm-yy'});


    // let datePickerField =
    // datePickerField.push(document.getElementsByClassName('child_dob'));
    // alert(datePickerField);

    let child_fn_array = [];
    let child_ln_array = [];
    let child_dob_array = [];
    let child_note_array = [];
    let selected_class_array = [];

    let item_array = [];

    let glob_sub_total;

    $('.add_row').click(function (e) {
        if (($('.child_field').length) < 3) {
            var clone = $('.child_field').first().clone();
            clone.append("<div class='col-sm-12 mt-2'><button type='button' class='btn btn-danger float-right remove_row'>Remove</button></div>");

            clone.find('input').val('');
            clone.insertBefore('.add_row');

            $('[name^="child_dob"]').datepicker({dateFormat:'dd-mm-yy'});
        } else {
            alert('You Can Only Enrol 3 Children At Once');
        }
        //datePickerField.push(document.getElementsByClassName('child_dob'));
        //alert(datePickerField);
    });
    $(".multisteps-form__content").on("click", ".remove_row", function () {
        $(this).parents('.child_field').remove();
    });


    $('#enrolBtn').click(function (e) {
        e.preventDefault();
        let csrf_token = $('[name="_csrfToken"]').val();
        let formSerialize = $('#enrol_form').serialize();
        $.ajax({
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', csrf_token);
            },
            type: "post",
            url: "<?php echo $this->Url->build(['controller' => 'Enrolments', 'action' => 'add']); ?>",
            data: formSerialize,
            success: function (response) {
                $('#enrol_status').html(response);
            }
        });
    });

    function appendChildList() {

        child_fn_array = [];
        child_ln_array = [];
        child_dob_array = [];
        child_note_array = [];

        $('input[name^="child_first_name"]').each(function () {
            let temVar = $(this).val();
            if (temVar != '') {
                child_fn_array.push($(this).val());
            }
        });
        $('input[name^="child_last_name"]').each(function () {
            let temVar = $(this).val();
            if (temVar != '') {
                child_ln_array.push($(this).val());
            }
        });
        $('input[name^="child_dob"]').each(function () {
            let temVar = $(this).val();
            if (temVar != '') {
                child_dob_array.push($(this).val());
            }
        });
        $('input[name^="child_note"]').each(function () {
            let temVar = $(this).val();
            if (temVar == '') {
                child_note_array.push("");
            } else {
                child_note_array.push($(this).val());
            }
        });
    }

    function createDetailTable() {
        let normalPrice = parseFloat($('#class_price').val());
        let subTotal = 0;
        let enrolment_qty = selected_class_array.length;
        normalPrice *= enrolment_qty;

        item_array = [];

        let html = "<table class='table table-borderless'>";
        html += "<thead><tr><th>#</th><th> Name</th><th>DOB</th><th>Price</th>";

        for (let i = 0; i < child_fn_array.length; i++) {

            let next = i + 1;
            html += "<tr><td>" + next + "</td><td>" + child_fn_array[i] + " " + child_ln_array[i] + "</td><td>" +
                child_dob_array[i] + "</td><td>" +"$"+ normalPrice +  "</td>";

            subTotal += normalPrice;

            item_array.push({name: 'Casual Class Enrolment', price: normalPrice*100, qty: enrolment_qty});

            if (next != child_fn_array.length) {
                html += "</tr><tr>";
            }
        }
        html += "</tr></table>";
        document.getElementById("enrolment_detail_table").innerHTML = html;

        $('#tb_class_location').html($('#class_location').val());
        $('#tb_class_ageGroup').html($('#class_ageGroup').val());
        $('#tb_class_time').html($('#class_time').val());
        $('#tb_class_price').html("$" + $('#class_price').val());
        $('#tb_sub_total').text("$" + subTotal);
        $('#selected_class_summary').html("");
        for(let j=0; j<enrolment_qty;j++){
            $('#selected_class_summary').append("<button disabled>"+selected_class_array[j]+"</button>"+" ");
        }
        glob_sub_total = subTotal;

        $('#tb_total_price').text("$"+subTotal);
    }

    $(document).on('click','.child-btn-next',function(){

        appendChildList();
        createDetailTable();
    });

    $(document).on('blur','.child_field :input',function(){

        appendChildList();
    });


    $('#chb_tshirt').click(function(){
        let temp_total = glob_sub_total;
        if($(this).prop("checked") == true){
            $('#tb_tshirt_row').removeClass("hide_row");
            if( $('#chb_cd').prop("checked") == true){
                temp_total += 32;
            } else {
                temp_total += 22;
            }
            $('#tb_total_price').text("$" + temp_total);

            item_array.push({name: 'T-Shirt', price: 2200, qty: 1});
        }
        else if($(this).prop("checked") == false){
            $('#tb_tshirt_row').addClass("hide_row");
            if( $('#chb_cd').prop("checked") == true){
                temp_total += 10;
            }
            $('#tb_total_price').text("$" + temp_total);

            for(var i=0; i<item_array.length;i++){
                if(item_array[i]['name'] == 'T-Shirt'){
                    item_array.splice(i,1)
                }
            }
        }
    });

    $('#chb_cd').click(function(){
        let temp_total = glob_sub_total;
        if($(this).prop("checked") == true){
            $('#tb_cd_row').removeClass("hide_row");
            if($('#chb_tshirt').prop("checked") == true){
                temp_total += 32;
            } else {
                temp_total += 10;
            }
            $('#tb_total_price').text("$" + temp_total);

            item_array.push({name: 'CD', price: 1000, qty: 1});
        }
        else if($(this).prop("checked") == false){
            $('#tb_cd_row').addClass("hide_row");
            if( $('#chb_tshirt').prop("checked") == true){
                temp_total += 22;
            }
            $('#tb_total_price').text("$" + temp_total);

            for(var i=0; i<item_array.length;i++){
                if(item_array[i]['name'] == 'CD'){
                    item_array.splice(i,1)
                }
            }
        }
    });

    $('#enrol_btn').click(function(e){

        e.preventDefault();
        let csrf_token = $('[name="_csrfToken"]').val();
        let formSerialized = $('#enrol_form').serialize();

        $.ajax({
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', csrf_token);
            },
            method: 'post',
            url: "<?php echo $this->Url->build(['controller' => 'Enrolments', 'action' => 'addCasual']); ?>",
            data: {item_array,formSerialized},
            success: function (response) {
                window.location.replace(response.checkoutURL);
            }
        });
    });
    // eventHandler for casual class select button
    $('.class_select button').click(function(){

        let buttonInDiv = $('.selected_class button');
        let flag = false;
        let buttonClone = $(this).clone().addClass('btn_selected_class');
        // var color = clicked ? 'red' : 'blue';
        // $(this).css('background-color', color);
        // clicked = !clicked;

        if(buttonInDiv.length == 0){
            $('.selected_class').append(buttonClone);
            $(this).css('background-color', 'green');
            // $(this).hide();
        }else if(buttonInDiv.length > 0){
            $(this).css('background-color', 'green');
            for(let i=0;i<buttonInDiv.length;i++){
                if(buttonInDiv[i].innerText == $(this).text()){
                    flag = true;
                    // $(this).hide();
                    break;
                }
            }
        }

        if(flag == false && buttonInDiv.length != 0){
            let buttonClone = $(this).clone().addClass('btn_selected_class');
            $('.selected_class').append(buttonClone);
        }
    });

    $('.multisteps-form__content').on('click', '.btn_selected_class', function(){

        $(this).remove();
    });

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


    // Validation
    $(function () {

        $('#enrol_form').validate({
            rules: {
                "child_first_name[]": "required",
                "child_last_name[]": "required",
                "child_dob[]": "required",
                "user_first_name": "required",
                "user_last_name": "required",
                "user_email": {required: true, email: true},
                "user_phone": {required: true, number: true},
                "user_postcode": {required: false, number: true},
                "relation": "required"
            },
            messages: {
                "user_first_name": "Please enter your first name",
                "user_last_name": "Please enter your last name",
                "user_phone": "Please enter a valid phone number",
                "relation": "Please select a relationship"
            },
            onfocusout: function (element) {
                this.element(element);
            },
            errorPlacement: function(error,element) {
                return true;
            }
        });
    });




    //DOM elements
    const DOMstrings = {
        stepsBtnClass: 'multisteps-form__progress-btn',
        stepsBtnChild: 'child_progress_btn',
        stepsBtnUser: 'user_progress_btn',
        stepsBtnSum: 'sum_progress_btn',
        stepsBtnPayment: 'payment_progress_btn',
        stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
        stepsBar: document.querySelector('.multisteps-form__progress'),
        stepsForm: document.querySelector('.multisteps-form__form'),
        stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
        stepFormPanelClass: 'multisteps-form__panel',
        stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
        stepPrevBtnClass: 'js-btn-prev',
        stepNextBtnClass: 'js-btn-next',

        stepPrevUser: 'user-btn-prev',
        stepNextChild: 'child-btn-next',
        stepNextUser: 'user-btn-next',
    };



    //remove class from a set of items
    const removeClasses = (elemSet, className) => {

        elemSet.forEach(elem => {

            elem.classList.remove(className);

        });

    };

    //return exect parent node of the element
    const findParent = (elem, parentClass) => {

        let currentNode = elem;

        while (!currentNode.classList.contains(parentClass)) {
            currentNode = currentNode.parentNode;
        }

        return currentNode;

    };

    //get active button step number
    const getActiveStep = elem => {
        return Array.from(DOMstrings.stepsBtns).indexOf(elem);
    };

    //set all steps before clicked (and clicked too) to active
    const setActiveStep = activeStepNum => {

        //remove active state from all the state
        removeClasses(DOMstrings.stepsBtns, 'js-active');

        //set picked items to active
        DOMstrings.stepsBtns.forEach((elem, index) => {

            if (index <= activeStepNum) {
                elem.classList.add('js-active');
            }

        });
    };

    //get active panel
    const getActivePanel = () => {

        let activePanel;

        DOMstrings.stepFormPanels.forEach(elem => {

            if (elem.classList.contains('js-active')) {

                activePanel = elem;

            }

        });

        return activePanel;

    };

    //open active panel (and close unactive panels)
    const setActivePanel = activePanelNum => {

        //remove active class from all the panels
        removeClasses(DOMstrings.stepFormPanels, 'js-active');

        //show active panel
        DOMstrings.stepFormPanels.forEach((elem, index) => {
            if (index === activePanelNum) {

                elem.classList.add('js-active');

                setFormHeight(elem);

            }
        });

    };

    //set form height equal to current panel height
    const formHeight = activePanel => {

        const activePanelHeight = activePanel.offsetHeight;

        DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

    };

    const setFormHeight = () => {
        const activePanel = getActivePanel();

        formHeight(activePanel);
    };

    const btnOnclick = (eventTarget) => {

        const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

        let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

        //set active step and active panel onclick
        if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
            activePanelNum--;

        } else {

            activePanelNum++;

        }

        setActiveStep(activePanelNum);
        setActivePanel(activePanelNum);
    };

    const stepOnclick = (eventTarget) => {

        if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
            return;
        }

        //get active button step number
        const activeStep = getActiveStep(eventTarget);

        //set all steps before clicked (and clicked too) to active
        setActiveStep(activeStep);

        //open active panel
        setActivePanel(activeStep);
    };

    //STEPS BAR CLICK FUNCTION
    DOMstrings.stepsBar.addEventListener('click', e => {

        // //check if click target is a step button
        // const eventTarget = e.target;
        //
        // if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
        //     return;
        // }
        //
        // //get active button step number
        // const activeStep = getActiveStep(eventTarget);
        //
        // //set all steps before clicked (and clicked too) to active
        // setActiveStep(activeStep);
        //
        // //open active panel
        // setActivePanel(activeStep);
    });

    //PREV/NEXT BTNS CLICK
    DOMstrings.stepsForm.addEventListener('click', e => {

        const eventTarget = e.target;

        //check if we clicked on `PREV` or NEXT` buttons
        if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
            return;
        } else if (eventTarget.classList.contains(`${DOMstrings.stepNextChild}`)) {
            if (!$('.child_field input').not('.valid').length) {


                btnOnclick(eventTarget);
                $('#child_validation_error').text("") ;
            } else {
                $('#child_validation_error').text("Please check all required fields") ;
                return;
            }
        } else if ((eventTarget.classList.contains(`${DOMstrings.stepNextUser}`)) || (eventTarget.classList.contains(`${DOMstrings.stepPrevUser}`))){
            if (!$('.user_field input').not('.valid').length){

                btnOnclick(eventTarget);
                $('#user_validation_error').text("") ;
            } else {

                $('#user_validation_error').text("Please check all required fields") ;
                return;
            }
        } else {

            btnOnclick(eventTarget);
        }

        // const eventTarget = e.target;
        //
        // //check if we clicked on `PREV` or NEXT` buttons
        // if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
        //     return;
        // }
        //
        // //find active panel
        // const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);
        //
        // let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);
        //
        // //set active step and active panel onclick
        // if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
        //     activePanelNum--;
        //
        // } else {
        //
        //     activePanelNum++;
        //
        // }
        //
        // setActiveStep(activePanelNum);
        // setActivePanel(activePanelNum);

    });

    //SETTING PROPER FORM HEIGHT ONLOAD
    window.addEventListener('load', setFormHeight, false);

    //SETTING PROPER FORM HEIGHT ONRESIZE
    window.addEventListener('resize', setFormHeight, false);
</script>
</html>
