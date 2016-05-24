<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mailing List'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Campaigns'), ['controller' => 'Campaigns', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Campaign'), ['controller' => 'Campaigns', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mailingLists index large-9 medium-8 columns content">
    <h3><?= __('Mailing Lists') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mailingLists as $mailingList): ?>
            <tr>
                <td><?= $this->Number->format($mailingList->id) ?></td>
                <td><?= h($mailingList->name) ?></td>
                <td><?= h($mailingList->created) ?></td>
                <td><?= h($mailingList->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mailingList->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mailingList->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mailingList->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mailingList->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
