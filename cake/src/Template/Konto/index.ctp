<?php $this->Html->addCrumb('Admin', '/konto/index'); ?>
<?php $this->Html->addCrumb('Konta', '/konto/index'); ?>

<div class="konto index large-9 medium-8 columns content"><?= $this->Flash->render() ?>
    <h3><?= __('Konta') ?></h3>
	<div class="col-md-10 col-md-offset-1">
    <table class="table table-striped table-bordered">
        <thead>
            <tr class="bg-primary">
                <th><?= $this->Paginator->sort('rola_id','Rola') ?></th>
                <th><?= $this->Paginator->sort('imie_konto','Imię') ?></th>
                <th><?= $this->Paginator->sort('nazwisko_konto','Nazwisko') ?></th>
                <th><?= $this->Paginator->sort('email_konto','Email') ?></th>
                <th><?= $this->Paginator->sort('login_konto','Login') ?></th>
                <th class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($konto as $konto): ?>
            <tr>
                <td><?= $konto->has('rola') ? $this->Html->link($konto->rola->nazwa_rola, ['controller' => 'Rola', 'action' => 'view', $konto->rola->id_rola]) : '' ?></td>
                <td><?= h($konto->imie_konto) ?></td>
                <td><?= h($konto->nazwisko_konto) ?></td>
                <td><?= h($konto->email_konto) ?></td>
                <td><?= h($konto->login_konto) ?></td>
				<td class="actions">
					<?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['action' => 'view', $konto->id_konto],['escape' => false]) ?>
					<?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['action' => 'edit', $konto->id_konto],['escape' => false]) ?>
					<?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['action' => 'delete', $konto->id_konto], ['escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $konto->id_konto)]) ?>
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
