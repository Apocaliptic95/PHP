<div>
	<div class="categoria-header">
		<h3><?= __('Kategorie') ?></h3>
		<hr/>
	</div>
    <table class="category-table">
		<tr>
            <?php 
				$i=1; 
				foreach ($kategoria as $kategorium):
					if($i==5)
					{
						echo "</tr><tr>";
						$i=1;
					}
					$i++;
				?>
                <td>
				<div class="category-div">
					<?= $this->Html->image('kategoria/img_kategoria/'.$kategorium->dir_kategoria.'/square_'.$kategorium->img_kategoria, ['fullBase' => true,'class' =>'category-image']); ?>
					<p class="category-name">
						<?= h($kategorium->nazwa_kategoria) ?>
					</p>
					<p class="category-description">
						<?= h($kategorium->opis_kategoria) ?>
					</p>
					<?= $this->Html->link(__('<button class="btn btn-info category-button">Pokaż</button>'), ['controller' => 'kategoria', 'action' => 'view', $kategorium->id_kategoria], ['escape'=>false]) ?>
				</div>
				</td>
            <?php endforeach;?>
		</tr>
    </table>
</div>
