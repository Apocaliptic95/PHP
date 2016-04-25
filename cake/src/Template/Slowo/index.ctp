<?php $this->Html->addCrumb('Admin', '/slowo/index'); ?>
<?php $this->Html->addCrumb('Słowa', '/slowo/index'); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= __('Słowa') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Słowo</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('jezyk_id','Jezyk') ?></th>
					<th><?= $this->Paginator->sort('nazwa_slowo','Słowo') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($slowo as $slowo): ?>
				<tr>
					<td><?= $slowo->has('jezyk') ? $this->Html->link($slowo->jezyk->nazwa_jezyk, ['controller' => 'Jezyk', 'action' => 'view', $slowo->jezyk->id_jezyk]) : '' ?></td>
					<td><?= h($slowo->nazwa_slowo) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['action' => 'view', $slowo->id_slowo],['escape' => false]) ?>
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $slowo->id_slowo],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $slowo->id_slowo], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $slowo->id_slowo)]) ?>
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="paginator">
			<ul class="pagination">
				<?= $this->Paginator->prev('< ' . __('Poprzedni')) ?>
				<?= $this->Paginator->numbers() ?>
				<?= $this->Paginator->next(__('Następny') . ' >') ?>
			</ul>
		</div>
	</div>
</div>
