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
<body>

    <div class="headpic">
        <div class="container">
            <?php echo $this->Html->image('LFM.jpg'); ?>
        </div>
    </div>
    <div class="container  text-dark" >
        <h4>Hello!  Welcome to Little Feet Music!</h4>
        <li>Rachel Parkinson started Little Feet Music as preschool music and movement classes in 2005 at Gasworks Arts Park in Albert Park.</li>
        <li>There are around 300 children who do weekly Little Feet Music classes</li>
        <li>The Little Feet Music program is a 5-year program.  It's a sequential program, however children can join at anytime. </li>
        <li>In 2011, the first Little Feet Music album was released, with 24 of Rachel's original songs, recorded at Pony Music, along with Damien Young, Mark Kennedy and a bunch of amazing Australian musicians, then mastered at Studios 301, Sydney.</li>
        <li>In 2014, the second Little Feet Music album was released - it has 19 original tracks.</li>
        <li>In February and March 2015, Virgin Airlines included four Little Feet Music tracks on their inflight entertainment.</li>
        <li>Since January 2015, Qantas has been playing the whole Little Feet Music album, Giggle & Jiggle on their inflight entertainment.</li>
        <li>In 2016, Singpore Airlines is playing the whole Little Feet Music album, Jump Around on their inflight entertainent.</li>
        <li>The Little Feet Music band has played at every St Kilda Festival since 2011, has played at Moomba, Queenscliff Music Festival, Sydney Road Street Party, Ripponlea Estate Teddy Bears' Picnic, festivals in Pascoe Vale, Cranbourne, Birregurra and a bunch of sold-out shows at Gasworks Arts Park.  Rachel has done about a gazillion solo Little Feet Music shows.</li>
        <li>Album number three is due for release in 2016 (we're nearly finished it!)</li>
        <li>Excitingly, in January 2017, Rachel will be heading to Nashville in the USA to record the fourth album!</li>
        <a href="./Enrolments" class="btn btn-warning btn-lg" >Enrol</a>
    </div>

