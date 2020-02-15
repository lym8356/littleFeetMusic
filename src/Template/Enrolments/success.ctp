<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
</head>
<body>
<div>

</div>
<div class="jumbotron text-center mt-4">
    <h1 class="display-3">Thank You!</h1>
    <p class="lead"><strong>An email</strong> has been sent to your email address.</p>
    <hr>
    <p>
        Having trouble? <?php echo $this->Html->link('Contact us', array('controller' => 'Contact', 'action' => 'index'))?>
    </p>
    <p>
        Want to enrol in another class? <?php echo $this->Html->link('Enrol', array('controller' => 'Term', 'action' => 'enrol_info'))?>
    </p>
    <p class="lead">
        <?php echo $this->Html->link('Continue to homepage', array('controller' => 'Home', 'action' => 'index'))?>
    </p>
</div>
</body>
</html>
