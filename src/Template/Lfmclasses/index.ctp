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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
    <?= $this->Html->css('Class.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>



<?php echo $this->element('header') ?>





<body>
<div class="headpic">
    <div class="container">
        <?php echo $this->Html->image('LFM.jpg'); ?>
    </div>
</div>
<div class="container" id="div1">
    <section>
        <div class="row container ml-2 mt-3 mb-3">
            <div class="p-1">
                <button class="btn btn-outline-success fixedsize p-1" id="btn1" value="1" onclick="viewClass()"> Babies </button></div>
            <div class="p-1">
                <button class="btn btn-outline-success fixedsize p-1" id="btn2" value="1" onclick="viewClass1()"> Toddlers</button></div>
            <div class="p-1">
                <button class="btn btn-outline-success fixedsize p-1" id="btn3" value="1" onclick="viewClass2()"> Preschoolers</button></div>
            <div class="p-1">
                <button class="btn btn-outline-success fixedsize p-1" id="btn6"> Family Class</button></div>
            <div class="p-1">
                <button class="btn btn-outline-success fixedsize p-1" id="btn4" value="1" onclick="viewClass3()">FAQ</button></div>
            <div class="p-1">
                <a href="/Class/EnrolInfo" class="btn btn-outline-success fixedsize p-1" >Enrol</a></div>
            <div class="p-1">
                <button class="btn btn-outline-success fixedsize p-1" id="enquiry" value="1" onclick="viewClass3()"> Enquiry</button></div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="col-sm" style="background-color: #CCE8E0">
                <div class="row">
                    <div class="col-sm" id="left-col">
                        <span id="specifyClass">
                            <h2>Generic text about classes</h2>
                            <p>Fun, cool, creative and interactive music classes for kids aged six months to five years!

                                Rachel Parkinson has been running children's music programs for over fifteen years, so has a plethora of experience with children and with music!

                                Rachel completed a Preschool Music Teacher Training Course (Level 1) through the Kodaly Music Education Institute of Australia in 2006 and is a full writer member of the Australasian Performing Right Association (APRA).  Rachel has also been a member of the Australian Recording Industry Association (ARIA) since 2011.

                                Rachel is continually updating her skills by attending workshops and courses.  She's been involved in the entertainment industry since the early 90s, having played drums, guitar and sung in original touring pub and club bands from the tender age of 16.
                            </p>
                        </span>


                    </div>
                    <div class="col-sm mb-4" id="right-col">
                        <div class="container mt-3"><span id="clsimage"><?php echo $this->Html->image('cls2.jpg'); ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="testimonial">
        <div class="container">
            <h1>Testimonial</h1>

        <div class="row">
            <div class="col-md-4 text-center sb ">
               <div class="testimonial-info">
               <blockquote>
                   <p> My kid enjoyed the class.</p>
               </blockquote>
               <h5> -John Smith</h5>
               <h7>Little Feet Music Parent</h7>
               </div>
           </div>
            <div class="col-md-4 text-center sb">
                <div class="testimonial-info">
                    <blockquote>
                        <p> My child likes the class so much.</p>
                    </blockquote>
                    <h5> -Paul Frank</h5>
                    <h7>Little Feet Music Parent</h7>
                </div>
            </div>
            <div class="col-md-4 text-center sb">
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
    <script type="text/javascript">
        function viewClass(){
            var a = document.getElementById("btn1").value;
            if (a=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 0-1 </h2><p>Children and adults participate in songs, dances and playing percussion instruments.  Fun, colourful puppets and simple instruments are used and there are lots of finger and lap plays.  These sessions are great for child/parent bonding and for giving parents and carers musical ideas to use at home.</p>";
                //document.getElementById("clsimage").innerHTML = "<?php echo $this->Html->image('cls-baby.jpg'); ?>";
            }
        }

        function viewClass1() {
            var b = document.getElementById("btn2").value;
            if (b=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 1-2 </h2><p>Listening skills are enhanced - children start to learn how to identify changes in music (e.g., start and stop) and musical elements such as dynamics (loud and quiet), tempo (fast and slow) and timbre (characteristics of sounds).  There’s lots of singing, dancing, clapping and jumping!</p>";
            }
        }
        function viewClass2(){
            var c = document.getElementById("btn3").value;
            if (c=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 2-3 </h2><p>There’s dancing, jumping and wriggling, playing musical games, learning about taking it in turns, meeting some interesting and friendly puppets, learning colours and counting through music and generally having a great fun time.  Listening and social skills are developed and nurtured.</p>";
            }
        }
        function viewClass3(){
            var d = document.getElementById("btn4").value;
            if (d=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 3-4 </h2><p>Children develop conscious learning of beat, tempo, dynamics and pitch through stimulating games, directed movement, songs and rhymes.  Musical elements are expanded on and the focus is on having fun while gaining an understanding of music. </p>";
            }
        }
        function viewClass4(){
            var e = document.getElementById("btn5").value;
            if (e=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 4-5 </h2><p>Children learn some of the symbols which represent musical sounds and rests and learn how to play simple songs/melodies on the chime bars.  Simple notation and the concept of reading from left to right are built upon. There’s lots of structured musical game playing and solo singing opportunities in a relaxed and friendly environment.  Children who participate in Little Feet Music’s 4-5 year old program can confidently move onto learning a musical instrument.</p>";
            }
        }
        function viewClass5(){
            var f = document.getElementById("btn6").value;
            if (f=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about family CLass</h2>";
            }
        }
        $(document).ready(function(){
            $("#btn6").click(function(){
            $("#div1").load("demo_class.php");
        });
});

    </script>




    <div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
</div>

<div id="contact-popup">
    <form class="contact-form" action="" id="contact-form"
          method="post" enctype="multipart/form-data">
        <button type="button" data-dismiss="modal" class="close">&times;</button>
        <h1>Contact Us</h1>
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
            <input type="submit" id="submit" name="submit" value="Submit" />
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
<?php
if(isset($_POST['submit'])) {
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';





    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->IsSmtp();

    $mail->Host='smtp.gmail.com';
    $mail->Port=587;
    $mail->SMTPDebug = 1;
    $mail->SMTPAuth=true;
    $mail->SMTPSecure='tls';
    $mail->Username='team117bluewater@gmail.com';
    $mail->Password='M0nash123';



    $mail->setFrom($_POST['userEmail'], $_POST['userName']);
    $mail->addAddress('team117bluewater@gmail.com', 'Little Feet Music');
    $mail->Subject=$_POST['userNeed'];
    $mail->Body=($_POST['message']);
    $mail->send();

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    } else {
        echo "Message has been sent";
        return true;
    }


}
?>


</html>

</body>


