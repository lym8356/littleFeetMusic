<br>
<div class="row">
    <div class="col-lg-6">
        <?php
        echo $this->Flash->render('message');
        $this->Form->setTemplates([
            'inputContainer' => '<div class="form-group{{required}}">
                        {{content}} <span class="help">{{help}}</span></div>',
            'input' => '<input type="{{type}}" name="{{name}}"
                        class="form-control form-control-danger" {{attrs}}/>',
            'inputContainerError' => '<div class="form-group has has-danger
                    {{type}}{{required}} error">{{content}}{{error}}</div>',
            'error' => '<div class="text-danger">{{content}}</div>'
        ]);
        echo $this->Form->create($sign_up);
        echo $this->Form->control('name',['required' => false, 'placeholder' => 'Enter Full Name',
                    'class' => 'is-invalid', 'text' => 'User Full Name']);
        echo $this->Form->control('username',['required' => false, 'placeholder' => 'Enter Username',
                    'class' => 'is-invalid', 'text' => 'Username']);
        echo $this->Form->control('password',['required' => false, 'placeholder' => 'Enter Password',
                    'type' => 'password', 'class' => 'form-control-label']);
        echo $this->Form->control('confirm_password',['required' => false, 'placeholder' => 'Confirm Password',
                    'type' => 'password', 'class' => 'form-control-label']);
        ?>
    </div>
    <div class="col-lg-6 mb-3">
        <?php
        echo $this->Form->control('phone',['required' => false, 'placeholder' => 'Enter Phone Number',
            'class' => 'form-control-label']);
        echo $this->Form->control('email',['required' => false, 'placeholder' => 'Enter Email',
            'class' => 'form-control-label']);
        echo $this->Form->control('postcode',['required' => false, 'placeholder' => 'Enter Postcode',
            'class' => 'form-control-label']);
        echo $this->Form->button('<i class="fa fa-user-plus"></i> Sign Up',
            ['class'=> 'btn btn-success btn-block ']);
        echo $this->Form->end();
        ?>
    </div>
</div>
