<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
        </script>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!--    <?//= $this->Html->css('base.css') ?> -->
    <!--    <?//= $this->Html->css('style.css') ?> -->

    <!-- bootstrap -->
    <?= $this->Html->css('/bootstrap/css/bootstrap.min.css') ?>
    <?= $this->Html->script('/bootstrap/js/jquery-3.3.1.slim.min.js') ?>
    <?= $this->Html->script('/bootstrap/js/bootstrap.min.js') ?>
    <?= $this->Html->script('/bootstrap/js/popper.min.js') ?>
    <!-- font awesome -->
    <?= $this->Html->css('/font-awesome/css/all.min.css') ?>
    <?= $this->Html->script('/font-awesome/js/all.min.js') ?>
    <!-- custom css -->
    <?= $this->Html->css('event.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>



<?php echo $this->element('header') ?>

<div class="headpic">
    <div class="container">
        <?php echo $this->Html->image('LFM.jpg'); ?>
    </div>
</div>




<body>

<section id="LFM-about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="LFM-about-us-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="LFM-about-us-left">
                                <p>Want a musical party? Rachel will come to your house or venue!  Parties are suitable for kids aged 6 months to 6 years, and are fun, fun, fun!
                                </p>
                                <p>What is included:</p>
                                <ul>
                                    <li>Rachel and her guitar!</li>
                                    <li>Percussion instruments for the kids to play!</li>
                                    <li>Colourful puppets and props!</li>
                                    <li>Loads of singing, jumping, dancing and fun!</li>

                                </ul>
                                <p>What we need:</p>
                                <p>A space to party in (your house or a venue)</p>

                            </div>
                            <button id="Book" class="btn btn-warning btn-lg">Book now</button>
                        </div>
                        <div class="col-md-6">
                            <div class="LFM-about-us-right">
                                <?php echo $this->Html->image('sc.jpg'); ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<section class="testimonial">
    <div class="container">
        <h1>Testimonial</h1>
        <p class="text-center"> from our customers</p>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="testimonial-info">
                    <blockquote>
                        <p> My kid enjoyed the class.</p>
                    </blockquote>
                    <h5> -John Smith</h5>
                    <h7>Little Feet Music Parent</h7>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="testimonial-info">
                    <blockquote>
                        <p> My child likes the class so much.</p>
                    </blockquote>
                    <h5> -Paul Frank</h5>
                    <h7>Little Feet Music Parent</h7>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="testimonial-info">
                    <blockquote>
                        <p> Really nice class and teacher.</p>
                    </blockquote>
                    <h5> -Sarah Jane</h5>
                    <h7>Little Feet Music Parent</h7>
                </div>
            </div>

        </div>
    </div>
</section>

<div id="contact-popup">
    <form class="contact-form" action="" id="contact-form"
          method="post" enctype="multipart/form-data">
        <h1>Contact Us</h1>
        <div class="row">
            <div class="col-md-6">
                <label>First name *: </label><span id="userFName-info"
                                           class="info"></span>
                <input type="text" id="userFName" name="userFName"
                       class="inputBox" />
            </div>
            <div class="col-md-6">
                <label>Last name *: </label><span id="userLName-info"
                                                 class="info"></span>
                <input type="text" id="userLName" name="userLName"
                       class="inputBox" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <label>Email *: </label><span id="userEmail-info"
                                            class="info"></span>
                <input type="text" id="userEmail" name="userEmail"
                       class="inputBox" />
            </div>
            <div class="col-md-6">
                <label>Please specify your need *</label><span id="userNeed-info" class="info"></span>
                <select id="userNeed"  name="userNeed" class="inputBox"/>
                    <option value=""></option>
                    <option value="Book Concert">Book Concert</option>
                    <option value="Book Party">Book Party</option>
                </select>

            </div>
        </div>

        <div>
            <div>
                <label>Message *: </label><span id="userMessage-info"
                                              class="info"></span>
            </div>
            <div>
                    <textarea id="message" name="message"
                              class="inputBox"></textarea>
            </div>
        </div>

        <div>
            <input type="button" id="close" name="close" value="Close"/>
        </div>
    </form>
</div>

<script>
    $(document).ready(function () {
        $("#Book").click(function () {
            $("#contact-popup").show();
        });



        $("#contact-form").on("submit", function () {
            var valid = true;
            $(".info").html("");
            $("inputBox").removeClass("input-error");

            var userFName = $("#userFName").val();
            var userLName= $("#userLName").val();
            var userEmail = $("#userEmail").val();
            var userNeed = $("#userNeed").val();
            var message = $("#message").val();

            if (userFName == "") {
                $("#userFName-info").html("required.");
                $("#userFName").addClass("input-error");
            }
            if (userLName == "") {
                $("#userLName-info").html("required.");
                $("#userLName").addClass("input-error");
            }
            if (userEmail == "") {
                $("#userEmail-info").html("required.");
                $("#userEmail").addClass("input-error");
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("invalid.");
                $("#userEmail").addClass("input-error");
                valid = false;
            }

            if (userNeed == "") {
                $("#userNeed-info").html("required.");
                $("#userNeed-info").addClass("input-error");
                valid = false;
            }
            if (message == "") {
                $("#userMessage-info").html("required.");
                $("#message").addClass("input-error");
                valid = false;
            }

            return valid;

        });
        $(`.close`).click(function () {
            $("#contact-popup").hidden;
        });

    });


</script>

</html>

</body>


