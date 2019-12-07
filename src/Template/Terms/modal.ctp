<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <div class="modal-header">
        <h6 id="header-title"><strong>Are You A Returning Customer ?</strong></h6>
        <button type="button" data-dismiss="modal" class="close">&times;</button>
    </div>
    <div class="modal-body">
        <div class="container row">
            <div class="col-md-6">
                <button class="btn btn-primary" id="enrolNew">New <br> Customer</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-info" id="enrolRet">Returning Customer</button>
            </div>
        </div>
    </div>
    <div class="modal-footer">

    </div>
</body>
<script>
    $('.close').click(function () {
        location.reload();
    });

    $('#enrolNew').click(function (e) {

        e.preventDefault();
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'signup']); ?>",
            data: {},
            success: function (response) {
                $('.modal-body').html(response);
            }
        });
    });

    $('#enrolRet').click(function (e) {
        e.preventDefault();
        $('#header-title').html('<h5>Login</h5>');
        $.ajax({
            method: 'get',
            url: "<?php echo $this->Url->build(['controller' => 'Users', 'action' => 'login']); ?>",
            data: {term_id},
            success: function (response) {
                let m_content = $(response).filter("#login_content");
                let m_footer_btn = $(response).filter("#login_btn");
                $('.modal-body').html(m_content);
                $('.modal-footer').html(m_footer_btn);
            }
        });
    });
</script>
</html>
