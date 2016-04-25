<?php $this->Html->addCrumb('Admin', '/jezyk/index'); ?>
<?php $this->Html->addCrumb('Języki', '/jezyk/index'); ?>
<?php $this->Html->addCrumb('Edytuj Język', '/jezyk/edit/'.$jezyk->id_jezyk); ?>

<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($jezyk, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Edytuj Język') ?></legend>
        <?php
            echo $this->Form->input('nazwa_jezyk',['label'=>'Nazwa','class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
