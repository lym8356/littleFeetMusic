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


</head>



<?php echo $this->element('header') ?>





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
                    <div class="col-md-6">
                        <div class="LFM-videolist">
                            <iframe width="650" height="400" src="https://www.youtube.com/embed/?listType=playlist&list=PL80_B4ZTs44k3im2h12Wt6bvzgKs9-20-" frameborder="0" allowfullscreen></iframe>


                        </div>
                    </div>

                        <div class="col-md-6">
                            <div class="LFM-description">
                                <p>Banjo! It's a song I wrote for the Sandringham Private Kinder Kids about their mascot called Banjo, a numbat who is a sustainability warrior!</p>

                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</section>

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
</body>
</html>