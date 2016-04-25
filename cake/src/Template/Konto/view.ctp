<?php $this->Html->addCrumb('Admin', '/konto/index'); ?>
<?php $this->Html->addCrumb('Konta', '/konto/index'); ?>
<?php $this->Html->addCrumb('Podgląd Konta', '/konto/view/'.$konto->id_konto); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= h($konto->name) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th><?= __('Rola') ?></th>
            <td><?= $konto->has('rola') ? $this->Html->link($konto->rola->nazwa_rola, ['controller' => 'Rola', 'action' => 'view', $konto->rola->id_rola]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Imię') ?></th>
            <td><?= h($konto->imie_konto) ?></td>
        </tr>
        <tr>
            <th><?= __('Nazwisko') ?></th>
            <td><?= h($konto->nazwisko_konto) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($konto->email_konto) ?></td>
        </tr>
        <tr>
            <th><?= __('Login') ?></th>
            <td><?= h($konto->login_konto) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Uprawnienia') ?></h4>
        <?php if (!empty($konto->uprawnienia)): ?>
        <table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= __('Podkategoria') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
            <?php foreach ($konto->uprawnienia as $uprawnienia): ?>
            <tr>
                <td><?= h($uprawnienia->podkategorium->nazwa_podkategoria) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Uprawnienia', 'action' => 'edit', $uprawnienia->id_uprawnienia],['escape' => false]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['controller' => 'Uprawnienia', 'action' => 'delete', $uprawnienia->id_uprawnienia], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $uprawnienia->id_uprawnienia)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		<?php else :?>
			<div class="alert alert-warning" role="alert"><h4>Brak Uprawnień</h4></div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Wyniki') ?></h4>
        <?php if (!empty($konto->wynik)): ?>
        <table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= __('Zestaw') ?></th>
					<th><?= __('Data') ?></th>
					<th><?= __('Wynik') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
            <?php foreach ($konto->wynik as $wynik): ?>
            <tr>
                <td><?= h($wynik->zestaw->nazwa_zestaw) ?></td>
                <td><?= h($wynik->data_wynik) ?></td>
                <td><?= h($wynik->wynik_wynik) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Wynik', 'action' => 'edit', $wynik->id_wynik],['escape' => false]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['controller' => 'Wynik', 'action' => 'delete', $wynik->id_wynik], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $wynik->id_wynik)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		<?php else :?>
			<div class="alert alert-warning" role="alert"><h4>Brak Wyników</h4></div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Zestawy') ?></h4>
        <?php if (!empty($konto->zestaw)): ?>
        <table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= __('Język Bazowy') ?></th>
					<th><?= __('Język Docelowy') ?></th>
					<th><?= __('Podkategoria') ?></th>
					<th><?= __('Nazwa') ?></th>
					<th><?= __('Prywatny Zestaw') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
            <?php foreach ($konto->zestaw as $zestaw): ?>
            <tr>
                <td><?= h($zestaw->jezyk_one->nazwa_jezyk) ?></td>
                <td><?= h($zestaw->jezyk_two->nazwa_jezyk) ?></td>
                <td><?= h($zestaw->podkategorium->nazwa_podkategoria) ?></td>
                <td><?= h($zestaw->nazwa_zestaw) ?></td>
                <td><?= $zestaw->prywatny_zestaw ? __('Tak') : __('Nie'); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['controller' => 'Zestaw', 'action' => 'view', $zestaw->id_zestaw],['escape' => false]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Zestaw', 'action' => 'edit', $zestaw->id_zestaw],['escape' => false]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['controller' => 'Zestaw', 'action' => 'delete', $zestaw->id_zestaw], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $zestaw->id_zestaw)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		<?php else :?>
			<div class="alert alert-warning" role="alert"><h4>Brak Zestawów</h4></div>
        <?php endif; ?>
    </div>
</div>
