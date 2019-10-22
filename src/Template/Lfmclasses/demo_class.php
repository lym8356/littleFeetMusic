<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<section>
    <div class="row container">
        <div class="p-3 ml-4">
            <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn1" value="1" onclick="viewClass()"> 0-1 years</button></div>
        <div class="p-3">
            <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn2" value="1" onclick="viewClass1()"> 1-2 years</button></div>
        <div class="p-3">
            <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn3" value="1" onclick="viewClass2()"> 2-3 years</button></div>
        <div class="p-3">
            <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn4" value="1" onclick="viewClass3()"> 3-4 years</button></div>
        <div class="p-3">
            <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn5" value="1" onclick="viewClass4()"> 4-5 years</button></div>
        <div class="p-3">
            <button class="btn btn-outline-success btn-block btn-lg p-4 mt-3" id="btn6"> Family Class</button></div>
        </div>           
    </div>
</section>
<br><br><br>
<section>
    <div class="container">
        <div class="col-sm" id="right-col" style="background-color: #CCE8E0">
            <div class="row">
                <div class="col-sm">
                    <span id="specifyClass">
                        <h2>Text bout Family CLass</h2>
                        <p>Fun, cool, creative and interactive music classes for kids aged six months to five years!

                            Rachel Parkinson has been running children's music programs for over fifteen years, so has a plethora of experience with children and with music!

                            Rachel completed a Preschool Music Teacher Training Course (Level 1) through the Kodaly Music Education Institute of Australia in 2006 and is a full writer member of the Australasian Performing Right Association (APRA).  Rachel has also been a member of the Australian Recording Industry Association (ARIA) since 2011.

                            Rachel is continually updating her skills by attending workshops and courses.  She's been involved in the entertainment industry since the early 90s, having played drums, guitar and sung in original touring pub and club bands from the tender age of 16.
                        </p>
                    </span>
                    <div class="mr-5 p-5 ">
                        <a href="#" class="btn btn-warning btn-lg" >Enroll</a>
                        <a href="#" class="btn btn-warning btn-lg">Enquiry</a>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="container mt-3"><?php echo $this->Html->image('cls-baby.jpg'); ?></div>
                </div>
            </div>
        </div>
    </div>
</section>
