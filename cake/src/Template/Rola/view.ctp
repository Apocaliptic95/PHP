<?php $this->Html->addCrumb('Admin', '/rola/index'); ?>
<?php $this->Html->addCrumb('Role', '/rola/index'); ?>
<?php $this->Html->addCrumb('Podgląd Roli', '/rola/view/'.$rola->id_rola); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= h($rola->nazwa_rola) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th><?= __('Nazwa') ?></th>
            <td><?= h($rola->nazwa_rola) ?></td>
        </tr>
		<tr>
			<th><?= __('Opis') ?></th>
			<td><?= $this->Text->autoParagraph(h($rola->opis_rola)); ?></td>
		</tr>
	</table>
    </div>
    <div class="related">
        <h4><?= __('Konta') ?></h4>
        <?php if (!empty($rola->konto)): ?>
        <table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= __('Imię') ?></th>
					<th><?= __('Nazwisko') ?></th>
					<th><?= __('Email') ?></th>
					<th><?= __('Login') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
            <?php foreach ($rola->konto as $konto): ?>
            <tr>
                <td><?= h($konto->imie_konto) ?></td>
                <td><?= h($konto->nazwisko_konto) ?></td>
                <td><?= h($konto->email_konto) ?></td>
                <td><?= h($konto->login_konto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['controller' => 'Konto', 'action' => 'view', $konto->id_konto],['escape' => false]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Konto', 'action' => 'edit', $konto->id_konto],['escape' => false]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['controller' => 'Konto', 'action' => 'delete', $konto->id_konto], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $konto->id_konto)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		<?php else :?>
			<div class="alert alert-warning" role="alert"><h4>Brak Kont</h4></div>
        <?php endif; ?>
    </div>
</div>
