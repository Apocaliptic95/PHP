<?php $this->Html->addCrumb('Admin', '/kategoria/indexAdmin'); ?>
<?php $this->Html->addCrumb('Kategorie', '/kategoria/indexAdmin'); ?>
<?php $this->Html->addCrumb('Edytuj Kategorię', '/kategoria/edit/'.$kategorium->id_kategoria); ?>
<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($kategorium, ['type' => 'file','role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Edytuj Kategorię') ?></legend>
        <?php
            echo $this->Form->input('nazwa_kategoria',['label'=>'Nazwa','class'=>'form-control']);
            echo $this->Form->input('opis_kategoria',['label'=>'Opis','class'=>'form-control']);
            echo $this->Form->input('img_kategoria', ['label'=>'Obrazek','type' => 'file','class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
