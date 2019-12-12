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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="LFM-about-us-area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="LFM-about-us-left">
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
                                <a href="/Class/EnrolInfo" class="btn btn-warning btn-lg" >Enroll</a>
                                <button id="enquiry" class="btn btn-warning btn-lg">Enquiry</button>

                            </div>
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
