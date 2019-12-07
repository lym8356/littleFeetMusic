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
                <class="logo"> <a class="footlogo" href="/">
                    <?php echo $this->Html->image('ftLogo.gif'); ?> </a>
            </div>
            <div class="col-sm-3">
                <h5>Contact Info</h5>
                <ul class="contact">
                    <li><a href="mailto:info@littlefeetmusic.com.au">info@littlefeetmusic.com.au</a></li>
                    <li>PH 0410 600 060</li>
                    <li>Parkdale VIC 3195</li>
                </ul>
            </div>
            <div class="col-sm-2">
                <h5>About us</h5>
                <ul>
                    <li><a href="/">About us</a></li>
                    <li><a href="/Contact">Contact us</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
            </div>
            <div class="col-sm-3">
                <h5>Staff Portal</h5>
                <ul>
                    <li class="nav-item">
                        <?= $this->Html->link('<i class="fa fa-sign-in-alt"></i> Login', '/Login', ['class' => 'nav-link', 'escape' => false]); ?>
                    </li>
                </ul>
            </div>
            <div class="col-sm-2">
                <div class="social-networks">
                    <a href="https://twitter.com/intent/follow?source=followbutton&variant=1.0&screen_name=littlefeetmusic" class="twitter"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/LittleFeetMusic/" class="facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://open.spotify.com/artist/7HDv1OKuA3SSEJ0gybb3Y5" class="spotify"><i class="fab fa-spotify"></i></a>
                    <a href="https://www.youtube.com/user/LittleFeetMusic" class="youtube"><i class="fab fa-youtube"></i></a>
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
