<?php $this->Html->addCrumb('Admin', '/rola/index'); ?>
<?php $this->Html->addCrumb('Role', '/rola/index'); ?>
<?php $this->Html->addCrumb('Dodaj Rolę', '/rola/add'); ?>

<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($rola, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Dodaj Rolę') ?></legend>
        <?php
            echo $this->Form->input('nazwa_rola',['label'=>'Nazwa','class'=>'form-control']);
            echo $this->Form->input('opis_rola',['label'=>'Opis','class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
