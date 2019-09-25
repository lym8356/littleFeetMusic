<div class="row">

    <p>Date: <input type="text" id="datepicker"></p>

    <div class="col-lg-6">
        <div class="card border-warning mb-3">
            <h3 class="card-header"><i class="fas fa-edit"></i>&nbsp; Add Class</h3>
            <div class="card-body">
                <?php
                echo $this->Flash->render();

                $this->Form->setTemplates([
                    'inputContainerError' => '<div class="form-group has-danger {{type}}{{required}}">{{content}}{{error}}</div>',
                    'error' => '<div class="text-danger">{{content}}</div>',
                ]);

                echo $this->Form->create($class);
                echo $this->Form->controls(
                    [
                        'location' => ['required' => true, 'type' => 'select','empty' => 'Select Location',
                            'options' => $class_location,'text' => 'Location', 'class' => 'form-control'],
                        'start_date' => ['required' => true, 'type' => 'text',  'id' => 'datetimepicker1'],
                        'start_time' => ['required' => true, 'type' => 'time']
                    ],
                    ['legend' => false]
                );

                ?>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-warning mb-3">
            <h3 class="card-header">&nbsp</h3>
            <div class="card-body">
                <?php
                echo $this->Form->input('age_group', ['type' => 'select', 'empty' => 'Please Select', 'class' => 'form-control']);
                echo $this->Form->controls(
                    [
                        'duration' => ['required' => true, 'type' => 'number',  'class' => 'form-control'],
                        'capacity' => ['required' => true, 'type' => 'number', 'text' => 'Start Date', 'class' => 'form-control'],
                        'cost_per_class' => ['required' => true, 'type' => 'number',  'class' => 'form-control'],
                        'note' => ['required' => true, 'type' => 'textarea',  'class' => 'form-control'],
                    ],
                    ['legend' => false]
                );
                echo $this->Form->button('<i class="fa fa-plus-circle"></i> Create Class', ['class' => 'btn btn-info pull-right mt-3']);
                echo $this->Form->end();
                ?>
            </div>
        </div>
    </div>
</div>

