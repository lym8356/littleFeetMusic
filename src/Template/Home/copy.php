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


<body>
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
<<<<<<< HEAD
<!-- <div>
=======
<section class="testimonial text-dark">
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

<div>
>>>>>>> 34aa43294fcad1803ffbbecd005d29f9588b05a4
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






</body>
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


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
<body class="text-dark">
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
                <button class="btn btn-outline-success fixedsize p-1" id="btn4" value="1" onclick="viewClass3()"> Family Class</button></div>
            <div class="p-1">
                <button class="btn btn-outline-success fixedsize p-1" id="btn5" value="1" onclick="viewFAQ()">FAQ</button></div>
            <div class="p-1">
                <a href='./Enrolments' class="btn btn-outline-success fixedsize p-1" >Enrol</a></div>
            <div class="p-1">
                <button class="btn btn-outline-success fixedsize p-1" id="enquiry" value="1"> Enquiry</button></div>
        </div>
    </section>
    <section>
        <div class="container ">
            <div class="col-sm" style="background-color: #CCE8E0">
                <div class="row">
                    <div class="col-sm" id="left-col">
                        <span id="specifyClass">
                            <h2>About the Classes</h2>
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

    <script type="text/javascript">
        function viewClass(){
            var a = document.getElementById("btn1").value;
            if (a=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Babies </h2><p>Live music, singing, dancing and playing percussion instruments. Loads of songs you know, and heaps of new ones to learn! Fun, colourful puppets, finger and lap plays. These classes are great for child/parent bonding and for giving parents and carers musical ideas for home. You'll know loads of the songs, and there are loads of new ones to learn! Term fee includes a Little Feet Music song book!\n</p>";
                //document.getElementById("clsimage").innerHTML = "<?php echo $this->Html->image('cls-baby.jpg'); ?>";
            }
        }

        function viewClass1() {
            var b = document.getElementById("btn2").value;
            if (b=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Toddlers</h2><p> Live music where listening skills are enhanced - children start to learn how to identify changes in music (e.g., start and stop) and musical elements such as dynamics (loud and quiet), tempo (fast and slow) and timbre (characteristics of sounds). Learn about taking it in turns, meet some interesting and friendly puppets, learn colours and counting through music, and have a great fun time. Listening and social skills are developed and nurtured. Term fee includes a Little Feet Music song book!</p>";
            }
        }
        function viewClass2(){
            var c = document.getElementById("btn3").value;
            if (c=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2> Preschoolers </h2><p>Live music! Cool, creative and fun! Singing and conscious learning of beat, tempo, dynamics and pitch through fabulously fun and stimulating games, movement, songs and rhymes. Musical elements are expanded on and the focus is on having fun while gaining an understanding of music. Simple notation and the concept of reading from left to right are developed. There’s lots of structured musical game playing and solo singing opportunities in a relaxed and friendly environment. Children who continue on for the 4-5 year old program learn some of the symbols which represent musical sounds and rests and how to play simple songs/melodies on the chime bars. Term fee includes a Little Feet Music song book!\n</p>";
            }
        }
        function viewClass3(){
            var d = document.getElementById("btn4").value;
            if (d=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Family Class </h2><p>It's like a BIG PARTY every week! Live music, songs, dances and playing percussion instruments. Fun, colourful puppets and simple instruments. These sessions are great for child/parent bonding and for giving parents and carers musical ideas to use at home. Dancing, jumping and wriggling, playing musical games, learning about taking it in turns, meeting some interesting puppets, learning colours and counting through music, and having a great fun time. Listening and social skills are developed and nurtured. Term fee includes a Little Feet Music song book!\n</p>";
            }
        }

        function viewFAQ() {
            var b = document.getElementById("btn5").value;
            if (b=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>FAQ </h2><h4>Do we join in the classes?</h4><p>Yes!  Children will share the experience of music with their parent or carer, encouraging a beautiful and special bond between the child and the attending adult.  Children will learn more when they see you becoming involved – they’ll discover that music is a natural part of life to be experienced and enjoyed by people of all ages!  Through Little Feet Music many adults rediscover their own pleasure in making music!</p><br><h4>What should my child wear to music classes?</h4><p>Children need to wear something comfortable as there is lots of moving around to the music, i.e., clapping, jumping, wobbling and wiggling.</p><br><h4>I have a young baby - can I bring him/her along too?</h4><p>The program is designed to be a one-on-one music session for you and your child, however attendance of babies is welcomed.  From when they start to join in or at twelve months of age (whichever comes earlier) then a generous discount of 25% is available for the second child.</p><br><h4>My older child is attending - can I bring him/her along?</h4><p>If a sibling under 6 years of age is attending a one-off session, the fee is $20 per class.  If you'd like to enrol them in for the term, then they'll get a 25% discount on the term fee.  If child other than a sibling is attending a one-off session, the fee is $26 per class.</p><br><h4>Is there a discount for bringing more than one child to the classes?</h4><p>There is a 25% discount for the second child when siblings come to the same class.</p><br><h4>What happens if we miss a class?</h4><p>If you miss a class, please contact me by email or phone prior to 9am on the day of the class that you will miss.  To make up for the missed class you can either;</p><br><ul><li>attend a class on another day, or</li><li>send a friend along to the class in your place, or</li><li>bring a friend along to another class with you</li></ul><p>as long as it is within the term you have paid for.  Make sure you confirm before making up the missed class so there are too many children in one class.  Refunds are not possible for missed classes.  There are no refunds or transfers of monies in the event that you are unable to attend part of or the whole term.</p><br><h4>Why Music?</h4>Research show 0-2 years is a critical period for brain, speech and music development. In fact, the music part of the brain is VITAL for babies learning to speak. It's also a beautiful way to bond and spend special time together. </p><br><p>Music strengthens self image and self assurance, promotes concentration and focused listening and promotes enhanced social abilities.  Children have a natural love for singing, moving to music and dancing, jumping, clapping and tapping.  Music offers opportunities for social interaction and children learn to express themselves freely through music and movement. The connection betweeen music and mood starts early.  The more we respond to music by moving to it, the more the brain releases dopamine - the feel-good hormone.</p><br><h4>Why Little Feet Music?</h4><p>The Little Feet Music program is a carefully researched, developmental and sequential music program.  It’s interactive, entertaining and educational.  Rachel sings and plays guitar, so all of the music is live!  There are loads of weird and wonderful percussion instruments and fun, colourful props.  Each term your child will be given a Little Feet Music song book to keep, which has lots of the songs and activities we’ll do in the classes for that term.   There are lots of songs you’ll know as well as loads more for you to learn!</p><br><p>Live music is COOL!  The Little Feet Music classes all use voice and guitar, so it's real LIVE music!</p><br><p>Through the Little Feet Music program children acquire a knowledge of musical concepts such as beat, rhythm, inner hearing, pitch (high and low), dynamics (loud and soft), timbre (characteristics of sounds), form and tempo (fast and slow) while gaining enhanced social skills and confidence.</p><br><p>Little Feet Music is LOTS of fun and the best way for children to learn is by having fun!</p><br><p>Observation is participation!</p><p>Many parents find that their children start singing at home the songs they've been learning at Little Feet Music classes  - they have actually been listening and absorbing the music in the classes. Not all children will participate straight away and many children are quiet during class but participate more freely at home between classes. It's totally normal!</p><p><button class='btn btn-outline-success fixedsize p-1' id='btn6' value='1' onclick='viewTC()'>T&C</button>";
            }
        }
        function viewTC() {
            var b = document.getElementById("btn5").value;
            //scroll up code for next 2 lines
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
            if (b=="1"){
                document.getElementById("specifyClass").innerHTML= "<h1> T&C </h1><h4> <p>I have a young baby - can I bring him/her along too?</p></h4><p> Attendance of babies is welcomed.  From when they start to join in or at twelve months of age (whichever comes earlier) then a generous discount of 25% is available for the second child.</p><h4><p>  My older child is attending - can I bring him/her along?</p></h4><p>  If a sibling under 6 years of age is attending a one-off session, the fee is $20 per class.  If you'd like to enrol them in for the term, then they'll get a 25% discount on the term fee.  If child other than a sibling is attending a one-off session, the fee is $26 per class.</p><h4> <p> Is there a discount for bringing more than one child to the classes?</p></h4><p> There is a 25% discount for the second child when siblings come to the same class.</p><h4><p> What happens if we miss a class?</p></h4><p>If you miss a class, please contact us by email or phone prior to 9am on the day of the class that you will miss.  To make up for the missed class you can either;</p><ul><li>attend a class on another day, or</li><li>send a friend along to the class in your place, or</li><li>bring a friend along to another class with you</li></ul><p>as long as it is within the term you have paid for.  Make sure you confirm with the office before making up the missed class to avoid the situation where there are too many children in one class.  Refunds are not possible for missed classes.  There are no refunds or transfers to another term in the event that you are unable to attend part of or the whole term.</p>";
            }
        }

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
        <section class="testimonial text-dark">
            <div class="container">
                <div class="row">
                    <div class="text-center">
                        <div class="col-sm-1"></div>
                        <div class="col p-3">
                            <p> <i>How awesome is these Albums???? These are a must-have in the car, keeps my little ones entertained and singing along every single time! Love these, and recommend to anyone with kids!!!</i></p>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                </div>
            </div>
        </section>
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
<?php
if(isset($_POST['submit'])) {
    require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require 'vendor/phpmailer/phpmailer/src/SMTP.php';





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
    $mail->send();

    if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    } else {

        return true;
    }
}
?>
</html>

<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="text-center">
                <div class="col-sm-1"></div>
                <div class="col p-3">
                    <p> <i>How awesome is these Albums???? These are a must-have in the car, keeps my little ones entertained and singing along every single time! Love these, and recommend to anyone with kids!!!</i></p>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
</section>
</body>



