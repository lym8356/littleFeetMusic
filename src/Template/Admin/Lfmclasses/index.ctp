<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Lfmclass[]|\Cake\Collection\CollectionInterface $lfmclasses
 */
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div class="row">
    <div class="col-lg-10">
        <?= $this->Flash->render(); ?>
        <h3 class="card-header">Manage Class</h3>
        <?php echo $this->Html->link('Back', ['controller' => 'terms', 'action' => 'index'],
            ['class' => 'btn btn-lg btn-primary pull-left',
                'style' => 'margin-bottom: 20px',
                'escape' => false]) ?>

        <?php echo $this->Html->link('Add Class', ['action' => 'add'],
            ['class' => 'btn btn-lg btn-primary pull-right',
                'style' => 'margin-bottom: 20px;',
                'escape' => false]) ?>

        <div class="card-body">
            <div class="table-content">
                <table class="table table-striped table-hover table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('week_no') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('class_date') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($lfmclasses as $lfmclass): ?>
                        <tr>
                            <td><?= $this->Number->format($lfmclass->week_no) ?></td>
                            <td><?= $this->Number->format($lfmclass->price) ?></td>
                            <td><?= h(date('Y-m-d', strtotime($lfmclass->class_date))) ?></td>
                            <td class="actions">
                                <div class="btn-group" role="group">
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $lfmclass->id],['class' => 'btn btn-success']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $lfmclass->id],
                                         ['confirm' => __('Are you sure you want to delete # {0}?', $lfmclass->id),
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
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
