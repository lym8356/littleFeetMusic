<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Child $child
 */
?>
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
        color: white;

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
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Child'), ['action' => 'edit', $child->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Child'), ['action' => 'delete', $child->id], ['confirm' => __('Are you sure you want to delete # {0}?', $child->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Childs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Enrolments'), ['controller' => 'Enrolments', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Enrolment'), ['controller' => 'Enrolments', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="childs view large-9 medium-8 columns content">
    <h3><?= h($child->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($child->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($child->last_name) ?></td>
        </tr>c
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($child->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($child->dob) ?></td>
        </tr>
    </table>
    <div>
        <br\>
        <?= $this->Form->button('Edit', ['class' => 'btn btn-success pull-right', 'style' => 'margin-top: 10px; margin-bottom: 100px;'],['action' => 'edit', $child->id]) ?>
        <button><?= $this->Html->link(__('Edit Child'), ['action' => 'edit', $child->id],['class' => 'btn btn-success']) ?></button>
        <?php echo $this->Html->link(__('Back'), ['action' => 'index'],
            ['class' => 'btn btn-info pull-right', 'style' => 'margin-top: 10px; margin-right: 5px;'])
        ?>
        <br\>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($child->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($child->users as $users): ?>
            <tr>
                <td><?= h($users->f_name) ?></td>
                <td><?= h($users->l_name) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->phone) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Enrolments') ?></h4>
        <?php if (!empty($child->enrolments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Enrolment Type') ?></th>
                <th scope="col"><?= __('Enrolment Cost') ?></th>
                <th scope="col"><?= __('Lfmclasses Id') ?></th>
                <th scope="col"><?= __('Guardian Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Child Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($child->enrolments as $enrolments): ?>
            <tr>
                <td><?= h($enrolments->id) ?></td>
                <td><?= h($enrolments->enrolment_type) ?></td>
                <td><?= h($enrolments->enrolment_cost) ?></td>
                <td><?= h($enrolments->lfmclasses_id) ?></td>
                <td><?= h($enrolments->guardian_id) ?></td>
                <td><?= h($enrolments->created) ?></td>
                <td><?= h($enrolments->modified) ?></td>
                <td><?= h($enrolments->child_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Enrolments', 'action' => 'view', $enrolments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Enrolments', 'action' => 'edit', $enrolments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Enrolments', 'action' => 'delete', $enrolments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enrolments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
