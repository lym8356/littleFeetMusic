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
    <?= $this->Html->css('News-and-Videos.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>

<body class = "text-dark">
<div class="headpic">
    <div class="container">
        <?php echo $this->Html->image('LFM.jpg'); ?>
    </div>
</div>

<section id="LFM-Shopping-cart">

    <div class="container">
        <div class="LFM-Shopping-cart" style="text-align: center">
            <div class="col-md mt-5 mb-5">
                    <h1>Shopping</h1>
                    <h2>Shopping Cart page is under construction!</h2>
            </div>
        </div>
    </div>
</section>
<section class="testimonial">
    <div class="container">
        <div class="row">
            <div class="text-center text-justify text-dark">
                <div class="col-sm-1"></div>
                <div class="col p-2 text-dark">
                    <p> <i>Hi Rachel, Zac and Bianca have both been singing various Little Feet music songs on and off all day….  is particularly stoked with Andy Pandy…. even told his Dad about it tonight! He keeps on saying Andy Pandy Sugar and Candy, then bursts out laughing, like it’s the funniest thing.</i></p>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </div>
</section>

</body>
</html>