<?php $this->Html->addCrumb('Admin', '/slowo/index'); ?>
<?php $this->Html->addCrumb('Słowa', '/slowo/index'); ?>
<?php $this->Html->addCrumb('Edytuj Słowo', '/slowo/index/edit/'.$slowo->id_slowo); ?>

<div><?= $this->Flash->render() ?>
    <?= $this->Form->create($slowo, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Edytuj Słowo') ?></legend>
        <?php
			echo $this->Form->input('jezyk_id',['label'=>'Język','class'=>'form-control', 'options'=>$jezyk]);
            echo $this->Form->input('nazwa_slowo',['label'=>'Słowo','class'=>'form-control']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
