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
<html>
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
    <?= $this->Html->css('Event.css') ?>

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
<body class="text-dark">

<!--{Introduction}-->
<section id="LFM-about-us">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="LFM-about-us-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="LFM-about-us-left text-justify">
                                <h3>At Little Feet Music the music is all LIVE!
                                </h3>
                                <p>Services included:</p>
                                <ul>
                                    <li>Creative and cool music classes for children with parent or carer</li>
                                    <li>Music incursions and classes for early learning centres and primary schools </li>
                                    <li>Interactive workshops and live shows for community events and festivals</li>
                                    <li>Entertainment for birthday parties, playgroups and parents' groups</li>
                                    <li>Live shows with a full band plus Bingle the Bear</li>

                                </ul>
                                <p>Rachel will come to your house or venue!</p>
                                <p>What can be included:</p>
                                <ul>
                                    <li>Rachel and her guitar!</li>
                                    <li>Percussion instruments for the kids (and adults) to play!</li>
                                    <li>Colourful puppets and props!</li>
                                    <li>Loads of singing, jumping, dancing and fun!</li>
                                    <li>Bingle the Bear!</li>
                                    <li>A live band!</li>
                                </ul>
                                <p>What we need:</p>
                                <p>A space to party in (your house or a venue)</p>

                            </div>
                            <div class="text-center">
                                <button id="Book" class="btn btn-warning btn-lg">Book now</button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="LFM-about-us-right ">
                                <?php echo $this->Html->image('new.jpg'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<!--{Testimonial}-->
<section class="testimonial text-dark">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-1"></div>
            <div class ="col p-2">
                <p> <i>The best! Rachel is funny, fun, entertaining and energetic. The kids all love her. So do the adults!</i></p>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
</section>

<!--{Enquiry popup form}-->
<div id="contact-popup">
    <form class="contact-form" action="" id="contact-form"
          method="post" enctype="multipart/form-data">
        <button type="button" data-dismiss="modal" class="close">&times;</button>
        <h1>Contact Us</h1>
        <p class="text-danger">* required fields</p>
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
                <label>Please specify your need *</label><span id="userNeed-info" class="info"></span>
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
            <input type="submit" id="submit" name="submit" value="submit"/>
            <input type="hidden" name="_csrfToken" value="<?= $this->request->getParam('_csrfToken'); ?>" />
        </div>
    </form>
</div>

<!--{Form validation}-->
<script>
    $(document).ready(function () {
        let csrf_token = $('[name="_csrfToken"]').val();
        $("#Book").click(function () {
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!--{Send mail function}-->
<?php
if(isset($_POST['submit'])) {
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    require '../vendor/phpmailer/phpmailer/src/Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSmtp();

    $mail->Host='mail.dreamfactorymusic.com.au';
    $mail->Port=465;
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='ssl';
    $mail->Username='_mainaccount@dreamfactorymusic.com.au';
    $mail->Password='Z9.3TDQg2(pq9q';

    $mail->From=$_POST['userEmail'];
    $mail->FromName=$_POST['userName'];
    $mail->AddReplyTo($_POST['userEmail'], $_POST['userName']);
    $mail->addAddress('info@littlefeetmusic.com.au', 'Little Feet Music');
    $mail->Subject=$_POST['userNeed'];
    $mail->Body=($_POST['message']);
    if(!$mail->send())
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    }
    else
    {
        $autoRespond = new PHPMailer\PHPMailer\PHPMailer();

        $autoRespond->IsSmtp();


        $autoRespond->Host='mail.dreamfactorymusic.com.au';
        $autoRespond->Port=465;
        $autoRespond->SMTPDebug = 0;
        $autoRespond->SMTPAuth=true;
        $autoRespond->SMTPSecure='ssl';
        $autoRespond->Username='_mainaccount@dreamfactorymusic.com.au';
        $autoRespond->Password='Z9.3TDQg2(pq9q';


        $autoRespond->isHTML(true);
        $autoRespond->setFrom('info@littlefeetmusic.com.au', 'Little Feet Music');
        $autoRespond->addAddress($_POST['userEmail']);
        $autoRespond->Subject = "Thank you!";
        $autoRespond->Body = "
        <div>
        <h4><p>Hi, {$_POST['userName']}!</p></h4>
        <strong><p>Thanks for your email. I’ll get back to you as soon as I can!</p></strong>
       
        
        
        <p>Hear Little Feet Music songs on <a href='https://www.abc.net.au/abckids/abc-kids-listen-app/11131286' target=\"_blank\">ABC Kids Listen!</a><br>
        <a href='http://littlefeetmusic.com.au/video-music' target=\"_blank\">Watch our videos!</a><br>
        ALBUM!  I recorded it in Nashville and it’s absolutely amazing!  <a href='http://www.littlefeetmusic.com.au/online-shop#!/~/cart' target=\"_blank\">Get the CD online here</a> or listen on <a href='https://open.spotify.com/playlist/6ZG4FxeNLLYcF4gUam9ulV?si=AAO4FDFXTkaBHZX2F-gaow'target=\"_blank\"> Spotify here!</a><br>
        <logo><img src='http://littlefeetmusic.dreamfactorymusic.com.au/img/logo.gif'></logo></p>
        Fly Virgin, Qantas, Air Vanuatu, Malaysia or Singapore Airlines to hear my albums on the inflight entertainment!<br>
        <a href='https://open.spotify.com/playlist/6ZG4FxeNLLYcF4gUam9ulV?si=AAO4FDFXTkaBHZX2F-gaow' target=\"_blank\">Listen on Spotify here!</a> <br>
        <a href='https://www.facebook.com/LittleFeetMusic/' target=\"_blank\"> Hang out with us on Facebook!</a><br>
        <a href='https://twitter.com/littlefeetmusic' target=\"_blank\"> Follow us on Twitter!</a><br>
        <a href='https://instagram.com/littlefeetmusic/' target=\"_blank\">See what we look like on Instagram!</a><br>
        <a href='https://www.youtube.com/user/LittleFeetMusic' target=\"_blank\">Check out some videos on YouTube!</a><br>
       
        
        <strong><p>Thanks!<br>
        Rachel Parkinson</p></strong>
        
        </div>";


        if(!$autoRespond->Send())
        {
            echo "Mailer Error: " . $mail->ErrorInfo;
            return false;
        }
        else{
            echo  '<script> swal("Hi, '. $_POST['userName'] .'!\n" +
 "Thanks for your email.  I’ll get back to you as soon as I can! ")</script>';
        }



    }
}
?>
</body>
</html>


