<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Mailing Lists User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Mailing Lists'), ['controller' => 'MailingLists', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Mailing List'), ['controller' => 'MailingLists', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="mailingListsUsers index large-9 medium-8 columns content">
    <h3><?= __('Mailing Lists Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('mailing_list_id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mailingListsUsers as $mailingListsUser): ?>
            <tr>
                <td><?= $this->Number->format($mailingListsUser->id) ?></td>
                <td><?= $mailingListsUser->has('mailing_list') ? $this->Html->link($mailingListsUser->mailing_list->name, ['controller' => 'MailingLists', 'action' => 'view', $mailingListsUser->mailing_list->id]) : '' ?></td>
                <td><?= $mailingListsUser->has('user') ? $this->Html->link($mailingListsUser->user->id, ['controller' => 'Users', 'action' => 'view', $mailingListsUser->user->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $mailingListsUser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $mailingListsUser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $mailingListsUser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $mailingListsUser->id)]) ?>
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
