<?php $this->Html->addCrumb('Admin', '/tlumaczenie/index'); ?>
<?php $this->Html->addCrumb('Tłumaczenia', '/tlumaczenie/index'); ?>
<?php $this->Html->addCrumb('Edytuj Tłumaczenie', '/tlumaczenie/edit/'.$tlumaczenie->id_tlumaczenie); ?>

<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($tlumaczenie, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Edytuj Tłumaczenie') ?></legend>
        <?php
            echo $this->Form->input('slowo_id_one',['label'=>'Słowo Bazowe', 'options' => $slowo_one,'class'=>'form-control']);
            echo $this->Form->input('slowo_id_two',['label'=>'Słowo Docelowe', 'options' => $slowo_two,'class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
