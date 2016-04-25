<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Akcje') ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Zestaw'), ['controller' => 'Zestaw', 'action' => 'index']) ?></li>
        <li class="panel-heading"><?= $this->Html->link(__('Konto'), ['controller' => 'Konto', 'action' => 'index']) ?></li>
        <li class="panel-heading"><?= $this->Html->link(__('Kategoria'), ['controller' => 'Kategoria', 'action' => 'index']) ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Podkategoria'), ['controller' => 'Podkategoria', 'action' => 'index']) ?></li>
		<li class="sub"><?= $this->Html->link(__('Nowa Podkategoria'), ['action' => 'add']) ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Uprawnienia'), ['controller' => 'Uprawnienia', 'action' => 'index']) ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Język'), ['controller' => 'Jezyk', 'action' => 'index']) ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Rola'), ['controller' => 'Rola', 'action' => 'index']) ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Słowo'), ['controller' => 'Slowo', 'action' => 'index']) ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Zestawienia'), ['controller' => 'Zestawienie', 'action' => 'index']) ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Wynik'), ['controller' => 'Wynik', 'action' => 'index']) ?></li>
		<li class="panel-heading"><?= $this->Html->link(__('Tłumaczenia'), ['controller' => 'Tlumaczenie', 'action' => 'index']) ?></li>
		
    </ul>
</nav>
<div class="podkategoria index large-9 medium-8 columns content">
    <h3><?= __('Podkategoria') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('kategoria_id','Kategoria') ?></th>
                <th><?= $this->Paginator->sort('nazwa_podkategoria','Nazwa') ?></th>
                <th><?= $this->Paginator->sort('obrazek_podkategoria','Obrazek') ?></th>
                <th class="actions"><?= __('') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($podkategoria as $podkategorium): ?>
            <tr>
                <td><?= $podkategorium->has('kategorium') ? $this->Html->link($podkategorium->kategorium->nazwa_kategoria, ['controller' => 'Kategoria', 'action' => 'view', $podkategorium->kategorium->id_kategoria]) : '' ?></td>
                <td><?= h($podkategorium->nazwa_podkategoria) ?></td>
                <td><?= h($podkategorium->obrazek_podkategoria) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Pokaż'), ['action' => 'view', $podkategorium->id_podkategoria]) ?>
                    <?= $this->Html->link(__('Edytuj'), ['action' => 'edit', $podkategorium->id_podkategoria]) ?>
                    <?= $this->Form->postLink(__('Usuń'), ['action' => 'delete', $podkategorium->id_podkategoria], ['confirm' => __('Are you sure you want to delete # {0}?', $podkategorium->id_podkategoria)]) ?>
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
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
