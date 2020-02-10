<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<link rel="stylesheet" type="text/css" href="../../../../webroot/css/base.css">

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade in active" id="class-summary" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->Flash->render(); ?>
<!--                <h3 class="card-header">Manage Staff</h3>-->
                <?php echo $this->Html->link('Add A New Staff Member', ['action' => 'add'],
                    ['class' => 'btn btn-lg btn-primary pull-right',
                        'style' => 'margin-bottom: 20px',
                        'escape' => false]) ?>
                </div>
                </div>
                <div class="card-body">
                    <div class="table-content">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('First name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Last name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Username') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
<!--                                <th scope="col"><?//= $this->Paginator->sort('postcode') ?></th>-->
                                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
<!--                                <th scope="col"><?//= $this->Paginator->sort('created') ?></th>-->
<!--                                <th scope="col"><?//= $this->Paginator->sort('modified') ?></th>-->
                                <th scope="col" colspan="3" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <?php if($user['role']!="user"){?>
                                    <tr>
    <!--                                    <td>--><!--<?//= h($user->f_name),' ', h($user->l_name) ?>--><!--</td>-->
                                        <td><?= h($user->f_name) ?></td>
                                        <td><?= h($user->l_name) ?></td>
                                        <td><?= h($user->username) ?></td>
                                        <td><?= h($user->email) ?></td>
                                        <td><?= h($user->phone) ?></td>
<!--                                        <td><?//= h($user->postcode) ?></td>-->
                                        <td><?= h($user->role) ?></td>
<!--                                        <td><?//= h($user->created) ?></td>-->
<!--                                        <td><?//= h($user->modified) ?></td>-->
                                        <td class="actions">
                                            <div class="btn" role="group">
                                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],
                                                    ['class' => 'btn btn-success']) ?>
                                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id],
                                                    ['confirm' => __('Are you sure you want to delete {0}?', $user->name),
                                                        'class' => 'btn btn-danger']) ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php endforeach; ?>
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
                        </div>
                    </div> <!-- table-content -->
                </div> <!-- card-body -->
            </div> <!-- col-lg-12 -->
        </div> <!-- row -->
    </div>
</div>
