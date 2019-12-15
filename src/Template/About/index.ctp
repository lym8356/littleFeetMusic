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
    <?= $this->Html->css('News-and-Videos.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?php echo $this->element('header') ?>


</head>









<body>
<div class="headpic">
    <div class="container">
        <?php echo $this->Html->image('LFM.jpg'); ?>
    </div>
</div>


<section id="LFM-about-us">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="LFM-about-us-area">
                    <div class="row">
                        <div class="LFM">
                            <h1>About</h1>
                            <h2>Rachel Parkinson is Little Feet Music</h2>
                            <h4>The early years</h4>
                            <p>Rachel Parkinson began playing drums in an all-girl band as a teenager.  That band toured Australia, reached number 15 in the Australian Alternative Charts, sold EPs in the USA, and performed about 200 shows.  Rachel then formed The Amazing Rachel Parkinson Band who supported The Animals on the Melbourne leg of their Australian tour.
                            </p>
                            <h4>Children’s Music</h4>
                            <p>In 2005 Rachel started playing and writing for children, formed Little Feet Music, which began as music and movement classes for children and their parent or carer, then branched out to include incursions in early learning centres, and now includes parties, workshops, community events and festivals and a live band.  At Little Feet Music the live shows are ALL LIVE!  Rachel has performed at shows, classes, workshops and parties about 1200 per year for the last 14 years.   There are over 8000 children who have attended weekly Little Feet Music classes.  Rachel has written over 200 songs, and has three amazing albums played by real musicians (no loops or samples here!), which have been played on Virgin, Qantas, Singapore Airlines, Air Vanuatu and Malaysia Airlines inflight entertainment and on ABC Kids Listen every day!</p>
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
