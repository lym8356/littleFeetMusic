<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<link rel="stylesheet" type="text/css" href="../../../../webroot/css/base.css">

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
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
<!--        <li class="heading">--><?//= __('Actions') ?><!--</li>-->
    </ul>
    <button><?= $this->Html->link(__('Add New User'), ['action' => 'add']) ?></button>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
<!--                <th scope="col">--><!--<?= $this->Paginator->sort('id') ?>--><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('username') ?></th>
<!--                <th scope="col">--><!--<?//= $this->Paginator->sort('password') ?>--><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
<!--                <th scope="col">--><!--<?//= $this->Paginator->sort('birthdate') ?>--><!--</th>-->
                <th scope="col"><?= $this->Paginator->sort('zipcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" colspan="3" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
<!--                <td>--><!--<?= $this->Number->format($user->id) ?>--><!--</td>-->
                <td><?= h($user->name) ?></td>
                <td><?= h($user->username) ?></td>
<!--                <td>--><!--<?//= h($user->password) ?>--><!--</td>-->
                <td><?= h($user->email) ?></td>
                <td><?= h($user->phone) ?></td>
<!--                <td>--><!--<?//= h($user->birthdate) ?>--><!--</td>-->
                <td><?= h($user->zipcode) ?></td>
                <td><?= h($user->role) ?></td>
                <td><?= h($user->created) ?></td>
                <td><?= h($user->modified) ?></td>
                <td class="actions">
                    <div class="btn-group" role="group">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],
                            ['class' => 'btn btn-primary']) ?><br>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],
                            ['class' => 'btn btn-success']) ?><br>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id],
                            ['confirm' => __('Are you sure you want to delete {0}?', $user->name),
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
