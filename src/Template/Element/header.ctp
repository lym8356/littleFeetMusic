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
        <?= $this->fetch('title') ?>
    </title>
</head>

<body>
<header>

    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="#"> <?php echo $this->Html->image('Logo.gif'); ?></a>
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
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fas fa-graduation-cap"></i> Enroll<span class="sr-only">(current)</span>', '/Class/Enrol', ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fas fa-chalkboard-teacher"></i> Class<span class="sr-only">(current)</span>', '/Class', ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fas fa-birthday-cake"></i> Book us<span class="sr-only">(current)</span>', '/Event', ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fas fa-shopping-cart"></i> Shop<span class="sr-only">(current)</span>', '/Shopping', ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fas fa-photo-video"></i> News & Videos<span class="sr-only">(current)</span>', '/Media', ['class' => 'nav-link', 'escape' => false]); ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('<i class="fas fa-phone-alt"></i> Contact us<span class="sr-only">(current)</span>', '/Contact', ['class' => 'nav-link', 'escape' => false]); ?>
                </li>

            </ul>

            <ul class="navbar-nav">
                <ul class="navbar-nav">
<!--                <li class="nav-item"><i class="fas fa-envelope-square"></i></li>-->
<!--                <li class="nav-item"><i class="fas fa-phone-square"></i></li>-->
                </ul>
            </ul>
            </ul>
        </div>
    </nav>

</header>
<SCRIPT>
    $(document).ready(function() {
        $('li.active').removeClass('active');
        $('a[href="' + location.pathname + '"]').closest('li').addClass('active');
    });
</SCRIPT>
</body>
</html>
