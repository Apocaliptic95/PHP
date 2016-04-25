<?php $this->Html->addCrumb('Admin', '/jezyk/index'); ?>
<?php $this->Html->addCrumb('Języki', '/jezyk/index'); ?>
<?php $this->Html->addCrumb('Podgląd Języka', '/jezyk/view/'.$jezyk->id_jezyk); ?>

<div><?= $this->Flash->render() ?>
    <h3><?= h($jezyk->nazwa_jezyk) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th><?= __('Nazwa') ?></th>
            <td><?= h($jezyk->nazwa_jezyk) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Słowa') ?></h4>
        <?php if (!empty($jezyk->slowo)): ?>
        <table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= __('Słowo') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
            <?php foreach ($jezyk->slowo as $slowo): ?>
            <tr>
                <td><?= h($slowo->nazwa_slowo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['controller' => 'Slowo', 'action' => 'view', $slowo->id_slowo],['escape' => false]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Slowo', 'action' => 'edit', $slowo->id_slowo],['escape' => false]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['controller' => 'Slowo', 'action' => 'delete', $slowo->id_slowo], ['escape' => false,'confirm' => __('Czy jesteś pewien że chcesz usunąć {0}?', $slowo->nazwa_slowo)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		<?php else :?>
			<div class="alert alert-warning" role="alert"><h4>Brak Słówek</h4></div>
        <?php endif; ?>
    </div>
</div>
