<div class="wynik view large-9 medium-8 columns content"><?= $this->Flash->render() ?>
    <h3><?= h($wynik->id_wynik) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Konto') ?></th>
            <td><?= $wynik->has('konto') ? $this->Html->link($wynik->konto->id_konto, ['controller' => 'Konto', 'action' => 'view', $wynik->konto->id_konto]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Zestaw') ?></th>
            <td><?= $wynik->has('zestaw') ? $this->Html->link($wynik->zestaw->id_zestaw, ['controller' => 'Zestaw', 'action' => 'view', $wynik->zestaw->id_zestaw]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id Wynik') ?></th>
            <td><?= $this->Number->format($wynik->id_wynik) ?></td>
        </tr>
        <tr>
            <th><?= __('Wynik Wynik') ?></th>
            <td><?= $this->Number->format($wynik->wynik_wynik) ?></td>
        </tr>
        <tr>
            <th><?= __('Data Wynik') ?></th>
            <td><?= h($wynik->data_wynik) ?></td>
        </tr>
    </table>
</div>
