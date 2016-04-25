<?php $this->Html->addCrumb('Admin', '/konto/index'); ?>
<?php $this->Html->addCrumb('Konta', '/konto/index'); ?>
<?php $this->Html->addCrumb('Edycja Konta', '/konto/edit/'.$konto->id_konto); ?>
<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($konto, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Edytuj Konto') ?></legend>
        <?php
			echo $this->Form->input('rola_id', ['label'=>'Rola','class'=>'form-control','options'=>$rola]);
            echo $this->Form->input('imie_konto', ['label'=>'Imię','class'=>'form-control']);
            echo $this->Form->input('nazwisko_konto', ['label'=>'Nazwisko','class'=>'form-control']);
            echo $this->Form->input('email_konto', ['label'=>'Email','class'=>'form-control']);
            echo $this->Form->input('login_konto', ['label'=>'Login','class'=>'form-control']);
            echo $this->Form->input('haslo_konto', ['label'=>'Hasło','type'=>'password','class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
