<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Child[]|\Cake\Collection\CollectionInterface $childs
 */
?>

<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade in active" id="class-summary" role="tabpanel" aria-labelledby="pills-home-tab">
        <div class="row">
            <div class="col-md-9">
            <?= $this->Flash->render(); ?>
            <h3 class="card-header">Manage Site Contents</h3>
            </div>
            <div class="card-body col-md-9">
                <div class="table-content">
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Page Heading</th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Home</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' =>'../home/view/1' ], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => '../home/edit/1'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Classes</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Book Us</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => '../bookus/view/1'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => '../bookus/edit/1'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Shop</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>News & Videos</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>About</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => '../about'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => '../about/edit/1'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>Contact</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Hidden: Children's Music Classes Melbourne</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>9</td>
                                <td>Hidden: Best Children's Songs</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Hidden: Facebook Promo</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>Hidden: Promo</td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view'], ['class' => 'btn btn-primary']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit'], ['class' => 'btn btn-success']) ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!-- table-content -->
            </div> <!-- card-body -->
        </div> <!-- col-lg-12 -->
    </div> <!-- row -->
</div>
