<!DOCTYPE html>
<html>
<head>

</head>
<body>
<!--<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">-->
<!--    <li class="nav-item active">-->
<!--        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#class-summary" role="tab"-->
<!--           aria-controls="pills-home" aria-selected="true">List View</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#class-calendar" role="tab"-->
<!--           aria-controls="pills-profile" aria-selected="false">Calendar View</a>-->
<!--    </li>-->
<!--</ul>-->

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade in active" id="class-summary" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->Flash->render(); ?>
                <h3 class="card-header">Manage Teaching Period</h3>
                <?php echo $this->Html->link('Add New Term', ['action' => 'add'],
                    ['class' => 'btn btn-lg btn-primary pull-right',
                        'style' => 'margin-bottom: 20px',
                        'escape' => false]) ?>
                <div class="row col-md-3" style="margin:auto;">
                    <?= $this->Form->control('search', ['label' => 'Search By Age Group: ', 'class' => 'form-control']); ?>
                </div>
                <div class="row col-md-2" style="margin:auto;">
                    <?= $this->Form->control('location_filter', ['label' => 'Filter By Location: ', 'type' => 'select',
                        'options' => $location, 'empty' => 'No Filter', 'id' => 'searchLocation', 'class' => 'form-control']); ?>
                </div>
                <div class="card-body">
                    <div class="table-content">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('age_group') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('location_id') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('week_length') ?></th>
<!--                                <th scope="col">--><!--<?//= $this->Paginator->sort('day_id') ?>--><!--</th>-->
                                <th scope="col"><?= $this->Paginator->sort('class_day') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('start_time') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('end_time') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('duration') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('capacity') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('casual_rate') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($terms as $term):?>
                                <tr>
                                    <td><?= h($term->name) ?></td>
                                    <td><?= h($term->age_group) ?></td>
                                    <td><?= $term->location->name ?></td>
                                    <td><?= h(date('d-m-Y', strtotime($term->start_date))) ?></td>
                                    <td><?= h(date('d-m-Y', strtotime($term->end_date))) ?></td>
                                    <td><?= $this->Number->format($term->week_length) ?></td>
                                    <td><?= $term->day->name ?></td>
                                    <td><?= h(date("G:i", strtotime($term->start_time))) ?></td>
                                    <td><?= h(date("G:i", strtotime($term->end_time))) ?></td>
                                    <td><?= $this->Number->format($term->duration) ?></td>
                                    <td><?= $this->Number->format($term->capacity) ?></td>
                                    <td><?= $this->Number->format($term->casual_rate) ?></td>
                                    <td><?= h($term->note) ?></td>
                                    <td class="actions">
                                        <div class="btn" role="group">
                                            <?= $this->Html->link(__('View'), ['controller' => 'lfmclasses','action' => 'index', $term->id],
                                                ['class' => 'btn btn-primary']) ?>
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $term->id],
                                                ['class' => 'btn btn-success']) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $term->id],
                                                ['confirm' => __('Are you sure you want to delete this term?', $term->id),
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
                </div> <!-- card-body -->
            </div> <!-- col-lg-12 -->
        </div> <!-- row -->
    </div>
    <div class="tab-pane fade" id="class-calendar" role="tabpanel" aria-labelledby="pills-profile-tab">
        <div id="calendar"></div>
    </div>
</div>

<script>

    $('document').ready(function () {
        $('#search').keyup(function () {
            let searchkey = $(this).val();
            searchClass(searchkey);
        });

        function searchClass(keyword) {
            let data = keyword;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Terms', 'action' => 'search']); ?>",
                data: {keyword: data},
                success: function (response) {
                    $('.table-content').html(response);
                }
            });
        };
    });

    $('document').ready(function () {

        $('#searchLocation').change(function () {
            let searchkey = $(this).val();
            searchClassLocation(searchkey);
        });

        function searchClassLocation(keyword) {
            let data = keyword;
            $.ajax({
                method: 'get',
                url: "<?php echo $this->Url->build(['controller' => 'Terms', 'action' => 'searchLocation']); ?>",
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


