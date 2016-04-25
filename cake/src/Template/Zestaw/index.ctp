<?php $this->Html->addCrumb($user , '/zestaw/index'); ?>
<?php $this->Html->addCrumb('Zestawy', '/zestaw/index'); ?>

<div>
	<?= $this->Flash->render() ?>
    <h3><?= __('Zestawy') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Zestaw</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-12">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('konto_id','Konto') ?></th>
					<th><?= $this->Paginator->sort('jezyk_id_one','Język bazowy') ?></th>
					<th><?= $this->Paginator->sort('jezyk_id_two','Język docelowy') ?></th>
					<th><?= $this->Paginator->sort('podkategoria_id','Podkategoria') ?></th>
					<th><?= $this->Paginator->sort('nazwa_zestaw','Nazwa') ?></th>
					<th><?= $this->Paginator->sort('ilosc_slowek_zestaw','Ilość słówek') ?></th>
					<th><?= $this->Paginator->sort('data_edycji_zestaw','Data edycji') ?></th>
					<th><?= $this->Paginator->sort('prywatny_zestaw','Prywatny Zestaw') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($zestaw as $zestaw): ?>
				<tr>
					<td><?= $zestaw->has('konto') ? $this->Html->link($zestaw->konto->name, ['controller' => 'Konto', 'action' => 'view', $zestaw->konto->id_konto]) : '' ?></td>
					<td><?= $zestaw->has('jezyk_one') ? $this->Html->link($zestaw->jezyk_one->nazwa_jezyk, ['controller' => 'Jezyk', 'action' => 'view', $zestaw->jezyk_one->id_jezyk]) : '0' ?></td>
					<td><?= $zestaw->has('jezyk_two') ? $this->Html->link($zestaw->jezyk_two->nazwa_jezyk, ['controller' => 'Jezyk', 'action' => 'view', $zestaw->jezyk_two->id_jezyk]) : '0' ?></td>
					<td><?= $zestaw->has('podkategorium') ? $this->Html->link($zestaw->podkategorium->nazwa_podkategoria, ['controller' => 'Podkategoria', 'action' => 'view', $zestaw->podkategorium->id_podkategoria]) : '' ?></td>
					<td><?= $zestaw->has('id_zestaw') ? $this->Html->link($zestaw->nazwa_zestaw, ['controller' => 'Zestaw', 'action' => 'view', $zestaw->id_zestaw]) : '' ?></td>
					<td><?= $this->Number->format($zestaw->ilosc_slowek_zestaw) ?></td>
					<td><?= h($zestaw->data_edycji_zestaw) ?></td>
					<td><?= h(($zestaw->prywatny_zestaw) ? ('Tak') : ('Nie')) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['action' => 'view', $zestaw->id_zestaw],['escape' => false]) ?>
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $zestaw->id_zestaw],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $zestaw->id_zestaw], ['escape' => false,'confirm' => __('Jesteś pewien że chcesz usunąć zestaw {0}?', $zestaw->nazwa_zestaw)]) ?>
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
