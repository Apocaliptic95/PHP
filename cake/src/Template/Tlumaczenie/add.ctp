<?php $this->Html->addCrumb('Admin', '/tlumaczenie/index'); ?>
<?php $this->Html->addCrumb('Tłumaczenia', '/tlumaczenie/index'); ?>
<?php $this->Html->addCrumb('Dodaj Tłumaczenie', '/tlumaczenie/add'); ?>

<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($tlumaczenie, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Dodaj Tłumaczenie') ?></legend>
        <?php
            echo $this->Form->input('slowo_id_one',['label'=>'Słowo Bazowe', 'options' => $slowo_one,'class'=>'form-control']);
            echo $this->Form->input('slowo_id_two',['label'=>'Słowo Docelowe', 'options' => $slowo_two,'class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
