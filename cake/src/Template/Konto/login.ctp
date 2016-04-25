<?php $this->Html->addCrumb('Zaloguj', '/konto/login'); ?>

<div>
<?= $this->Flash->render() ?>
<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Wpisz login i hasło.') ?></legend>
        <?= $this->Form->input('login_konto',['label'=>'Login','class'=>'form-control']) ?>
        <?= $this->Form->input('haslo_konto',['type'=>'password','label'=>'Hasło','class'=>'form-control']) ?>
    </fieldset>
<?= $this->Form->button(__('Zaloguj'),['class'=>'btn btn-info pull-right']); ?>
<?= $this->Form->end() ?>
</div>