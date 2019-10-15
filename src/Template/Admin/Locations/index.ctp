<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location[]|\Cake\Collection\CollectionInterface $locations
 */
?>
<link rel="stylesheet" type="text/css" href="../../../../webroot/css/location.css">

<style type="text/css">
    table{
        border: 1px solid black;
        position: center;
    }
    th, td{
        padding: 15px;
        vertical-align: center;
        text-align: left;
        border: 1px solid black;
    }

    tr:hover{
        background-color: #f5f5f5;
    }

    #loc-dt{

    }


    a:hover{
        text-decoration: none;

    }

     .btn{
        margin-left: 5px;
     }
     .btn:hover{
        background-color: #4da6ff;
     }

     .tbn{
        float: right;
        margin-right: 5%;
     }


</style>


<div class="locations index large-9 medium-8 columns content">
    <h3><?= __('Locations') ?></h3>
    <br><button><?= $this->Html->link(__('Add New Location'), ['action' => 'add']) ?></button><br><br>
    <table cellpadding="0" cellspacing="0">
        <thead>
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
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $location->Id]) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $location->Id], ['confirm' => __('Are you sure you want to delete {0}?', $location->name)]) ?>
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
