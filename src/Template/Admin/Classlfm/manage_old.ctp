<div class="row">
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
                    <?php foreach ($classlfm as $class): ?>
                        <tr>
                            <td><?= $this->Number->format($class->id) ?></td>
                            <td><?= h($class->name) ?></td>
                            <td><?= h($class->age_group) ?></td>
                            <td><?= $class->location->name ?></td>
                            <td><?= h($class->start_date) ?></td>
                            <td><?= h($class->end_date) ?></td>
                            <td><?= $this->Number->format($class->week_length) ?></td>
                            <td><?= h($class->start_time) ?></td>
                            <td><?= h($class->end_time) ?></td>
                            <td><?= $this->Number->format($class->duration) ?></td>
                            <td><?= $this->Number->format($class->capacity) ?></td>
                            <td><?= $this->Number->format($class->cost_per_class) ?></td>
                            <td><?= h($class->overflow) ?></td>
                            <td><?= h($class->note) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $class->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $class->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $class->id], ['confirm' => __('Are you sure you want to delete # {0}?', $class->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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
