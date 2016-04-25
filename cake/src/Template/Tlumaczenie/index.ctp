<?php $this->Html->addCrumb('Admin', '/tlumaczenie/index'); ?>
<?php $this->Html->addCrumb('Tłumaczenia', '/tlumaczenie/index'); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= __('Tłumaczenia') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Tłumaczenie</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('slowo_id_one','Słowo Bazowe') ?></th>
					<th>Język</th>
					<th><?= $this->Paginator->sort('slowo_id_two','Słowo Docelowe') ?></th>
					<th>Język</th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tlumaczenie as $tlumaczenie): ?>
				<tr>
					<td><?= $tlumaczenie->has('slowo_one') ? $this->Html->link($tlumaczenie->slowo_one->nazwa_slowo, ['controller' => 'Slowo', 'action' => 'view', $tlumaczenie->slowo_one->id_slowo]) : '0' ?></td>
					<td><?= $tlumaczenie->has('slowo_one') ? $this->Html->link($tlumaczenie->slowo_one->jezyk->nazwa_jezyk, ['controller' => 'Jezyk', 'action' => 'view', $tlumaczenie->slowo_one->jezyk->id_jezyk]) : '0' ?></td>
					<td><?= $tlumaczenie->has('slowo_two') ? $this->Html->link($tlumaczenie->slowo_two->nazwa_slowo, ['controller' => 'Slowo', 'action' => 'view', $tlumaczenie->slowo_two->id_slowo]) : '0' ?></td>
					<td><?= $tlumaczenie->has('slowo_two') ? $this->Html->link($tlumaczenie->slowo_two->jezyk->nazwa_jezyk, ['controller' => 'Jezyk', 'action' => 'view', $tlumaczenie->slowo_two->jezyk->id_jezyk]) : '0' ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $tlumaczenie->id_tlumaczenie],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $tlumaczenie->id_tlumaczenie], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $tlumaczenie->id_tlumaczenie)]) ?>
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
