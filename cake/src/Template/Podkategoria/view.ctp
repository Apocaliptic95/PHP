<?php $this->Html->addCrumb($podkategorium->kategorium->nazwa_kategoria, '/kategoria/view/'.$podkategorium->kategorium->id_kategoria); ?>
<?php $this->Html->addCrumb($podkategorium->nazwa_podkategoria, '/podkategoria/view/'.$podkategorium->id_podkategoria); ?>

<div>
    <h3><?= h($podkategorium->nazwa_podkategoria) ?></h3>
	<hr/>
    <table class="category-table">
        <tr>
            <?php 
				$i=1; 
				foreach ($podkategorium->zestaw as $zestaw)
				{
					if($zestaw->prywatny_zestaw != true || ($zestaw->konto_id != null && $zestaw->konto_id == $konto_id))
					{
						if($i==5)
						{
							echo "</tr><tr>";
							$i=1;
						}
						$i++;
						echo '<td>';
						echo '<div class="zestaw-div">';
						echo '<p class="zestaw-name">'.$zestaw->nazwa_zestaw.'</p>';
						echo '<p class="zestaw-language">'.$zestaw->jezyk_one->nazwa_jezyk.' , '.$zestaw->jezyk_two->nazwa_jezyk.'</p>';
						echo '<p class="zestaw-author">Autor: '.$zestaw->konto->name.'</p>';
						echo '<p class="zestaw-words">Ilość słówek: '.$zestaw->ilosc_slowek_zestaw.'</p>';
						echo $this->Html->link('<button class="btn btn-info zestaw-button">Tryb nauki</button>',['controller'=>'zestaw','action'=>'view',$zestaw->id_zestaw],['escape'=>false]);
						echo '<p class="zestaw-test">Test</p>';
						echo $this->Html->link('<button class="btn btn-success zestaw-button">'.$zestaw->jezyk_one->nazwa_jezyk.' - '.$zestaw->jezyk_two->nazwa_jezyk.'</button>',['controller'=>'zestaw','action'=>'test',$zestaw->id_zestaw],['escape'=>false]);
						echo $this->Html->link('<button class="btn btn-success zestaw-button">'.$zestaw->jezyk_two->nazwa_jezyk.' - '.$zestaw->jezyk_one->nazwa_jezyk.'</button>',['controller'=>'zestaw','action'=>'test',$zestaw->id_zestaw,2],['escape'=>false]);
						echo '</div>';
						echo '</td>';
					}
				}
            ?>
		</tr>
    </table>
</div>
