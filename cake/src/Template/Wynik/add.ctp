<div class="wynik form large-9 medium-8 columns content"><?= $this->Flash->render() ?>
    <?= $this->Form->create($wynik) ?>
    <fieldset>
        <legend><?= __('Add Wynik') ?></legend>
        <?php
            echo $this->Form->input('konto_id', ['options' => $konto]);
            echo $this->Form->input('zestaw_id', ['options' => $zestaw]);
            echo $this->Form->input('wynik_wynik');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
