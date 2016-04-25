<?php $this->Html->addCrumb('Admin', '/zestawienie/index'); ?>
<?php $this->Html->addCrumb('Zestawienia', '/zestawienie/index'); ?>
<?php $this->Html->addCrumb('Dodaj Zestawienie', '/zestawienie/add'); ?>

<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($zestawienie, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Dodaj Zestawienie') ?></legend>
        <?php
            echo $this->Form->input('tlumaczenie_id', ['options' => $tlumaczenie,'class'=>'form-control']);
            echo $this->Form->input('zestaw_id', ['options' => $zestaw,'class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
