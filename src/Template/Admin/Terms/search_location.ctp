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
    <?php foreach ($terms as $term): ?>
        <tr>
            <td><?= h($term->age_group) ?></td>
            <td><?= $term->location->name ?></td>
            <td><?= h(date('Y-m-d', strtotime($term->start_date))) ?></td>
            <td><?= h(date('Y-m-d', strtotime($term->end_date))) ?></td>
            <td><?= $this->Number->format($term->week_length) ?></td>
            <td><?= h(date("G:i", strtotime($term->start_time))) ?></td>
            <td><?= h(date("G:i", strtotime($term->end_time))) ?></td>
            <td><?= $this->Number->format($term->duration) ?></td>
            <td><?= $this->Number->format($term->capacity) ?></td>
            <td><?= $this->Number->format($term->cost_per_class) ?></td>
            <td><?= h($term->overflow) ?></td>
            <td><?= h($term->note) ?></td>
            <td class="actions">
                <div class="btn-group" role="group">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $term->id],
                        ['class' => 'btn btn-success']) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $term->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $term->id),
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