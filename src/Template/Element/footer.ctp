<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- custom css -->
    <?= $this->Html->css('Footer-with-button-logo.css') ?>
</head>

<body>
<section>
    <div class="content"></div>
    <footer id="myFooter">
        <div class="container">
            <div class="row align-items-center">
                <section>
                    <div class="col-sm-2">
                    <div class="logo"> <a class="footlogo" href="./Home">
                        <?php echo $this->Html->image('ftlogo.gif'); ?> </a></div>
                     </div>
                </section>
                <div class="col-sm-2"></div>
                <section>
                    <div class="col-sm-12 text-left"  >
                        <h5>Contact <?=$this->Html->link('Info', '/Login', ['escape' => false]); ?></h5>
                        <ul class="contact">
                            <li><a href="mailto:team117bluewater@gmail.com">team117bluewater@gmail.com</a></li>
                            <li>PH: <a href="tel:0410 600 060"> 0410 600 060 </a></li>
                        </ul>
                    </div>
                </section>
                <div class="col-sm-2"></div>
                <div class="social-networks">
                    <a href="https://twitter.com/intent/follow?source=followbutton&variant=1.0&screen_name=littlefeetmusic" class="twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/LittleFeetMusic/" class="facebook" target="_blank"><i class="fab fa-facebook-f"></i></a><br/>
                    <a href="https://open.spotify.com/artist/7HDv1OKuA3SSEJ0gybb3Y5" class="spotify" target="_blank"><i class="fab fa-spotify"></i></a>
                    <a href="https://www.youtube.com/user/LittleFeetMusic" class="youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                    <button  id="myBtn" onclick="topFunction()"><b>^</b></button>
                </div>
                </div>
        </div>
        <div class="footer-copyright">
            <p>© Copyright 2020</p>
        </div>
    </footer>
</section>

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
