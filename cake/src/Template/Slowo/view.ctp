<?php $this->Html->addCrumb('Admin', '/slowo/index'); ?>
<?php $this->Html->addCrumb('Słowa', '/slowo/index'); ?>
<?php $this->Html->addCrumb('Podgląd Słowa', '/slowo/index/view/'.$slowo->id_slowo); ?>
<div><?= $this->Flash->render() ?>
    <h3><?= h($slowo->nazwa_slowo) ?></h3>
    <table class="table table-striped table-bordered">
        <tr>
            <th><?= __('Jezyk') ?></th>
            <td><?= $slowo->has('jezyk') ? $this->Html->link($slowo->jezyk->nazwa_jezyk, ['controller' => 'Jezyk', 'action' => 'view', $slowo->jezyk->id_jezyk]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Słowo') ?></th>
            <td><?= h($slowo->nazwa_slowo) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Zestawy') ?></h4>
        <?php if (!empty($slowo->zestawienie)): ?>
        <table class="table table-striped table-bordered">
			<thead>
				<tr class="bg-primary">
					<th><?= __('Zestaw') ?></th>
					<th class="actions"><?= __('') ?></th>
				</tr>
			</thead>
            <?php foreach ($slowo->zestawienie as $zestawienie): ?>
            <tr>
                <td><?= h($zestawienie->zestaw->nazwa_zestaw) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), ['controller' => 'Zestawienie', 'action' => 'view', $zestawienie->id_zestawienie],['escape' => false]) ?>
                    <?= $this->Html->link(__('<span class="glyphicon glyphicon-pencil"></span>'), ['controller' => 'Zestawienie', 'action' => 'edit', $zestawienie->id_zestawienie],['escape' => false]) ?>
                    <?= $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), ['controller' => 'Zestawienie', 'action' => 'delete', $zestawienie->id_zestawienie], ['escape' => false,'confirm' => __('Are you sure you want to delete # {0}?', $zestawienie->id_zestawienie)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
		<?php else :?>
			<div class="alert alert-warning" role="alert"><h4>Brak Zestawów</h4></div>
        <?php endif; ?>
    </div>
</div>
