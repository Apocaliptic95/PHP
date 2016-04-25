<?php $this->Html->addCrumb($zestaw->podkategorium->kategorium->nazwa_kategoria, '/kategoria/view/'.$zestaw->podkategorium->kategorium->id_kategoria); ?>
<?php $this->Html->addCrumb($zestaw->podkategorium->nazwa_podkategoria, '/podkategoria/view/'.$zestaw->podkategorium->id_podkategoria); ?>
<?php $this->Html->addCrumb($zestaw->nazwa_zestaw, '/zestaw/view/'.$zestaw->id_zestaw); ?>
<?php $this->Html->addCrumb('1 z 3', '/zestaw/alg3/'.$zestaw->id_zestaw.'/'.$type); ?>
<script>
var odpowiedzi=new Array();
var poprawne=new Array();
<?php $i=1; foreach($zestaw->zestawienie as $zestawienie): ?>
odpowiedzi[<?=$i?>] = "<?=md5(trim(($type == 1)? $zestawienie->tlumaczenie->slowo_two->nazwa_slowo : $zestawienie->tlumaczenie->slowo_one->nazwa_slowo))?>";  
poprawne[<?=$i?>] = 0;  
<?php $i++;?>
<?php endforeach; ?>

var poprawnie=0;
var i=1;
var max=<?=$i?>;
function Clicked(num)
{
	console.log(num);
	$("submit"+i).prop( "disabled", true );
	var value = $("#word_input"+i+"_"+num).val();
	console.log("#word_input"+i+"_"+num);
	console.log(value);
	var md5 = $.md5(value);		
	if(md5==odpowiedzi[i])
	{
		poprawnie++;
		poprawne[i]=1;
		$("#word"+i).css('background', '#5cb85c');
	}
	else
	{
		$("#word"+i).css('background', '#d9534f');
	}	
	setTimeout(function() 
	{
		$("#word"+i).hide();
		i++;
		$("#word"+i).show();
	},2000);	     
	if(i == max-1)
		$(".wynik").append("Twój wynik to: <b>"+Math.round(((poprawnie/(max-1))*100))+"%</b>");
}
</script>

<div>
  <div class="row col-md-10 col-md-offset-1">
           <?php $i=1;?>
           <?php foreach($zestaw->zestawienie as $zestawienie): ?> 
               <div class="panel panel-primary" id="word<?=$i;?>" <?php if($i==1) echo''; else echo'hidden="true"';?>>
                <div class="panel-heading">
                  Przetłumacz
                </div>
                <div class="panel-body text-center">
				<?php 
					$actual = $i-1;
					$one = 0;
					$two = 0;
					do
					{
						$one = rand(0,count($zestaw->zestawienie)-1);
					}
					while($one == $actual);
					do
					{
						$two = rand(0,count($zestaw->zestawienie)-1);
					}
					while($two == $actual || $two == $one);
					$ar = array($actual,$one,$two);
					shuffle($ar);
					echo '<p class="slowo-name-test">'.(($type == 1)? $zestawienie->tlumaczenie->slowo_one->nazwa_slowo : $zestawienie->tlumaczenie->slowo_two->nazwa_slowo).'</p>';
					echo '<input class="btn btn-info test-btn" id="word_input'.$i.'_1" type="submit" value="'.trim(($type == 1)? $zestaw->zestawienie[$ar[0]]->tlumaczenie->slowo_two->nazwa_slowo : $zestawienie->tlumaczenie->slowo_one->nazwa_slowo).'" id="submit<?=$i;?>" onClick="Clicked(1)" />';
					echo '<input class="btn btn-info test-btn" id="word_input'.$i.'_2" type="submit" value="'.trim(($type == 1)? $zestaw->zestawienie[$ar[1]]->tlumaczenie->slowo_two->nazwa_slowo : $zestawienie->tlumaczenie->slowo_one->nazwa_slowo).'" id="submit<?=$i;?>" onClick="Clicked(2)" />';
					echo '<input class="btn btn-info test-btn" id="word_input'.$i.'_3" type="submit" value="'.trim(($type == 1)? $zestaw->zestawienie[$ar[2]]->tlumaczenie->slowo_two->nazwa_slowo : $zestawienie->tlumaczenie->slowo_one->nazwa_slowo).'" id="submit<?=$i;?>" onClick="Clicked(3)" />';
				?>
                </div>
               </div>
            <?php $i++;?>
           <?php endforeach; ?>
               <div class="panel panel-primary" id="word<?=$i;?>" <?php if($i==1) echo''; else echo'hidden="true"';?>>
                <div class="panel-heading">
                  Przetłumacz
                </div>
                <div class="panel-body text-center">
                  <p class="wynik"></p>
                  <h2><?=$this->Html->link(__('To już koniec, wróć do zestawu'), ['action'=>'view', $zestaw->id_zestaw]);?></h2>
                </div>
               </div>
   </div>
</div>  