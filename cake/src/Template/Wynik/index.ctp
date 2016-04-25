<?php $this->Html->addCrumb('Admin', '/wynik/index'); ?>
<?php $this->Html->addCrumb('Wyniki', '/wynik/index'); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= __('Wyniki') ?></h3>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('konto_id','Konto') ?></th>
					<th><?= $this->Paginator->sort('zestaw_id','Zestaw') ?></th>
					<th><?= $this->Paginator->sort('data_wynik','Data') ?></th>
					<th><?= $this->Paginator->sort('wynik_wynik','Wynik') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($wynik as $wynik): ?>
				<tr>
					<td><?= $wynik->has('konto') ? $this->Html->link($wynik->konto->name, ['controller' => 'Konto', 'action' => 'view', $wynik->konto->id_konto]) : '' ?></td>
					<td><?= $wynik->has('zestaw') ? $this->Html->link($wynik->zestaw->nazwa_zestaw, ['controller' => 'Zestaw', 'action' => 'view', $wynik->zestaw->id_zestaw]) : '' ?></td>
					<td><?= h($wynik->data_wynik) ?></td>
					<td><?= $this->Number->format($wynik->wynik_wynik) ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $wynik->id_wynik],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $wynik->id_wynik], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $wynik->id_wynik)]) ?>
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
