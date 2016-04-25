<?php $this->Html->addCrumb($kategorium->nazwa_kategoria, '/kategoria/view/'.$kategorium->id_kategoria); ?>
<div>
	<div class="categoria-header">
		<h3><?= __($kategorium->nazwa_kategoria) ?></h3>
		<hr/>
	</div>
    <table class="category-table">
		<tr>
            <?php 
				$i=1; 
				foreach ($kategorium->podkategoria as $podkategorium):
					if($i==5)
					{
						echo "</tr><tr>";
						$i=1;
					}
					$i++;
				?>
                <td>
				<div class="category-div">
					<?= $this->Html->image('podkategoria/img_podkategoria/'.$podkategorium->dir_podkategoria.'/square_'.$podkategorium->img_podkategoria, ['fullBase' => true,'class' =>'category-image']); ?>
					<p class="category-name">
						<?= h($podkategorium->nazwa_podkategoria) ?>
					</p>
					<p class="category-description">
						<?= h($podkategorium->opis_podkategoria) ?>
					</p>
					<?= $this->Html->link(__('<button class="btn btn-info category-button">Pokaż</button>'), ['controller' => 'podkategoria', 'action' => 'view', $podkategorium->id_podkategoria], ['escape'=>false]) ?>
				</div>
				</td>
            <?php endforeach;?>
		</tr>
    </table>
</div>