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
    <?= $this->Html->css('contact.css') ?>

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


<section class="map">

<div class="container">
	<div class="row">
        <div class="col-md-4">

            <address>
               <h3><p>PO Box 2020 Parkdale Vic 3195 |<a href="tel:0410 600 060"> 0410 600 060 </a> | <a href="mailto:info@littlefeetmusic.com.au">info@littlefeetmusic.com.au</a></p>
               </h3>
                <button id="enquiry" class="btn btn-warning btn-lg">Contact</button>

            </address>
        </div>



    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>Albert Park</h2>
            <address>
                <strong>Gasworks Arts Park </strong><br>
                <a href=""> Click here to see the map</a><br>
                21 Graham St​<br>
                Albert Park Vic 3206<br>

            </address>
        </div>
        <div class="col-md-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12602.906683432071!2d144.9461685139601!3d-37.84328423248015!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad667e9c057cb0d%3A0x997d9948b75df7e6!2s21%20Graham%20St%2C%20Albert%20Park%20VIC%203206!5e0!3m2!1sen!2sau!4v1571043345323!5m2!1sen!2sau" width=100% height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>


    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>Mordialloc</h2>
            <address>
                <strong>Mordialloc Neighbourhood House</strong><br>
                457 Main St<br>
                Mordialloc Vic 3195<br>

            </address>
        </div>
        <div class="col-md-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12575.199730077584!2d145.0857013456294!3d-38.00512681723409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad66d98ee7786c1%3A0x9473fc6d779f20e6!2s457%20Main%20St%2C%20Mordialloc%20VIC%203195!5e0!3m2!1sen!2sau!4v1571043050372!5m2!1sen!2sau" width=100% height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        </div>


    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h2>Port Melbourne</h2>
            <address>
            <strong>Liardet St Community Centre </strong><br>
            154 Liardet St<br>
            (Enter via Lalor St)<br>
            Port Melbourne Vic 3207<br>

            </address>
        </div>
        <div class="col-md-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12603.829983928848!2d144.9415322!3d-37.8378809!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x46e231fe9fd41feb!2sPort%20Melbourne%20Neighbourhood%20Centre!5e0!3m2!1sen!2sau!4v1571042664510!5m2!1sen!2sau" width=100% height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

        </div>


    </div>
</div>
</section>


<section class="testimonial">
    <div class="container">
        <h1>Testimonial</h1>

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
</body>

</html>
