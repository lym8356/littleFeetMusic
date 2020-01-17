<div class="row">
    <div class="col-lg-3">
        <br>
    </div>
    <div class="col-lg-6 mt-lg-5">
        <div class="card">
            <h3 class="card-header">User Profile</h3>
            <div class="card-body">
                <?php
                    echo $this->Flash->render();

                $this->Form->setTemplates([
                    'inputContainer' => '<div class="form-group{{required}}">
                        {{content}} <span class="help">{{help}}</span></div>',
                    'input' => '<input type="{{type}}" name="{{name}}"
                        class="form-control form-control-danger" {{attrs}}/>',
                    'inputContainerError' => '<div class="form-group has has-danger
                    {{type}}{{required}} error">{{content}}{{error}}</div>',
                    'error' => '<div class="text-danger">{{content}}</div>'
                ]);

                echo $this->Form->create($user_data);
                echo $this->Form->controls(
                    [
                        'name' => ['value' => $user_session['name'], 'required' => false, 'placeholder' => 'Enter Full Name',
                            'label' => ['class' => 'is-invalid', 'text' => 'User Full Name']],
                        'email' => ['value' => $user_session['email'],'required' => false, 'placeholder' => 'Enter Email',
                            'label' => ['class' => 'form-control-label','text' => 'Email']],
                        'phone' => ['value' => $user_session['phone'],'required' => false, 'placeholder' => 'Enter Phone Number',
                            'label' => ['class' => 'form-control-label']],
                        'postcode' => ['value' => $user_session['postcode'],'required' => false, 'placeholder' => 'Enter Postcode',
                            'label' => ['class' => 'form-control-label']],
                    ],
                    ['legend' => false]
                );
                echo $this->Form->button('<i class="fas fa-edit"></i> UPDATE PROFILE',
                    ['class'=> 'btn btn-success btn-block mt-2']);
                echo $this->Form->end();

                ?>
            </div>
        </div>
    </div>

</div>
