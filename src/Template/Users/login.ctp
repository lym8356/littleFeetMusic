<section>
    <div class="row m-5" style="z-index: 1">
    <div class="col-lg-4"></div>
    <div class="col-lg-4 p-3">

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

        echo $this->Form->create($login);
        echo $this->Form->controls(
            [
                'email' => ['required' => true, 'placeholder' => 'Enter Email'],
                'password' => ['required' => true, 'placeholder' => 'Enter password']
            ],
            ['legend' => 'Login']
        );
//        echo $this->Html->link(' Forgot my Password<span class="sr-only">(current)</span>', '/Users/forgot_password',
//            ['class' => 'nav-link', 'escape' => false]);
        echo $this->Form->button('<i class="fa fa-user"></i> Login',
            ['class'=> 'btn btn-success btn-block mt-2']);
        echo $this->Form->end();

        ?>
    </div>
    <div class="col-lg-4"></div>

</div>


</section>
