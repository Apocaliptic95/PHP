<?php $this->Html->addCrumb('Admin', '/podkategoria/indexAdmin'); ?>
<?php $this->Html->addCrumb('Podkategorie', '/podkategoria/indexAdmin'); ?>
<div><?= $this->Flash->render() ?>
	<h3><?= __('Podategoria') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Podategorię</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('id_podkategoria','Identyfikator') ?></th>
					<th><?= $this->Paginator->sort('kategoria_id','Kategoria') ?></th>
					<th><?= $this->Paginator->sort('nazwa_podkategoria','Nazwa') ?></th>
					<th><?= $this->Paginator->sort('opis_podkategoria','Opis') ?></th>
					<th>Obrazek</th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($podkategoria as $podkategorium): ?>
				<tr>
					<td><?= h($podkategorium->id_podkategoria) ?></td>
					<td><?= $podkategorium->has('kategorium') ? $this->Html->link($podkategorium->kategorium->nazwa_kategoria, ['controller' => 'Kategoria', 'action' => 'view', $podkategorium->kategorium->id_kategoria]) : '' ?></td>
					<td><?= h($podkategorium->nazwa_podkategoria) ?></td>
					<td><?= h($podkategorium->opis_podkategoria) ?></td>
					<td><?= $this->Html->image('podkategoria/img_podkategoria/'.$podkategorium->dir_podkategoria.'/square_'.$podkategorium->img_podkategoria, ['fullBase' => true,'class' =>'category-image-admin']); ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $podkategorium->id_podkategoria],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $podkategorium->id_podkategoria], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $podkategorium->id_podkategoria)]) ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="paginator col-md-4 col-md-offset-4">
			<ul class="pagination">
				<?= $this->Paginator->prev('< ' . __('Poprzedni')) ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next(__('Następny') . ' >') ?>
			</ul>
		</div>
	</div>
</div>