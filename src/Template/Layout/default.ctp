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

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collpse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <?= $this->Html->link('<i class="fa fa-home"></i> Home<span class="sr-only">(current)</span>', '/', ['class' => 'nav-link', 'escape' => false]); ?>
<!--                    <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>-->
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa fa-sign-in-alt"></i> Login', '/Login', ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa fa-user-plus"></i> Sign Up', '/Signup', ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
            </ul>
        </div>
    </nav>

    <?= $this->Flash->render() ?>

    <?= $this->fetch('content') ?>

    <?php echo $this->element('footer') ?>
</body>
</html>
