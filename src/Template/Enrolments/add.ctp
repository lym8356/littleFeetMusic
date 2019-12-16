<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enrolment $enrolment
 */
?>
<!DOCTYPE html>
<html>
<head>
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
    </style>
</head>
<body>
<div class="multisteps-form" id="enrol_status">
    <!--progress bar-->
    <div class="row">
        <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
                <button class="multisteps-form__progress-btn js-active" type="button" title="Child Info">Child Info
                </button>
                <button class="multisteps-form__progress-btn" type="button" title="Your Contact Details">Your Contact
                    Details
                </button>
                <button class="multisteps-form__progress-btn" type="button" title="Class Summary">Enrolment Summary
                </button>
                <button class="multisteps-form__progress-btn" type="button" title="Payment">Payment</button>
            </div>
        </div>
    </div>
    <!--form panels-->
    <div class="row">
        <div class="col-12 col-lg-8 m-auto">
            <?php echo $this->Form->create('enrolment', ['class' => 'multisteps-form__form', 'id' => 'enrol_form']); ?>
            <!--Child form panel-->
            <div class="multisteps-form__panel shadow p-4 rounded bg-white js-active" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Child Info</h3>
                <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken'); ?>"/>
                <div class="multisteps-form__content">
                    <div class="form-row mt-4 child_field">
                        <div class="col-12 col-sm-6">
                            <?php echo $this->Form->control('child_first_name[]', ['class' => 'form-control', 'label' => 'Child First Name']); ?>
                            <?php echo $this->Form->control('child_DOB[]', ['class' => 'form-control', 'label' => 'Child DOB']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('child_last_name[]', ['class' => 'form-control', 'label' => 'Child Last Name']); ?>
                            <?php echo $this->Form->control('child_note[]', ['class' => 'form-control', 'type' => 'text', 'label' => 'Extra Note']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('relation[]', ['class' => 'form-control',
                                'label' => 'Relation To Child', 'type' => 'select', 'options' => array('Parent'=>'Parent','Grandparent'=>'Grandparent',
                                    'Carer'=>'Carer','Nanny'=>'Nanny','Other'=>'Other')]); ?>
                        </div>
                    </div>
                    <span class="input-group-btn">
                            <button type="button" class="btn btn-info add_row mt-3">Add An Additional Child</button>
                        </span>
                    <div class="button-row d-flex mt-4">
                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                </div>
            </div>
            <!--User form panel-->
            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Your Details</h3>
                <div class="multisteps-form__content">
                    <div class="form-row mt-4">
                        <div class="col-12 col-sm-6">
                            <?php echo $this->Form->control('user_first_name', ['class' => 'form-control', 'label' => 'First Name']); ?>
                            <?php echo $this->Form->control('user_dob', ['class' => 'form-control', 'label' => 'Date Of Birth']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('user_last_name', ['class' => 'form-control', 'label' => 'Last Name']); ?>
                            <?php echo $this->Form->control('user_email', ['class' => 'form-control', 'type' => 'text', 'label' => 'Email']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('user_phone', ['class' => 'form-control', 'label' => 'Phone']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('user_postcode', ['class' => 'form-control', 'type' => 'text', 'label' => 'Postcode']); ?>
                        </div>
                    </div>
                </div>
                <div class="button-row d-flex mt-4">
                    <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                </div>
            </div>
            <!--Class Summary form panel-->
            <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h3 class="multisteps-form__title">Enrolment Summary</h3>
                <div class="multisteps-form__content">
                    <div class="form-row mt-4">
                        <div class="col-12 col-sm-6">
                            <?php echo $this->Form->control('price', ['class' => 'form-control', 'label' => 'Total Price', 'disabled']); ?>
                            <?php echo $this->Form->control('class_time', ['class' => 'form-control', 'label' => 'Class Time', 'disabled']); ?>
                            <?php echo $this->Form->control('price', ['label' => '', 'hidden']); ?>
                        </div>
                        <div class="col-12 col-sm-6 mt-4 mt-sm-0">
                            <?php echo $this->Form->control('location', ['class' => 'form-control', 'label' => 'Location', 'disabled']); ?>
                            <?php echo $this->Form->control('age_group', ['class' => 'form-control', 'type' => 'text', 'label' => 'Age Group', 'disabled']); ?>
                            <?php echo $this->Form->control('term_id', ['type' => 'text', 'label' => '', 'hidden']); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="button-row d-flex mt-4 col-12">
                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>
                            <?php echo $this->Form->button('Enrol', ['class' => 'btn btn-primary ml-auto js-btn-next',
                                'id' => 'enrolBtn', 'type' => 'submit']); ?>
                            <!--                        <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>-->
                        </div>
                    </div>
                </div>
            </div>

            <!--payment panel-->
            <!--                <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">-->
            <!--                    <h3 class="multisteps-form__title">Additional Comments</h3>-->
            <!--                    <div class="multisteps-form__content">-->
            <!--                        -->
            <!--                        <div class="form-row mt-4">-->
            <!--                    <textarea class="multisteps-form__textarea form-control"-->
            <!--                              placeholder="Additional Comments and Requirements"></textarea>-->
            <!--                        </div>-->
            <!--                        <div class="button-row d-flex mt-4">-->
            <!--                            <button class="btn btn-primary js-btn-prev" type="button" title="Prev">Prev</button>-->
            <!--                            <button class="btn btn-success ml-auto" type="button" title="Send">Send</button>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>
</body>

<script>

    $('.add_row').click(function (e) {
        if (($('.child_field').length) < 3) {
            var clone = $('.child_field').first().clone();
            clone.append("<div class='col-12 col-sm-6 mt-4 mt-sm-0'><button type='button' class='btn btn-danger mt-5 float-right remove_row'>Remove</button></div>");
            clone.insertBefore('.add_row');
        } else {
            alert('You Can Only Enrol 3 Children At Once');
        }
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

    // $('#enrolBackBtn').click(function(e)){
    //
    // }
    //DOM elements
    const DOMstrings = {
        stepsBtnClass: 'multisteps-form__progress-btn',
        stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
        stepsBar: document.querySelector('.multisteps-form__progress'),
        stepsForm: document.querySelector('.multisteps-form__form'),
        stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
        stepFormPanelClass: 'multisteps-form__panel',
        stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
        stepPrevBtnClass: 'js-btn-prev',
        stepNextBtnClass: 'js-btn-next'
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

    //STEPS BAR CLICK FUNCTION
    DOMstrings.stepsBar.addEventListener('click', e => {

        //check if click target is a step button
        const eventTarget = e.target;

        if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
            return;
        }

        //get active button step number
        const activeStep = getActiveStep(eventTarget);

        //set all steps before clicked (and clicked too) to active
        setActiveStep(activeStep);

        //open active panel
        setActivePanel(activeStep);
    });

    //PREV/NEXT BTNS CLICK
    DOMstrings.stepsForm.addEventListener('click', e => {

        const eventTarget = e.target;

        //check if we clicked on `PREV` or NEXT` buttons
        if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`))) {
            return;
        }

        //find active panel
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

    });

    //SETTING PROPER FORM HEIGHT ONLOAD
    window.addEventListener('load', setFormHeight, false);

    //SETTING PROPER FORM HEIGHT ONRESIZE
    window.addEventListener('resize', setFormHeight, false);
</script>
</html>
