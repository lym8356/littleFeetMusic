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
                <class="logo"> <a class="footlogo" href="./Home">
                    <?php echo $this->Html->image('ftLogo.gif'); ?> </a>
            </div>
            <div class="col-sm-2"></div>
            <div class="col-sm-4">
                <h5>Contact <?=$this->Html->link('Info', '/Login', ['escape' => false]); ?></h5>
                <ul class="contact">
                    <li><a href="mailto:team117bluewater@gmail.com">info@littlefeetmusic.com.au</a></li>
                    <li>PH: <a href="tel:0410 600 060"> 0410600060 </a></li>
                </ul>
            </div>
            <div class="col-sm-4">
                <div class="social-networks">
                    <a href="https://twitter.com/intent/follow?source=followbutton&variant=1.0&screen_name=littlefeetmusic" target="_blank" class="twitter"><i class="fab fa-twitter mb-2"></i></a>
                    <a href="https://www.facebook.com/LittleFeetMusic/" target="_blank" class="facebook"><i class="fab fa-facebook-f mb-2"></i></a><br/>
                    <a href="https://open.spotify.com/artist/7HDv1OKuA3SSEJ0gybb3Y5" target="_blank" class="spotify"><i class="fab fa-spotify"></i></a>
                    <a href="https://www.youtube.com/user/LittleFeetMusic" target="_blank" class="youtube"><i class="fab fa-youtube"></i></a>
                    <button  id="myBtn" onclick="topFunction()"><b>^</b></button>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <p>© Copyright 2020</p>
    </div>
</footer>
<script>
//Get the button
var mybutton = document.getElementById("myBtn");


// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari scroll to top
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera scroll to top
}
</script>

</body>

</html>
