<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <h3 class="card-header">Manage Class</h3>
            <button class="btn btn-lg btn-primary pull-right" style="margin-bottom: 10px">Create New Class</button>
            <div class="card-body">
                <?= $this->Flash->render(); ?>

                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th>class id</th>
                        <th>location</th>
                        <th>start_time</th>
                        <th>duration</th>
                        <th>capacity</th>
                        <th>cost</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($classes as $value){
                        ?>
                            <tr>
                                <td><?= $value['id'] ?></td>
                                <td><?= $value['location'] ?></td>
                                <td><?= $value['start_time'] ?></td>
                                <td><?= $value['duration'] ?></td>
                                <td><?= $value['capacity'] ?></td>
                                <td><?= $value['cost'] ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <?php
                                        echo $this->Html->link('<i class="fa fa-pencil-square-o"></i> Edit', '/admin/article/edit/'.$value->EId,['class' => 'btn btn-success', 'escape' => false]);
                                        echo $this->Form->postLink('<i class="fa fa-recycle"></i> Delete', '/admin/article/delete/'.$value->EId,['confirm' => 'Are you sure?', 'class' => 'btn btn-danger', 'escape' => false]);
                                        ?>
                                    </div>
                                </td>
                            </tr>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
