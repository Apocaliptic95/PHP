<?php $this->Html->addCrumb('Admin', '/wynik/index'); ?>
<?php $this->Html->addCrumb('Wyniki', '/wynik/index'); ?>
<?php $this->Html->addCrumb('Edytuj Wynik', '/wynik/edit/'.$wynik->id_wynik); ?>


<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($wynik, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Edytuj Wynik') ?></legend>
        <?php
            echo $this->Form->input('zestaw_id', ['label'=>'Zestaw','options' => $zestaw,'class'=>'form-control']);
            echo $this->Form->input('wynik_wynik', ['label'=>'Wynik','class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
