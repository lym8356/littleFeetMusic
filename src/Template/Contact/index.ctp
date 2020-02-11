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
    <?= $this->Html->css('contact.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>
<?php echo $this->element('header') ?>
<body class="text-dark">
<div class="headpic">
    <div class="container">
        <?php echo $this->Html->image('LFM.jpg'); ?>
    </div>
</div>


<section class="map">

    <div class="container" style="padding-top: 20px">
        <div class="row" style="background-color: #ffe6ff;">
            <div class="col-sm-4">
                <h2>Office</h2>
                <address>
                    <h5>PO Box 2020<br/> Parkdale Vic 3195</h5>
                    <h5>
                        <a href="tel:0410 600 060"> 0410 600 060 </a><br/></h5>
                    <h5>
                        <a href="mailto:team117bluewater@gmail.com" >info@littlefeetmusic.com.au</a></p>
                    </h5>
                    <button id="enquiry" class="btn btn-warning btn-lg">Contact</button>
                </address>
            </div>
            <div class="col-sm-8" style="padding-bottom: 10px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12577.173800744824!2d145.0768127!3d-37.9936152!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1d04567609f506f0!2sParkdale%20Station!5e0!3m2!1sen!2sau!4v1581238345259!5m2!1sen!2sau" width=100% height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="background-color: #fff5e6;">
            <div class="col-md-4">
                <h2>Albert Park</h2>
                <address>
                    <strong>Gasworks Arts Park </strong><br>
                    21 Graham St​<br>
                    Albert Park Vic 3206<br><br>
                    <a href="img/GLS.jpg" data-fancybox="gal" target="_blank">Click here to see the map</a><br>
                </address>
            </div>
            <div class="col-md-8" style="padding-bottom: 10px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12602.906683432071!2d144.9461685139601!3d-37.84328423248015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad667e9c057cb0d%3A0x997d9948b75df7e6!2s21%20Graham%20St%2C%20Albert%20Park%20VIC%203206!5e0!3m2!1sen!2sau!4v1571043345323!5m2!1sen!2sau" width=100% height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="background-color: #ffe6ff;">
            <div class="col-md-4">
                <h2>Mordialloc</h2>
                <address>
                    <strong>Mordialloc Neighbourhood House</strong><br>
                    457 Main St<br>
                    Mordialloc Vic 3195<br>

                </address>
            </div>
            <div class="col-md-8" style="padding-bottom: 10px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12575.199730077584!2d145.0857013456294!3d-38.00512681723409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad66d98ee7786c1%3A0x9473fc6d779f20e6!2s457%20Main%20St%2C%20Mordialloc%20VIC%203195!5e0!3m2!1sen!2sau!4v1571043050372!5m2!1sen!2sau" width=100% height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="background-color:#fff5e6;">
            <div class="col-md-4">
                <h2>Port Melbourne</h2>
                <address>
                    <strong>Liardet St Community Centre </strong><br>
                    154 Liardet St<br>
                    (Enter via Lalor St)<br>
                    Port Melbourne Vic 3207<br>
                </address>
            </div>
            <div class="col-md-8" style="padding-bottom: 10px">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12603.829983928848!2d144.9415322!3d-37.8378809!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x46e231fe9fd41feb!2sPort%20Melbourne%20Neighbourhood%20Centre!5e0!3m2!1sen!2sau!4v1571042664510!5m2!1sen!2sau" width=100% height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
        </div>
    </div>
</section>


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

<section class="testimonial text-dark">
    <div class="container">
        <div class="row">
            <div class="text-center text-justify text-dark">
                <div class="col-sm-2"></div>
                <div class="col p-2">
                    <p> <i>So much fun - all the kids love the music and singing by Rachel!
                            Get around this everyone!!!! This woman is awesome!!!</i></p>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
</section>


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
            if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL))
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

<?php
if(isset($_POST['submit'])) {
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';
    require 'vendor/phpmailer/phpmailer/src/Exception.php';

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
    $mail->addAddress('team117bluewater@gmail.com', 'Little Feet Music');
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
        $autoRespond->setFrom('team117bluewater@gmail.com', 'Little Feet Music');
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


