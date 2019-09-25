<div class="row">
    <? print_r($location);die; ?>
    <div class="col-lg-12">
        <div class="card">
            <h3 class="card-header">Manage Class</h3>
            <?php echo $this->Html->link('Create New Class','/admin/classlfm/add',
                ['class' => 'btn btn-lg btn-primary pull-right',
                    'style' => 'margin-bottom: 20px',
                    'escape' => false]); ?>
            <div class="card-body">
                <?= $this->Flash->render(); ?>

                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>Location</th>
                        <th>Start Date</th>
                        <th>Start Time</th>
                        <th>Duration</th>
                        <th>Capacity</th>
                        <th>Cost</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($classes as $value){
                        ?>
                            <tr>
                                <td><?= $classes->location->name; ?></td>
                                <td><?= $value['start_date'] ?></td>
                                <td><?= $value['start_time']->i18nFormat(
                                        [\IntlDateFormatter::NONE, \IntlDateFormatter::SHORT]
                                    ) ?></td>
                                <td><?= $value['duration'] ?></td>
                                <td><?= $value['capacity'] ?></td>
                                <td><?= $value['cost'] ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <?php
                                        echo $this->Html->link('<i class="fa fa-pencil-square-o"></i> Edit', '#'.$value->EId,['class' => 'btn btn-success', 'escape' => false]);
                                        echo $this->Form->postLink('<i class="fa fa-recycle"></i> Delete', '#'.$value->EId,['confirm' => 'Are you sure?', 'class' => 'btn btn-danger', 'escape' => false]);
                                        ?>
                                    </div>
                                </td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>

                <?php
                $paginator = $this->Paginator->setTemplates([
                    'number' => '<li class="page-item"><a href="{{url}}" class="page-link">{{text}}</a></li>',
                    'current' => '<li class="page-item active"><a href="{{url}}" class="page-link">{{text}}</a></li>',
                    'first' => '<li class="page-item"><a href="{{url}}" class="page-link">&laquo</a></li>',
                    'last' => '<li class="page-item"><a href="{{url}}" class="page-link">&raquo</a></li>',
                    'prevActive' => '<li class="page-item"><a href="{{url}}" class="page-link">&lt</a></li>',
                    'nextActive' => '<li class="page-item"><a href="{{url}}" class="page-link">&gt</a></li>',
                ]);
                ?>
                <nav>
                    <ul class="pagination">
                        <?php
                        echo $paginator->first();
                        if($paginator->hasPrev()){
                            echo $paginator->prev();
                        }
                        echo $paginator->numbers();
                        if($paginator->hasNext()){
                            echo $paginator->next();
                        }
                        echo $paginator->last();
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
