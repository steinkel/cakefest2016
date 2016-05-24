<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Template'), ['action' => 'edit', $template->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Template'), ['action' => 'delete', $template->id], ['confirm' => __('Are you sure you want to delete # {0}?', $template->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Templates'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Template'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Campaigns'), ['controller' => 'Campaigns', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Campaign'), ['controller' => 'Campaigns', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="templates view large-9 medium-8 columns content">
    <h3><?= h($template->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($template->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($template->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($template->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($template->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Active') ?></th>
            <td><?= $template->active ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Subject') ?></h4>
        <?= $this->Text->autoParagraph(h($template->subject)); ?>
    </div>
    <div class="row">
        <h4><?= __('Body') ?></h4>
        <?= $this->Text->autoParagraph(h($template->body)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Campaigns') ?></h4>
        <?php if (!empty($template->campaigns)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Template Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($template->campaigns as $campaigns): ?>
            <tr>
                <td><?= h($campaigns->id) ?></td>
                <td><?= h($campaigns->name) ?></td>
                <td><?= h($campaigns->created) ?></td>
                <td><?= h($campaigns->modified) ?></td>
                <td><?= h($campaigns->status) ?></td>
                <td><?= h($campaigns->template_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Campaigns', 'action' => 'view', $campaigns->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Campaigns', 'action' => 'edit', $campaigns->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Campaigns', 'action' => 'delete', $campaigns->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campaigns->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
