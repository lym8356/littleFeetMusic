<table class="table table-striped table-hover table-bordered">
    <thead class="thead-dark">
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
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
            <td><?= $this->Number->format($class->id) ?></td>
            <td><?= h($class->name) ?></td>
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
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $class->id],
                        ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $class->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $class->id),
                            'class' => 'btn btn-danger'])?>
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
