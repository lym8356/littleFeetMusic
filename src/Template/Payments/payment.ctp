<!DOCTYPE html>
<html>
<head>
    <title>Square Checkout</title>
    <meta name="description" content="An example of Square Checkout on Glitch">
    <link id="favicon" rel="icon" href="https://cdn.glitch.com/4c9bc573-ca4c-48de-8afe-501eddad0b79%2Fsquare-logo.svg?1521834224783" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<body>
    <div class="container">

    </div>
    <script>
        $(document).ready(function(){
            $.ajax({
                method : 'get',
                url: '<?php echo $redirectUrl; ?>',
                data: {},
                success: function(response){
                    $('.container').html(response);
                }
            });
        });
    </script>
</body>
</html>
