<?php $this->Html->addCrumb('Admin', '/kategoria/indexAdmin'); ?>
<?php $this->Html->addCrumb('Kategorie', '/kategoria/indexAdmin'); ?>
<div><?= $this->Flash->render() ?>
	<h3><?= __('Kategoria') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Kategorię</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('id_kategoria','Identyfikator') ?></th>
					<th><?= $this->Paginator->sort('nazwa_kategoria','Nazwa') ?></th>
					<th><?= $this->Paginator->sort('opis_kategoria','Opis') ?></th>
					<th>Obrazek</th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($kategoria as $kategorium): ?>
				<tr>
					<td><?= h($kategorium->id_kategoria) ?></td>
					<td><?= h($kategorium->nazwa_kategoria) ?></td>
					<td><?= h($kategorium->opis_kategoria) ?></td>
					<td><?= $this->Html->image('kategoria/img_kategoria/'.$kategorium->dir_kategoria.'/square_'.$kategorium->img_kategoria, ['fullBase' => true,'class' =>'category-image-admin']); ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $kategorium->id_kategoria],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $kategorium->id_kategoria], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $kategorium->id_kategoria)]) ?>
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