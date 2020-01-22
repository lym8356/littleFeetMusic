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
                                    <h2><b><?php echo $a->heading ?></b></h2>
                                    <h5><?php echo $a->p2 ;?></h5>
                                    <p><?php echo $a->p ;?></p>
                                <?php
                                }
                                ?>
                            </div>   
<!--                             <div class="LFM-about-us-left text-dark">
                                <p>Rachel Parkinson runs Little Feet Music - amazingly fun and engaging music and movement classes for babies, toddlers and preschoolers.  Rachel knows HUNDREDS of songs, so it never gets boring!</p>
                                <p>Services include:</p>
                                <ul>
                                    <li>Creative and cool music classes for children with parent or carer</li>
                                    <li>Music incursions and classes for early learning centres and primary schools</li>
                                    <li>Interactive workshops and live shows for community events and festivals</li>
                                    <li>Entertainment for birthday parties, playgroups and parents' groups</li>
                                    <li>Live shows with a full band plus Bingle the crazy dancing the Bear</li>

                                </ul>
                                <p>Children who participate in preschool music develop better learning skills that carry on throughout their educational life.
                                </p>
                                <p>Little Feet Music helps children to develop skills such as strengthened self image and self assurance, improved concentration and listening skills, as well as offering lots of opportunities for social interaction.
                                </p>
                                <p>Children have a natural love for singing, moving to music, dancing, jumping, clapping and tapping. We use these skills to develop their brains and creativity through entertaining, fun and educational music.
                                </p>
                                <p>There have been over 8000 children attend Little Feet Music classes!  Rachel has performed at around 500 parties, festivals, schools and community events.  There have been over a thousand Little Feet Music classes per year since 2005.
                                </p>
                                <p>There are three amazingly engaging Little Feet Music albums, and they've been played on inflight entertainment systems with Qantas, Virgin, Singapore Airlines, Malaysia Airlines, Air Vanuatu, and on ABC Kids!  Listen here!
                                </p>
                                <p>Contact Little Feet Music now, and unlock that door to your child's creativity!
                                </p>
                                <a href="./Class/EnrolInfo" class="btn btn-warning btn-lg" >Enrol</a>
                                <button id="enquiry" class="btn btn-warning btn-lg">Enquiry</button>
                            </div> -->
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



<div id="contact-popup">
    <form class="contact-form" action="" id="contact-form"
          method="post" enctype="multipart/form-data">
        <button type="button" data-dismiss="modal" class="close">&times;</button>
        <h1>Contact Us</h1>
        <div>
            <div>
                <label>Name *(* means required): </label><span id="userName-info"
                                             class="info"></span>
            </div>
            <div>
                <input type="text" id="userName" name="userName"
                       class="inputBox" />
            </div>
        </div>
        <div>
            <div>
                <label>Email *(* means required): </label><span id="userEmail-info"
                                              class="info"></span>
            </div>
            <div>
                <input type="text" id="userEmail" name="userEmail"
                       class="inputBox" />
            </div>
        </div>
        <div>
            <div>
                <label>Please specify your need *(* means required):</label><span id="userNeed-info" class="info"></span>
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
                <label>Message *(* means required): </label><span id="userMessage-info"
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
