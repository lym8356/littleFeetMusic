<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Child $child
 */
?>
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
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($child->note) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($child->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($child->dob) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($child->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('F Name') ?></th>
                <th scope="col"><?= __('L Name') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Birthday') ?></th>
                <th scope="col"><?= __('Postcode') ?></th>
                <th scope="col"><?= __('Role') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($child->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->f_name) ?></td>
                <td><?= h($users->l_name) ?></td>
                <td><?= h($users->username) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->phone) ?></td>
                <td><?= h($users->birthday) ?></td>
                <td><?= h($users->postcode) ?></td>
                <td><?= h($users->role) ?></td>
                <td><?= h($users->created) ?></td>
                <td><?= h($users->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
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
                <th scope="col"><?= __('Enrolment Status') ?></th>
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
                <td><?= h($enrolments->enrolment_status) ?></td>
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
