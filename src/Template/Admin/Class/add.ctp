<div class="row">
    <div class="col-lg-6">
        <div class="card border-warning mb-3">
            <h3 class="card-header"><i class="fas fa-edit"></i>&nbsp; Add Class</h3>
            <div class="card-body">
                <?php
                echo $this->Form->create($class);
                echo $this->Form->control('Location', ['options' => $class_location, 'empty' => 'Select Class Location']);
                echo $this->Form->date('Start Date', [
                    'minYear' => '2018',
                    'monthNames' => false,
                    'empty' => [
                        'year' => '2018',
                        'month' => 'Please Choose..',
                        'day' => 'Please Choose..',
                    ]
                ]);
//                echo $this->Flash->render();
//
//                $this->Form->setTemplates([
//                    'inputContainer' => '<div class="form-group{{required}}"> {{content}} <span class="help">{{help}}</span></div>',
//                    'input' => '<input type="{{type}}" name="{{name}}" class="form-control form-control-danger" {{attrs}}/>',
//                    'inputContainerError' => '<div class="form-group has-danger {{type}}{{required}}">{{content}}{{error}}</div>',
//                    'error' => '<div class="text-danger">{{content}}</div>',
//                    'textarea' => '<textarea  name="{{name}}" class="form-control" {{attrs}}>{{value}}</textarea>',
//                    'select' => '<select class="form-control">{{content}}</select>',
//                ]);
//
//                echo $this->Form->create($class);
//                echo $this->Form->controls(
//                    [
//                        'location' => ['required' => false, 'type' => 'select','empty' => 'Select Location',
//                            'options' => $class_location,'text' => 'Location'],
//                        'start_date' => ['required' => false, 'type' => 'date', 'text' => 'Start Date'],
//                        'start_time' => ['required' => false, 'type' => 'time', 'text' => 'Start Date'],
//                        'duration' => ['required' => false, 'type' => 'number', 'text' => 'Start Date'],
//                        'capacity' => ['required' => false, 'type' => 'number', 'text' => 'Start Date'],
//                        'cost' => ['required' => false, 'type' => 'text', 'text' => 'Start Date']
//                    ],
//                    ['legend' => false]
//                );
//
//                echo $this->Form->button('<i class="fa fa-plus-circle"></i> Create Class', ['class' => 'btn btn-success']);
//                echo $this->Form->end();


                ?>
            </div>
        </div>
    </div>
</div>

