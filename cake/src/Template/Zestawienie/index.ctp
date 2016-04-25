<?php $this->Html->addCrumb('Admin', '/zestawienie/index'); ?>
<?php $this->Html->addCrumb('Zestawienia', '/zestawienie/index'); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= __('Zestawienia') ?></h3>
	<div class="add-button col-md-4 col-md-offset-4">
		<?= $this->Html->link(__('<button class="btn btn-success">Dodaj Zestawienie</button>'), ['action' => 'add'],['escape' => false]) ?>
	</div>
	<div class="col-md-10 col-md-offset-1">
		<table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= $this->Paginator->sort('tlumaczenie_id','Tłumaczenie') ?></th>
					<th><?= $this->Paginator->sort('zestaw_id','Zestaw') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($zestawienie as $zestawienie): ?>
				<tr>
					<td><?= $zestawienie->has('tlumaczenie') ? $this->Html->link($zestawienie->tlumaczenie->slowo_one->nazwa_slowo.'-'.$zestawienie->tlumaczenie->slowo_two->nazwa_slowo, ['controller' => 'Tlumaczenie', 'action' => 'view', $zestawienie->tlumaczenie->slowo_id_one]) : '' ?></td>
					<td><?= $zestawienie->has('zestaw') ? $this->Html->link($zestawienie->zestaw->nazwa_zestaw, ['controller' => 'Zestaw', 'action' => 'view', $zestawienie->zestaw->id_zestaw]) : '' ?></td>
					<td class="actions">
						<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $zestawienie->id_zestawienie],['escape' => false]) ?>
						<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $zestawienie->id_zestawienie], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $zestawienie->id_zestawienie)]) ?>
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
