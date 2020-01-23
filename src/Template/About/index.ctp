<?php
/**


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
    <?php echo $this->element('header') ?>


</head>
<body class="text-dark">

    <div class= "text-dark">
        <div class="headpic">
            <div class="container">
                <?php echo $this->Html->image('LFM.jpg'); ?>
            </div>
        </div>
    </div>
    <section>
        <div class="container mt-3">
            <div class="col-sm" style="background-color: #CCE8E0">
                <div class="row">
                    <div class="col-sm text-justify" id="left-col">
                        <?php foreach ($about as $ab)
                        {
                        ?>
                            <h2><?php echo $ab->heading ?></h2>
                            <h4><?php echo $ab->title ;?></h4>
                            <p><?php echo $ab->body ?></p>
                            <h4><?php echo $ab->title2 ;?></h4>
                            <p><?php echo $ab->body2 ?></p>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col-sm mb-4" id="right-col">
                        <div class="container mt-3"><span id="clsimage"><?php echo $this->Html->image('cls-baby.jpg'); ?></span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial">
        <div class="container">
            <div class="row text-center text-justify text-dark">
                <div class="col-sm-1"></div>
                <div class="col">
                    <p class="text-center text-dark p-3"> <i>So much fun - all the kids love the music and singing by Rachel!
                    Get around this everyone!!!! This woman is awesome!!!</i></p>
                </div>
                <div class="col-sm-1"></div>
            </div>
        </div>
    </section>
</body>
</html>