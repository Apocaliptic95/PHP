<?php $this->Html->addCrumb($user, '/zestaw/index'); ?>
<?php $this->Html->addCrumb('Zestawy', '/zestaw/index'); ?>
<?php $this->Html->addCrumb('Dodaj Zestaw', '/zestaw/add'); ?>

<div>
	<?= $this->Flash->render() ?>
    <?= $this->Form->create($zestaw, ['role' =>'form', 'class'=>'form-horizontal']) ?>
    <fieldset>
        <legend><?= __('Nowy Zestaw') ?></legend>
        <?php
            echo $this->Form->input('jezyk_id_one', ['label' => 'Język Bazowy','options' => $jezyk_one,'class'=>'form-control']);
            echo $this->Form->input('jezyk_id_two', ['label' => 'Język Docelowy','options' => $jezyk_two,'class'=>'form-control']);
            echo $this->Form->input('podkategoria_id', ['label' => 'Podkategoria','options' => $podkategoria,'class'=>'form-control']);
            echo $this->Form->input('nazwa_zestaw', ['label' => 'Nazwa','class'=>'form-control']);
			if($rola_id == 1)
				echo $this->Form->input('prywatny_zestaw', ['label' => 'Prywatny Zestaw','disabled' => true]);
			else
				echo $this->Form->input('prywatny_zestaw', ['label' => 'Prywatny Zestaw']);
			echo '<div class="textarea-zestaw"><p class="p-zestaw">Słówka</p>';
			echo $this->Form->textarea('slowka', ['class' => 'form-control']);
			echo '</div>';
        ?>
    </fieldset>
    <?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
    <?= $this->Form->end() ?>
</div>
