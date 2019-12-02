<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- custom css -->
    <?= $this->Html->css('Footer-with-button-logo.css') ?>
</head>

<body>
<div class="content">
</div>
<footer id="myFooter">
    <div class="container">
        <div class="row">
            <div class="col-sm-2">
                <class="logo"><a href="#">
                    <?php echo $this->Html->image('ftLogo.gif'); ?> </a>
            </div>
            <div class="col-sm-3">
                <h5>Contact Info</h5>
                <ul class="contact">
                    <li><a href="#">info@littlefeetmusic.com.au</a></li>
                    <li>PH 0410 600 060</li>
                    <li>Parkdale VIC 3195</li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>About us</h5>
                <ul>
                    <li><a href="/">Company Information</a></li>
                    <li><a href="/Contact">Contact us</a></li>
                    <li><a href="#">Reviews</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Staff Portal</h5>
                <ul>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="fa fa-sign-in-alt"></i> Login', '/Login', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="fa fa-user-plus"></i> Sign Up', '/Signup', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                </ul>
            </div>
            <div class="col-sm-2">
                <div class="social-networks">
                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© Copyright Text </p>
    </div>
</footer>

</body>

</html>
