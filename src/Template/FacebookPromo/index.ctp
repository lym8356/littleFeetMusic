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
    <?= $this->Html->css('ChildrensMusicClassesMelbourne.css') ?>

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
<div class="container">
    <section id="LFM-about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="LFM-about-us-area">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="LFM-about-us-left">
                                    <?php echo $this->Html->image('Hidden2.jpg'); ?>
                                    <?php echo $this->Html->image('Hidden3.jpg'); ?>


                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="LFM-about-us-right text-dark">
                                    <h1>Little Feet Music Classes</h1>
                                    <h4><p>Amazingly Fun Music and Movement Classes for Babies, Toddlers and Preschoolers!</p>
                                        <p>At Little Feet Music the music is all LIVE!</p></h4>
                                    <h6>Or call  <a href="tel:03 9587 1216">03 9587 1216</a>  to enrol over the phone!</h6>
                                    <ul>
                                        <li><a href="./Class/EnrolInfo">Albert Park</a></li>
                                        <li>Beaumaris</li>
                                        <li>Black Rock</li>
                                    </ul>
                                    <p>Use the code PROMO30YES at the checkout to get a
                                        30% discount
                                        on any Full-Priced Term 4 Black Rock or Beaumaris class!
                                    </p>
                                    <p>*Conditions apply!</p>
                                    <a href="./Class/EnrolInfo" class="btn btn-warning btn-lg" >Enrol online now!</a>
                                    <p>Little Feet Music helps children to develop skills such as strengthened self image and self assurance, improved concentration and listening skills, as well as offering lots of opportunities for social interaction.
                                    </p>
                                    <p>Vibrant, interactive and live music and movement classes for children 6 months to 5 years in Albert Park, Beaumaris and Black Rock. The music is ALL LIVE, fun and entertaining, and run by Little Feet Music, Rachel Parkinson.
                                    </p>
                                    <p>Children play percussion instruments; there are colourful puppets and props, and in the 4-5 year old program children learn to read music and play chime bars. Children in all age groups are invited to perform at the end of year concert!
                                    </p>
                                    <p>Term 4 classes run from Tues, 9 October to Friday, 14 December.</p>
                                    <p>Term fee includes a Little Feet Music song book with lots of the songs and activites from the classes.  There's a new book every term!
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    </seciton>
</div>

</body>
