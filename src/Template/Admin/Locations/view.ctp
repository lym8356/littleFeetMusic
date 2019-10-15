<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Location $location
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
        text-orientation: sideways;
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

</nav>
<div class="locations view large-9 medium-8 columns content">
    <h3 style="text-align:center; text-transform:uppercase;"><?= h($location->name) ?></h3>
    <table class="vertical-table" id="loc-dt">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($location->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Street Address') ?></th>
            <td><?= h($location->street_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suburb') ?></th>
            <td><?= h($location->suburb) ?></td>
        </tr>
                <tr>
            <th scope="row"><?= __('Post Code') ?></th>
            <td><?= $this->Number->format($location->post_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Note') ?></th>
            <td><?= h($location->note) ?></td>
        </tr>
    </table>
    <br><br>
    <div class="tbn">
        <button class="btn"><?= $this->Html->link(__('Edit Location'), ['action' => 'edit', $location->Id]) ?> </button>
        <button class="btn"><?= $this->Form->postLink(__('Delete Location'), ['action' => 'delete', $location->Id], ['confirm' => __('Are you sure you want to delete # {0}?', $location->Id)]) ?> </button>
        <button class="btn"><?= $this->Html->link(__('Back to List'), ['action' => 'index']) ?></button>
        <button class="btn"><?= $this->Html->link(__('Add New Location'), ['action' => 'add']) ?></button>
    </div>
    <br><br><br>
    <div class="related">
        <h4 style="text-align:center; text-transform:uppercase;"><?= __('Listed Classes') ?></h4>
        <?php if (!empty($location->terms)): ?>
        <table cellpadding="5" cellspacing="5">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Age Group') ?></th>
                <th scope="col"><?= __('Start Date') ?></th>
                <th scope="col"><?= __('End Date') ?></th>
                <th scope="col"><?= __('Week Length') ?></th>
                <th scope="col"><?= __('Start Time') ?></th>
                <th scope="col"><?= __('End Time') ?></th>
                <th scope="col"><?= __('Duration') ?></th>
                <th scope="col"><?= __('Capacity') ?></th>
                <th scope="col"><?= __('Cost Per Class') ?></th>
                <th scope="col"><?= __('Note') ?></th>
                <th scope="col" class="actions" colspan="2"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($location->terms as $terms): ?>
            <tr>
                <td><?= h($terms->name) ?></td>
                <td><?= h($terms->age_group) ?></td>
                <td><?= h($terms->start_date) ?></td>
                <td><?= h($terms->end_date) ?></td>
                <td><?= h($terms->week_length) ?></td>
                <td><?= h($terms->start_time) ?></td>
                <td><?= h($terms->end_time) ?></td>
                <td><?= h($terms->duration) ?></td>
                <td><?= h($terms->capacity) ?></td>
                <td><?= h($terms->cost_per_class) ?></td>
                <td><?= h($terms->note) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Terms', 'action' => 'edit', $terms->id]) ?>
                </td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Terms', 'action' => 'delete', $terms->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classlfm->id)]) ?>
                    $terms
            </tr>
            <?php endforeach; ?>
        </table>
        <br><br><br>
        <button class="btn tbn"><?= $this->Html->link(__('Add New Class'), ['controller' => 'Terms', 'action' => 'add']) ?></button>
         <br><br><br>


        <?php endif; ?>
    </div>
</div>
