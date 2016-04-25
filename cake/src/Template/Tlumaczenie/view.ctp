<?= $this->Flash->render() ?>
<div class="tlumaczenie view large-9 medium-8 columns content">
    <h3><?= h($tlumaczenie->id_tlumaczenie) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id Tlumaczenie') ?></th>
            <td><?= $this->Number->format($tlumaczenie->id_tlumaczenie) ?></td>
        </tr>
        <tr>
            <th><?= __('Slowo Id One') ?></th>
            <td><?= $this->Number->format($tlumaczenie->slowo_id_one) ?></td>
        </tr>
        <tr>
            <th><?= __('Slowo Id Two') ?></th>
            <td><?= $this->Number->format($tlumaczenie->slowo_id_two) ?></td>
        </tr>
    </table>
</div>
