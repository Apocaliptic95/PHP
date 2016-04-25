<?php $this->Html->addCrumb('Admin', '/uprawnienia/index'); ?>
<?php $this->Html->addCrumb('Uprawnienia', '/uprawnienia/index'); ?>
<?php $this->Html->addCrumb('Edytuj Uprawnienia', '/uprawnienia/edit/'.$uprawnienium->id_uprawnienia); ?>

<div>
    <?= $this->Form->create($uprawnienium, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Edytuj Uprawnienie') ?></legend>
        <?php
            echo $this->Form->input('konto_id', ['options' => $konto,'class'=>'form-control']);
            echo $this->Form->input('podkategoria_id', ['options' => $podkategoria,'class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
