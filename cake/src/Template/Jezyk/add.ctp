<?php $this->Html->addCrumb('Admin', '/jezyk/index'); ?>
<?php $this->Html->addCrumb('Języki', '/jezyk/index'); ?>
<?php $this->Html->addCrumb('Dodaj Język', '/jezyk/add'); ?>

<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($jezyk, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Dodaj Język') ?></legend>
        <?php
            echo $this->Form->input('nazwa_jezyk',['label'=>'Nazwa','class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
