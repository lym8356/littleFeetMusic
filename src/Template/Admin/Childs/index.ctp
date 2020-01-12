<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Child[]|\Cake\Collection\CollectionInterface $childs
 */
?>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade in active" id="class-summary" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col-lg-12">
            <?= $this->Flash->render(); ?>
            <h3 class="card-header">Manage Children</h3>
            <?php echo $this->Html->link('Add New Child', ['action' => 'add'],
                ['class' => 'btn btn-lg btn-primary pull-right',
                    'style' => 'margin-bottom: 20px',
                    'escape' => false]) ?>
            </div>
            <div class="card-body">
                <div class="table-content">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('Date of Birth') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($childs as $child): ?>
                            <tr>
                                <td><?= h($child->first_name) ?></td>
                                <td><?= h($child->last_name) ?></td>
                                <td><?= h($child->dob) ?></td>
                                <td><?= h($child->note) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $child->id], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $child->id], ['class' => 'btn btn-success']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $child->id],
                                                ['confirm' => __('Are you sure you want to delete this child?', $child->id),
                                                    'class' => 'btn btn-danger']) ?>
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
