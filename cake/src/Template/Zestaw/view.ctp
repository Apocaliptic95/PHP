<?php $this->Html->addCrumb($zestaw->podkategorium->kategorium->nazwa_kategoria, '/kategoria/view/'.$zestaw->podkategorium->kategorium->id_kategoria); ?>
<?php $this->Html->addCrumb($zestaw->podkategorium->nazwa_podkategoria, '/podkategoria/view/'.$zestaw->podkategorium->id_podkategoria); ?>
<?php $this->Html->addCrumb($zestaw->nazwa_zestaw, '/zestaw/view/'.$zestaw->id_zestaw); ?>
<div>
    <h3><?= h($zestaw->nazwa_zestaw) ?></h3>
	<hr/>
	<div class="row col-md-10 col-md-offset-1 all-div">
		<div class="alg-div">
			<p class="alg-name"><?= $zestaw->jezyk_one->nazwa_jezyk.' - '.$zestaw->jezyk_two->nazwa_jezyk ?></p>
			<?= $this->Html->link('<button class="btn btn-success zestaw-button">Do bólu</button>',['controller'=>'zestaw','action'=>'alg1',$zestaw->id_zestaw],['escape'=>false]) ?>
			<?= $this->Html->link('<button class="btn btn-warning zestaw-button">Mini Test</button>',['controller'=>'zestaw','action'=>'alg2',$zestaw->id_zestaw],['escape'=>false]) ?>
		</div>
		<div class="alg-div">
			<p class="alg-name">1 z 3</p>
			<?= $this->Html->link('<button class="btn btn-success zestaw-button">'.$zestaw->jezyk_one->nazwa_jezyk.' - '.$zestaw->jezyk_two->nazwa_jezyk.'</button>',['controller'=>'zestaw','action'=>'alg3',$zestaw->id_zestaw,1],['escape'=>false]) ?>
			<?= $this->Html->link('<button class="btn btn-warning zestaw-button">'.$zestaw->jezyk_two->nazwa_jezyk.' - '.$zestaw->jezyk_one->nazwa_jezyk.'</button>',['controller'=>'zestaw','action'=>'alg3',$zestaw->id_zestaw,2],['escape'=>false]) ?>
		</div>
		<div class="alg-div">
			<p class="alg-name"><?= $zestaw->jezyk_two->nazwa_jezyk.' - '.$zestaw->jezyk_one->nazwa_jezyk ?></p>
			<?= $this->Html->link('<button class="btn btn-success zestaw-button">Do bólu</button>',['controller'=>'zestaw','action'=>'alg1',$zestaw->id_zestaw,2],['escape'=>false]) ?>
			<?= $this->Html->link('<button class="btn btn-warning zestaw-button">Mini Test</button>',['controller'=>'zestaw','action'=>'alg2',$zestaw->id_zestaw,2],['escape'=>false]) ?>
		</div>
	</div>
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-striped table-bordered">
            <?php foreach ($zestaw->zestawienie as $zestawienie): ?>
            <tr>
                <td class="center-cell"><?= ($zestawienie->tlumaczenie->slowo_one->jezyk_id == $zestaw->jezyk_id_one)? $zestawienie->tlumaczenie->slowo_one->nazwa_slowo : $zestawienie->tlumaczenie->slowo_two->nazwa_slowo ?></td>
				<td class="center-cell"><?= ($zestawienie->tlumaczenie->slowo_two->jezyk_id != $zestaw->jezyk_id_two)? $zestawienie->tlumaczenie->slowo_one->nazwa_slowo : $zestawienie->tlumaczenie->slowo_two->nazwa_slowo?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
