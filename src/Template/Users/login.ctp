<br>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 mt-5">
        <?php echo $this->Flash->render('message'); ?>
        <?= $this->Form->create('',['type' => 'POST']) ?>
            <fieldset>
                <legend>Login</legend>
                <?php

                    echo $this->Form->control('username', ['required' => true,
                        'class' => 'form-control', 'label' => ['text' => 'Username']]);
                    echo $this->Form->control('password', ['required' => true, 'class' => 'form-control',
                        'label' => 'User Password']);
                    echo $this->Form->button('<i class="fa fa-user"></i> Login', ['class'=> 'btn btn-success btn-block mt-2']);
                ?>
<!--                <div class="form-group">-->
<!--                    <label>Email Address</label>-->
<!--                    <input type="email" class="form-control" placeholder="Enter Email">-->
<!--                </div>-->
<!--                <div class="form-group">-->
<!--                    <label>Password</label>-->
<!--                    <input type="password" class="form-control" placeholder="Password">-->
<!--                </div>-->
<!--                <button type="button" class="btn btn-success btn-block">Login</button>-->
            </fieldset>
        <?= $this->Form->end(); ?>
    </div>
</div>
