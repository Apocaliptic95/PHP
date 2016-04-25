<?php $this->Html->addCrumb('Admin', '/jezyk/index'); ?>
<?php $this->Html->addCrumb('Języki', '/jezyk/index'); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= __('Języki') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Język</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('nazwa_jezyk','Język') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($jezyk as $jezyk): ?>
				<tr>
					<td><?= h($jezyk->nazwa_jezyk) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['action' => 'view', $jezyk->id_jezyk],['escape'=>false]) ?>
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $jezyk->id_jezyk],['escape'=>false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $jezyk->id_jezyk], ['escape'=>false,'confirm' => __('Are you sure you want to delete # {0}?', $jezyk->id_jezyk)]) ?>
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
