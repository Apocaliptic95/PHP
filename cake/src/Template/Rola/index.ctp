<?php $this->Html->addCrumb('Admin', '/rola/index'); ?>
<?php $this->Html->addCrumb('Role', '/rola/index'); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= __('Role') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Rolę</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('nazwa_rola','Nazwa') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($rola as $rola): ?>
				<tr>
					<td><?= h($rola->nazwa_rola) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['action' => 'view', $rola->id_rola],['escape' => false]) ?>
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $rola->id_rola],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $rola->id_rola], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $rola->id_rola)]) ?>
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
