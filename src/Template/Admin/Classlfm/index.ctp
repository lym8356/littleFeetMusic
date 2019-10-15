<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->css('/full_calendar/css/fullcalendar.min', ['plugin' => true]); ?>
    <?= $this->Html->css('/full_calendar/css/jquery.qtip.min', ['plugin' => true]); ?>
    <?= $this->Html->script('/full_calendar/js/lib/moment.min.js', ['plugin' => true]); ?>
    <?= $this->Html->script('/full_calendar/js/fullcalendar.js', ['plugin' => true]); ?>
    <?= $this->Html->script('/full_calendar/js/jquery.qtip.min.js', ['plugin' => true]); ?>
    <?= $this->Html->script('/full_calendar/js/ready.js', ['plugin' => true]); ?>

</head>
<body>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item active">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#class-calendar" role="tab"
           aria-controls="pills-home" aria-selected="true">Calendar View</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#class-summary" role="tab"
           aria-controls="pills-profile" aria-selected="false">List View</a>
    </li>
</ul>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane active" id="class-calendar" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div id="calendar"></div>
        </div>
    </div>
    <div class="tab-pane" id="class-summary" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div class="row" id="class-summary">
            <div class="col-lg-12">
                <h3 class="card-header">Manage Teaching Period</h3>
                <?php echo $this->Html->link('Add New Term', ['action' => 'add'],
                    ['class' => 'btn btn-lg btn-primary pull-right',
                        'style' => 'margin-bottom: 20px',
                        'escape' => false]) ?>
                <div class="row col-md-2" style="margin-top: 10px;">
                    <?= $this->Form->control('search', ['label' => 'Search By Age Group: ', 'class' => '']); ?>
                </div>
                <div class="row col-md-2" style="margin-top: 10px;">
                    <?= $this->Form->control('location_filter', ['label' => 'Filter By Location: ', 'type' => 'select',
                        'options' => $location, 'empty' => 'No Filter', 'id' => 'searchLocation']); ?>
                </div>
                <div class="card-body">
                    <?= $this->Flash->render(); ?>
                    <div class="table-content">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('age_group') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('week_length') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('capacity') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('cost_per_class') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('overflow') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($classlfm as $class): ?>
                                <tr>
                                    <td><?= h($class->age_group) ?></td>
                                    <td><?= $class->location->name ?></td>
                                    <td><?= h(date('Y-m-d', strtotime($class->start_date))) ?></td>
                                    <td><?= h(date('Y-m-d', strtotime($class->end_date))) ?></td>
                                    <td><?= $this->Number->format($class->week_length) ?></td>
                                    <td><?= h(date("G:i", strtotime($class->start_time))) ?></td>
                                    <td><?= h(date("G:i", strtotime($class->end_time))) ?></td>
                                    <td><?= $this->Number->format($class->duration) ?></td>
                                    <td><?= $this->Number->format($class->capacity) ?></td>
                                    <td><?= $this->Number->format($class->cost_per_class) ?></td>
                                    <td><?= h($class->overflow) ?></td>
                                    <td><?= h($class->note) ?></td>
                                    <td class="actions">
                                        <div class="btn-group" role="group">
                                            <?= $this->Html->link(__('View'), ['controller' => 'weeks','action' => 'index'],
                                                ['class' => 'btn btn-primary']) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $class->id],
                                                ['class' => 'btn btn-success']) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $class->id],
                                                ['confirm' => __('Are you sure you want to delete # {0}?', $class->id),
                                                    'class' => 'btn btn-danger']) ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->first('<< ' . __('first')) ?>
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                                <?= $this->Paginator->last(__('last') . ' >>') ?>
                            </ul>
                            <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                        </div> <!-- Paginator -->
                    </div> <!-- table-content -->
                </div>
            </div> <!-- col-lg-12 -->
        </div>
    </div>
</div>

<script>
    $('document').ready(function () {
        $('#search').keyup(function () {
            var searchkey = $(this).val();
            searchClass(searchkey);
        });

        function searchClass(keyword) {
            var data = keyword;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Classlfm', 'action' => 'search']); ?>",
                data: {keyword: data},
                success: function (response) {
                    $('.table-content').html(response);
                }
            });
        };
    });

    $('document').ready(function () {

        $('#searchLocation').change(function () {
            var searchkey = $(this).val();
            searchClassLocation(searchkey);
        });

        function searchClassLocation(keyword) {
            var data = keyword;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Classlfm', 'action' => 'searchLocation']); ?>",
                data: {keyword: data},
                success: function (response) {
                    $('.table-content').html(response);
                }
            });
        };
    });


</script>

</body>
</html>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Classlfm[]|\Cake\Collection\CollectionInterface $classlfm
 */
?>

