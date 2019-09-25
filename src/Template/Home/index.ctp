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
<html>
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
    <?= $this->Html->css('global-style.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>


</head>


<body>

<?php echo $this->element('header') ?>
<?php echo $this->Html->image('LFM.jpg'); ?>

<?= $this->Flash->render() ?>
<?= $this->fetch('content') ?>


<div class="container">
    <h4>-Customer comment:
    </h4>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="testimonial text-center">
                <div class="testimonial-body">
                    <p>My kid enjoyed the class and had a good time with children in his own age.</p>
                    <div class="testimonial-info-1">- John Smith</div>
                    <div class="testimonial-info-2">Little Feet Music Parent</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial text-center">
                <div class="testimonial-body">
                    <p> Kids had fun in the class.</p>
                    <div class="testimonial-info-1">- Sarah Jane</div>
                    <div class="testimonial-info-2">Little Feet Music Parent</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="testimonial text-center">
                <div class="testimonial-body">
                    <p> Nice class and nice teacher.</p>
                    <div class="testimonial-info-1">- Paul Frank</div>
                    <div class="testimonial-info-2">Little Feet Music Parent</div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
