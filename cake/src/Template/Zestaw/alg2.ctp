<?php $this->Html->addCrumb($zestaw->podkategorium->kategorium->nazwa_kategoria, '/kategoria/view/'.$zestaw->podkategorium->kategorium->id_kategoria); ?>
<?php $this->Html->addCrumb($zestaw->podkategorium->nazwa_podkategoria, '/podkategoria/view/'.$zestaw->podkategorium->id_podkategoria); ?>
<?php $this->Html->addCrumb($zestaw->nazwa_zestaw, '/zestaw/view/'.$zestaw->id_zestaw); ?>
<?php $this->Html->addCrumb('Mini Test', '/zestaw/alg2/'.$zestaw->id_zestaw.'/'.$type); ?>
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
function Clicked()
{
	$("submit"+i).prop( "disabled", true );
	var value = $("#word_input"+i).val();
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
                <?=($type == 1)? $zestawienie->tlumaczenie->slowo_one->nazwa_slowo : $zestawienie->tlumaczenie->slowo_two->nazwa_slowo;?> : <input id="word_input<?=$i;?>" /> <input type="submit" value="Sprawdź" id="submit<?=$i;?>" onClick="Clicked()" />
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