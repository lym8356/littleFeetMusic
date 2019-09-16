<!-- Navigation -->

<!--<li>--><?php //echo $this->Html->link('Home',['controller'=>'index','action'=>'index'],['class'=>'','escape'=>false]);?><!--</li>-->
<!--<li>--><?php //echo $this->Html->link('Services',['controller'=>'index','action'=>'index'],['class'=>'','escape'=>false]);?><!--</li>-->
<!--<li>--><?php //echo $this->Html->link('Advertisement',['controller'=>'teachers','action'=>'index'],['class'=>'','escape'=>false]);?><!--</li>-->
<!--<li>--><?php //echo $this->Html->link('Browse Tutors',['controller'=>'teachers','action'=>'index'],['class'=>'','escape'=>false]);?><!--</li>-->
<!--<li>--><?php //echo $this->Html->link('Students',['controller'=>'teachers','action'=>'index'],['class'=>'','escape'=>false]);?><!--</li>-->
<!--<li>--><?php //echo $this->Html->link('Blog',['controller'=>'teachers','action'=>'index'],['class'=>'','escape'=>false]);?><!--</li>-->
<!--<li>--><?php //echo $this->Html->link('register / login',['controller'=>'Users','action'=>'registration'],['class'=>'','escape'=>false]);?><!--</li>-->

<html>
<?php
$cakeDescription = 'User Panel';
?>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $title ?>
    </title>
</head>

<body>
<header>
    <div class="header py-1 fixed-top bg-light" style="margin-top: 56px">
        <ul class="nav justify-content-end">
            <li class="nav-item"><i class="fas fa-envelope-square"></i>&nbsp;info@littlefeetmusic.com.au &nbsp;&nbsp;
            </li>
            <li class="nav-item"><i class="fas fa-phone-square"></i>&nbsp;0410 600 060&nbsp;</li>
        </ul>
    </div>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">LOGO</a>
        <button class="navbar-toggler" type="button"
                data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?= $this->Url->
        build(['controller' => 'Booking', 'action' => 'view']) ?>">User Panel</a>
        <div class="collpse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="true" aria-expanded="false">Action</a>
                    <div class="dropdown-menu">
                        <?= $this->Html->link('<i class="fas fa-plus-circle"></i> &nbsp; Book A New Class', '/', ['class' => 'dropdown-item', 'escape' => false]); ?>
                        <?= $this->Html->link('<i class="fas fa-edit"></i> &nbsp; Edit A Booking', '/', ['class' => 'dropdown-item', 'escape' => false]); ?>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa fa-user"></i> Profile', '/User/Profile',
                        ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fa fa-sign-out-alt"></i> Logout', '/Logout',
                        ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
</body>
</html>
