<?= $this->extend('Layout/two_column'); ?>
<?= $this->Form->create($user) ?>
<fieldset>
    <legend><?= __('Add User') ?></legend>
    <?php
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('first_name');
        echo $this->Form->input('last_name');
        echo $this->Form->input('locale');
        echo $this->Form->input('mailing_lists._ids', ['options' => $mailingLists]);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
