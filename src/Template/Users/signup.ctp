<br>
<div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 mt-5">
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
                echo $this->Form->controls(
                    [
                        'name' => ['required' => false, 'placeholder' => 'Enter Full Name',
                            'label' => ['class' => 'is-invalid', 'text' => 'User Full Name']],
                        'username' => ['required' => false, 'placeholder' => 'Enter Username',
                            'label' => ['class' => 'is-invalid','text' => 'Userame']],
                        'email' => ['required' => false, 'placeholder' => 'Enter Email',
                            'label' => ['class' => 'form-control-label','text' => 'Email']],
                        'password' => ['type' => 'password','required' => false, 'placeholder' => 'Enter Password',
                            'label' => ['class' => 'form-control-label']],
                        'confirm_password' => ['type' => 'password','required' => false, 'placeholder' => 'Confirm Password',
                            'label' => ['class' => 'form-control-label']],
                        'phone' => ['required' => false, 'placeholder' => 'Enter Phone Number',
                            'label' => ['class' => 'form-control-label']],
                        'zipcode' => ['required' => false, 'placeholder' => 'Enter Zipcode',
                            'label' => ['class' => 'form-control-label']],
                        'birthday' => ['required' => false, 'placeholder' => 'Enter Birthday',
                            'label' => ['class' => 'form-control-label']],

                    ],
                    ['legend' => 'Sign Up']
                );
                echo $this->Form->button('<i class="fa fa-user-plus"></i> Sign Up', ['class'=> 'btn btn-success btn-block mt-2']);
                echo $this->Form->end();
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

    </div>
</div>
