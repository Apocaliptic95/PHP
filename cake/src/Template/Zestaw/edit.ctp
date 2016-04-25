<?php $this->Html->addCrumb($user, '/zestaw/index'); ?>
<?php $this->Html->addCrumb('Zestawy', '/zestaw/index'); ?>
<?php $this->Html->addCrumb('Edytuj Zestaw', '/zestaw/edit/'.$zestaw->id_zestaw); ?>

<div>
	<div class="form-div">
		<?= $this->Flash->render() ?>
		<?= $this->Form->create($zestaw, ['role' =>'form', 'class'=>'form-horizontal']) ?>
		<fieldset>
			<legend><?= __('Edytuj Zestaw') ?></legend>
			<?php
				echo $this->Form->input('jezyk_id_one', ['label' => 'Język Bazowy','options' => $jezyk_one,'class'=>'form-control']);
				echo $this->Form->input('jezyk_id_two', ['label' => 'Język Docelowy','options' => $jezyk_two,'class'=>'form-control']);
				echo $this->Form->input('podkategoria_id', ['label' => 'Podkategoria','options' => $podkategoria,'class'=>'form-control']);
				echo $this->Form->input('nazwa_zestaw', ['label' => 'Nazwa','class'=>'form-control']);
				if($rola_id == 1)
					echo $this->Form->input('prywatny_zestaw', ['label' => 'Prywatny Zestaw','disabled' => true]);
				else
					echo $this->Form->input('prywatny_zestaw', ['label' => 'Prywatny Zestaw']);
				echo '<div class="textarea-zestaw"><p class="p-zestaw">Dodaj Słówka</p>';
				echo $this->Form->textarea('slowka', ['class' => 'form-control']);
				echo '</div>';
			?>
		</fieldset>
		<?= $this->Form->button(__('Zatwierdź'),['class'=>'btn btn-info pull-right']) ?>
		<?= $this->Form->end() ?>
	</div>
	<div class="related">
        <h4><?= __('Słowa') ?></h4>
        <?php if (!empty($zestaw->zestawienie)): ?>
        <table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= __('Słowa') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
            <?php foreach ($zestaw->zestawienie as $zestawienie): ?>
            <tr>
                <td><?= h($zestawienie->tlumaczenie->name) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['controller' => 'Zestawienie', 'action' => 'deleteWord', $zestawienie->id_zestawienie,$zestaw->id_zestaw], ['escape' => false,'confirm' => __('Czy jesteś pewien że chcesz usunąć {0}?', $zestawienie->tlumaczenie->name)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		<?php else :?>
			<div class="alert alert-warning" role="alert"><h4>Brak Słówek</h4></div>
        <?php endif; ?>
    </div>
</div>
