<?php $this->Html->addCrumb('Admin', '/podkategoria/indexAdmin'); ?>
<?php $this->Html->addCrumb('Podkategorie', '/podkategoria/indexAdmin'); ?>
<?php $this->Html->addCrumb('Dodaj Podkategorię', '/podkategoria/add'); ?>
<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($podkategorium, ['type' => 'file','role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Dodaj Podkategorię') ?></legend>
        <?php
            echo $this->Form->input('nazwa_podkategoria',['label'=>'Nazwa','class'=>'form-control']);
			echo $this->Form->input('kategoria_id',['label'=>'Kategoria','class'=>'form-control', 'options'=>$kategoria]);
            echo $this->Form->input('opis_podkategoria',['label'=>'Opis','class'=>'form-control']);
            echo $this->Form->input('img_podkategoria', ['label'=>'Obrazek','type' => 'file','class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>