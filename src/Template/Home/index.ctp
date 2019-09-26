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

<div class="container">
    <div class="row">
        <div class="img-responsive pt-5 pb-4">
            <?php echo $this->Html->image('LFM.jpg'); ?>
        </div>
    </div>
</div>





<div class="flex-container">

    <div class="box">
        <h5>Little Feet Music</h5>
        <p>Little Feet Music is fun educational music and entertainment for your little ones.</p>
        <p>Rachel Parkinson runs Little Feet Music - amazingly fun and engaging music and movement classes for babies, toddlers and preschoolers.  Rachel knows HUNDREDS of songs, so it never gets boring!</p>

        <a href="Enroll" class="btn EnrollBtn" >Enroll</a>
        <a href="FreeTrial" class="btn TrailBtn">Book a free trial</a>
    </div>

    <div class="box2">


    </div>
</div>



<div class="clearfix">

    <div class="testimonial">
        <div class="testimonial-info">
            <blockquote>
                <p> "My kid enjoyed the class."</p>
            </blockquote>
            <p>   -John Smith</p>
            <p>Little Feet Music Parent</p>
        </div>
    </div>

    <div class="testimonial">
        <div class="testimonial-info">
            <p> "Kids had fun in the class."</p>
            <p>   -Sarah Jane</p>
            <p>Little Feet Music Parent</p>
        </div>
    </div>

    <div class="testimonial">
        <div class="testimonial-info">
            <p> "Nice class and nice teacher."</p>
            <p>   -Paul Frank</p>
            <p>Little Feet Music Parent</p>
        </div>
    </div>

</div>
<div class="sub-footer">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-8">
                    Discover our classes and find more!
                </div>
                <div class="col-sm-4">
                    <p class="mt-10"><a href="GetClassInfo" class="classbtn">Class Info Here<i class="fa fa-arrow-right pl-20"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="imgbox">
    <?php echo $this->Html->image('ft.png'); ?>
</div>


</body>
</html>
