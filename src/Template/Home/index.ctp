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
    <?= $this->Html->css('homepage.css') ?>

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

<section id="LFM-about-us">
    <div class="container text-dark">
        <div class="row">
            <div class="col-md-12">
                <div class="LFM-about-us-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div>
                                <?php foreach ($home as $a)
                                {
                                ?>
                                    <br><h2><b><?php echo $a->heading ?></b></h2>
                                    <br><p><?php echo $a->p2 ;?></p>
                                    <p><?php echo $a->p ;?></p>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="text-center">
                                <a href="./Enrolments" class="btn btn-warning btn-lg" >Enrol</a>
                                <button id="enquiry" class="btn btn-warning btn-lg">Enquiry</button>
                               <!--  <button onclick="topFunction()" class="btn btn-warning btn-lg" id="myBtn" title="Go to top"> ^ </button> -->
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="LFM-about-us-right text-center">
                                <?php echo $this->Html->image('sc.jpg'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- <div>
    <script type="text/javascript">
                //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0; // For Safari
          document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
</div> -->



<div id="contact-popup">
    <form class="contact-form" action="" id="contact-form"
          method="post" enctype="multipart/form-data">
        <button type="button" data-dismiss="modal" class="close">&times;</button>
        <h1>Contact Us</h1>
        <p>* required fields</p>
        <div>
            <div>
                <label>Name *: </label><span id="userName-info"
                                             class="info"></span>
            </div>
            <div>
                <input type="text" id="userName" name="userName"
                       class="inputBox" />
            </div>
        </div>
        <div>
            <div>
                <label>Email *: </label><span id="userEmail-info"
                                              class="info"></span>
            </div>
            <div>
                <input type="text" id="userEmail" name="userEmail"
                       class="inputBox" />
            </div>
        </div>
        <div>
            <div>
                <label>Please specify your need *:</label><span id="userNeed-info" class="info"></span>
            </div>
            <div>
                <select id="userNeed"  name="userNeed" class="inputBox"/>
                <option value=""></option>
                <option value="Classes">Classes</option>
                <option value="Concert">Concert/Event</option>
                <option value="Party">Party</option>
                <option value="Incursion">Incursion</option>
                <option value="Workshop">Workshop</option>
                <option value="Other">Other</option>
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
            <input type="submit" id="submit" name="submit" value="Submit"/>
            <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken'); ?>" />
        </div>
    </form>
</div>
</body>

<script>
    $(document).ready(function () {
        $("#enquiry").click(function () {
            $("#contact-popup").show();
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        });

        $("#contact-form").on("submit", function () {
            var valid = true;
            $(".info").html("");
            $("inputBox").removeClass("input-error");

            var userName = $("#userName").val();
            var userEmail = $("#userEmail").val();
            var subject = $("#subject").val();
            var message = $("#message").val();

            if (userName == "") {
                $("#userName-info").html("Required.");
                $("#userName").addClass("input-error");
            }
            if (userEmail == "") {
                $("#userEmail-info").html("Required.");
                $("#userEmail").addClass("input-error");
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
            {
                $("#userEmail-info").html("Invalid email address");
                $("#userEmail").addClass("input-error");
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("Required");
                $("#subject").addClass("input-error");
                valid = false;
            }
            if (message == "") {
                $("#userMessage-info").html("Required");
                $("#message").addClass("input-error");
                valid = false;
            }
            return valid;


        });
        $('.close').click(function () {
            $("#contact-popup").hide();
        });



    });

</script>
<div>
<?php
if(isset($_POST['submit'])) {
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    require 'vendor/phpmailer/phpmailer/src/Exception.php';





    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSmtp();

    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='false';
    $mail->Username='team117bluewater@gmail.com';
    $mail->Password='M0nash123';



    $mail->From=$_POST['userEmail'];
    $mail->FromName=$_POST['userName'];
    $mail->AddReplyTo($_POST['userEmail'], $_POST['userName']);
    $mail->addAddress('team117bluewater@gmail.com', 'Little Feet Music');
    $mail->Subject=$_POST['userNeed'];
    $mail->Body=($_POST['message']);
    if(!$mail->send())
    {
        $msg = "We have received your enquiry, thank you!";
    }
    else
    {

        return true;
    }
}
?>
</div>
<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <div class="col-sm-1"></div>
                <div class="col p-2">
                    <p> <i>All 3 of my little people have enjoyed Rachel and Little Feet Music. So many favourite songs, so good for their confidence. Thanks Rachel for many fun times :) We highly, highly recommend LFM!!!</i></p>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
</section>



</body>
