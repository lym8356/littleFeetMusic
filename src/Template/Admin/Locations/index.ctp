<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location[]|\Cake\Collection\CollectionInterface $locations
 */
?>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade in active" id="class-summary" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col-lg-12">
                <?= $this->Flash->render(); ?>
                <h3 class="card-header">Manage Location</h3>
                <?php echo $this->Html->link('Add New Location', ['action' => 'add'],
                    ['class' => 'btn btn-lg btn-primary pull-right',
                        'style' => 'margin-bottom: 20px',
                        'escape' => false]) ?>
                </div>
                <div class="card-body">
                    <div class="table-content">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('street_address') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('suburb') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('post_code') ?></th>
                                <th scope="col"><?= $this->Paginator->sort('note') ?></th>
                                <th scope="col" colspan="3" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($locations as $location): ?>
                                <tr>
                                    <td><?= h($location->name) ?></td>
                                    <td><?= h($location->street_address) ?></td>
                                    <td><?= h($location->suburb) ?></td>
                                    <td><?= $this->Number->format($location->post_code) ?></td>
                                    <td><?= h($location->note) ?></td>
                                    <!--                <td class="actions">-->
                                    <!--                <?//= $this->Html->link(__('View'), ['action' => 'view', $location->Id]) ?>-->
                                    <!--                </td>-->
                                    <td class="actions">
                                        <div class="btn" role="group">
                                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->Id], ['class' => 'btn btn-success']) ?>
                                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->Id], ['class' => 'btn btn-danger'],
                                                ['confirm' => __('Are you sure you want to delete {0}?', $location->name)]) ?>
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
