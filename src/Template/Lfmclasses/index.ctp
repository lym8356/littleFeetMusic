<<<<<<< HEAD
=======
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lfmclass[]|\Cake\Collection\CollectionInterface $lfmclasses
 */
?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style type="text/css">
    img {
        width: 100%;
        height: auto;
    }
    .testimonial {
        margin: 40px;
       background-color: #CCE8E0;

    }
    .testimonial h1{
        text-align: center;
        font-weight: bold;
        color: #808080;
        padding-bottom: 10px;
        text-transform: uppercase;
    }
    .testimonial.row{
        margin-top: 30px;
    }
    .testimonial-info{
        padding: 10px 10px;
        background-color: #EFEFEF;
    }
    blockquote{
        font-size:20px;
        line-height: 30px;
    }
    blockquote::before{
        content: open-quote;
        font-size: 50px;
        position: relative;
        color:#fdbc5e;
        line-height: 20px;
        bottom:-15px;
        right: 130px;
    }
    blockquote:after {
        content: close-quote;
        font-size: 50px;
        position: relative;
        color:#fdbc5e;
        line-height: 20px;
        bottom:-15px;
        left:130px;

    }
    .sb{
        margin:40px auto;
    }
</style>

<div class="container">

    <section>
        <div class=" container">
            <div class="img-fluid">
                <?php echo $this->Html->image('LFM.jpg'); ?>
            </div>
        </div>
    </section>

    <section>

        <div class="container">
            <h1>Just Random texts about all classes</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tincidunt augue interdum velit euismod in. Massa id neque aliquam vestibulum. Neque volutpat ac tincidunt vitae semper. Eget duis at tellus at urna. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Vulputate ut pharetra sit amet aliquam. Quam lacus suspendisse faucibus interdum posuere. Convallis aenean et tortor at risus viverra adipiscing. Porttitor lacus luctus accumsan tortor posuere ac. Vulputate sapien nec sagittis aliquam malesuada bibendum. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra. At urna condimentum mattis pellentesque id nibh tortor id. Tellus cras adipiscing enim eu turpis egestas pretium aenean. Lectus magna fringilla urna porttitor rhoncus dolor purus. Eros in cursus turpis massa tincidunt dui ut ornare. Est pellentesque elit ullamcorper dignissim. Urna id volutpat lacus laoreet non curabitur gravida arcu.</p>

            <p>Morbi tristique senectus et netus et malesuada fames. Neque convallis a cras semper. Purus in mollis nunc sed id semper. Lectus mauris ultrices eros in cursus turpis massa. Sit amet consectetur adipiscing elit. Nulla at volutpat diam ut venenatis tellus in. Amet tellus cras adipiscing enim. Maecenas pharetra convallis posuere morbi leo. Aliquam id diam maecenas ultricies mi. Enim eu turpis egestas pretium aenean pharetra. Ipsum dolor sit amet consectetur adipiscing. Pulvinar elementum integer enim neque volutpat ac tincidunt vitae semper. Pretium vulputate sapien nec sagittis aliquam malesuada.</p>

            <p>Euismod nisi porta lorem mollis aliquam ut porttitor leo. Enim praesent elementum facilisis leo vel fringilla. In hendrerit gravida rutrum quisque. Risus sed vulputate odio ut. Accumsan in nisl nisi scelerisque eu. Dictum non consectetur a erat nam. Vestibulum morbi blandit cursus risus at. Est velit egestas dui id ornare arcu. Vitae justo eget magna fermentum. Tortor dignissim convallis aenean et. Egestas fringilla phasellus faucibus scelerisque eleifend.</p>

            <p>Maecenas sed enim ut sem viverra aliquet eget. Vitae congue mauris rhoncus aenean vel elit. Feugiat scelerisque varius morbi enim nunc. Suspendisse interdum consectetur libero id faucibus nisl tincidunt eget nullam. Duis convallis convallis tellus id interdum velit laoreet. Nullam eget felis eget nunc lobortis mattis aliquam faucibus. Ut enim blandit volutpat maecenas volutpat. Orci nulla pellentesque dignissim enim sit amet venenatis urna cursus. Ut consequat semper viverra nam libero justo laoreet sit amet. Pellentesque elit eget gravida cum sociis. Magna eget est lorem ipsum. Cursus metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Sollicitudin nibh sit amet commodo nulla facilisi. Habitant morbi tristique senectus et netus et.</p>

            <p>Netus et malesuada fames ac turpis egestas sed tempus urna. Tempor nec feugiat nisl pretium fusce id velit ut tortor. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Nunc consequat interdum varius sit amet mattis. Volutpat blandit aliquam etiam erat velit scelerisque in dictum. Adipiscing elit ut aliquam purus. Potenti nullam ac tortor vitae purus faucibus. Massa id neque aliquam vestibulum morbi blandit cursus risus. Nulla pellentesque dignissim enim sit amet venenatis. Ac tortor vitae purus faucibus ornare. Lectus nulla at volutpat diam. Viverra tellus in hac habitasse. Turpis massa sed elementum tempus egestas sed sed. Mattis rhoncus urna neque viverra justo nec ultrices dui.</p>
        </div>
    </section>
    <br><br><br>
    <section>
        <div class="row container">
            <div class="col-sm-3" id="left-col">
                <div class="row ">
                    <div class="col-sm">
                        <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn1" value="1" onclick="viewClass()"> 0-1 years</button></div>
                    <div class="col-sm">
                        <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn2" value="1" onclick="viewClass1()"> 1-2 years</button></div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn3" value="1" onclick="viewClass2()"> 2-3 years</button></div>
                    <div class="col-sm">
                        <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn4" value="1" onclick="viewClass3()"> 3-4 years</button></div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn5" value="1" onclick="viewClass4()"> 4-5 years</button></div>
                    <div class="col-sm">

                    </div>
                </div>
            </div>
            <div class="col-sm" id="right-col" style="background-color: #CCE8E0">
                <div class="row">
                    <div class="col-sm">
                        <span id="specifyClass">
                            <h2>Generic text about classes</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tincidunt augue interdum velit euismod in. Massa id neque aliquam vestibulum. Neque volutpat ac tincidunt vitae semper. Eget duis at tellus at urna. Non diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Vulputate ut pharetra sit amet aliquam. Quam lacus suspendisse faucibus interdum posuere. Convallis aenean et tortor at risus viverra adipiscing. Porttitor lacus luctus accumsan tortor posuere ac. Vulputate sapien nec sagittis aliquam malesuada bibendum. Lobortis scelerisque fermentum dui faucibus in ornare quam viverra. At urna condimentum mattis pellentesque id nibh tortor id. Tellus cras adipiscing enim eu turpis egestas pretium aenean. Lectus magna fringilla urna porttitor rhoncus dolor purus. Eros in cursus turpis massa tincidunt dui ut ornare. Est pellentesque elit ullamcorper dignissim. Urna id volutpat lacus laoreet non curabitur gravida arcu.</p>
                        </span>
                    </div>
                    <div class="col-sm">
<!--                        <div class="container mt-3"><?php echo $this->Html->image('cls2.jpg'); ?></div> -->
                        <div class="container mt-3"><span id="clsimage"><?php echo $this->Html->image('cls2.jpg'); ?></span></div>
                        <div class="mr-5 p-5 ">
                            <a href="#" class="btn btn-warning btn-lg" >Enroll</a>
                            <a href="#" class="btn btn-warning btn-lg">Enquiry</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="testimonial">
        <div class="container">
            <h1>Testimonial</h1>
            <p class="text-center"> from our customers</p>
        <div class="row">
            <div class="col-md-4 text-center sb ">
               <div class="testimonial-info">
               <blockquote>
                   <p> My kid enjoyed the class.</p>
               </blockquote>
               <h5> -John Smith</h5>
               <h7>Little Feet Music Parent</h7>
               </div>
           </div>
            <div class="col-md-4 text-center sb">
                <div class="testimonial-info">
                    <blockquote>
                        <p> My child likes the class so much.</p>
                    </blockquote>
                    <h5> -Paul Frank</h5>
                    <h7>Little Feet Music Parent</h7>
                </div>
            </div>
            <div class="col-md-4 text-center sb">
                <div class="testimonial-info">
                    <blockquote>
                        <p> Really nice class and teacher.</p>
                    </blockquote>
                    <h5> -Sarah Jane</h5>
                    <h7>Little Feet Music Parent</h7>
                </div>
            </div>

        </div>
        </div>
    </section>
    <script type="text/javascript">
        function viewClass(){
            var a = document.getElementById("btn1").value;
            if (a=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 0-1 </h2><p>Morbi tristique senectus et netus et malesuada fames. Neque convallis a cras semper. Purus in mollis nunc sed id semper. Lectus mauris ultrices eros in cursus turpis massa. Sit amet consectetur adipiscing elit. Nulla at volutpat diam ut venenatis tellus in. Amet tellus cras adipiscing enim. Maecenas pharetra convallis posuere morbi leo. Aliquam id diam maecenas ultricies mi. Enim eu turpis egestas pretium aenean pharetra. Ipsum dolor sit amet consectetur adipiscing. Pulvinar elementum integer enim neque volutpat ac tincidunt vitae semper. Pretium vulputate sapien nec sagittis aliquam malesuada.</p>";
                //document.getElementById("clsimage").innerHTML = "<?php echo $this->Html->image('cls-baby.jpg'); ?>";
            }
        }

        function viewClass1() {
            var b = document.getElementById("btn2").value;
            if (b=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 1-2 </h2><p>Euismod nisi porta lorem mollis aliquam ut porttitor leo. Enim praesent elementum facilisis leo vel fringilla. In hendrerit gravida rutrum quisque. Risus sed vulputate odio ut. Accumsan in nisl nisi scelerisque eu. Dictum non consectetur a erat nam. Vestibulum morbi blandit cursus risus at. Est velit egestas dui id ornare arcu. Vitae justo eget magna fermentum. Tortor dignissim convallis aenean et. Egestas fringilla phasellus faucibus scelerisque eleifend.</p>";
            }
        }
        function viewClass2(){
            var c = document.getElementById("btn3").value;
            if (c=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 2-3 </h2><p>Maecenas sed enim ut sem viverra aliquet eget. Vitae congue mauris rhoncus aenean vel elit. Feugiat scelerisque varius morbi enim nunc. Suspendisse interdum consectetur libero id faucibus nisl tincidunt eget nullam. Duis convallis convallis tellus id interdum velit laoreet. Nullam eget felis eget nunc lobortis mattis aliquam faucibus. Ut enim blandit volutpat maecenas volutpat. Orci nulla pellentesque dignissim enim sit amet venenatis urna cursus. Ut consequat semper viverra nam libero justo laoreet sit amet. Pellentesque elit eget gravida cum sociis. Magna eget est lorem ipsum. Cursus metus aliquam eleifend mi in nulla posuere sollicitudin aliquam. Sollicitudin nibh sit amet commodo nulla facilisi. Habitant morbi tristique senectus et netus et.</p>";
            }
        }
        function viewClass3(){
            var d = document.getElementById("btn4").value;
            if (d=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 3-4 </h2><p>Netus et malesuada fames ac turpis egestas sed tempus urna. Tempor nec feugiat nisl pretium fusce id velit ut tortor. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Nunc consequat interdum varius sit amet mattis. Volutpat blandit aliquam etiam erat velit scelerisque in dictum. Adipiscing elit ut aliquam purus. Potenti nullam ac tortor vitae purus faucibus. Massa id neque aliquam vestibulum morbi blandit cursus risus. Nulla pellentesque dignissim enim sit amet venenatis. Ac tortor vitae purus faucibus ornare. Lectus nulla at volutpat diam. Viverra tellus in hac habitasse. Turpis massa sed elementum tempus egestas sed sed. Mattis rhoncus urna neque viverra justo nec ultrices dui.</p>";
            }
        }
        function viewClass4(){
            var e = document.getElementById("btn5").value;
            if (e=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about class of age group 4-5 </h2>";
            }
        }
        function viewClass5(){
            var f = document.getElementById("btn6").value;
            if (f=="1"){
                document.getElementById("specifyClass").innerHTML= "<h2>Text about family CLass</h2>";
            }
        }

    </script>

    <div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </div>
</div>

>>>>>>> 7e3f08ea3adacd7c8bfa9d9bc811d9bd43da9a08
