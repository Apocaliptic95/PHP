<?php $this->Html->addCrumb('Admin', '/uprawnienia/index'); ?>
<?php $this->Html->addCrumb('Uprawnienia', '/uprawnienia/index'); ?>

<div>
	<?= $this->Flash->render() ?>
    <h3><?= __('Uprawnienia') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Uprawnienia</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('konto_id') ?></th>
					<th><?= $this->Paginator->sort('podkategoria_id') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($uprawnienia as $uprawnienium): ?>
				<tr>
					<td><?= $uprawnienium->has('konto') ? $this->Html->link($uprawnienium->konto->name, ['controller' => 'Konto', 'action' => 'view', $uprawnienium->konto->id_konto]) : '' ?></td>
					<td><?= $uprawnienium->has('podkategorium') ? $this->Html->link($uprawnienium->podkategorium->nazwa_podkategoria, ['controller' => 'Podkategoria', 'action' => 'view', $uprawnienium->podkategorium->id_podkategoria]) : '' ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $uprawnienium->id_uprawnienia],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $uprawnienium->id_uprawnienia], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $uprawnienium->id_uprawnienia)]) ?>
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
