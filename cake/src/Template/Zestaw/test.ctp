<?php $this->Html->addCrumb($zestaw->podkategorium->kategorium->nazwa_kategoria, '/kategoria/view/'.$zestaw->podkategorium->kategorium->id_kategoria); ?>
<?php $this->Html->addCrumb($zestaw->podkategorium->nazwa_podkategoria, '/podkategoria/view/'.$zestaw->podkategorium->id_podkategoria); ?>
<?php $this->Html->addCrumb($zestaw->nazwa_zestaw, '/zestaw/view/'.$zestaw->id_zestaw); ?>
<?php $this->Html->addCrumb('Test', '/zestaw/test/'.$zestaw->id_zestaw.'/'.$type); ?>
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
	{
		$(".wynik").append("Twój wynik to: <b>"+Math.round(((poprawnie/(max-1))*100))+"%</b>");
		<?php 
		$user_id = $this->request->session()->read('Konto.id_konto');
		if($user_id != '' && $user_id != null && $user_id > 0)
			echo '$.post("'.
				$this->url->build(['controller'=>'wynik','action'=>'add']).
				'", { konto_id:'.$user_id.', zestaw_id:'.$zestaw->id_zestaw.
				', wynik_wynik: Math.round(((poprawnie/(max-1))*100)), komentarz_wynik:"'.
				(($type == 1)? $zestaw->jezyk_one->nazwa_jezyk.' - '.$zestaw->jezyk_two->nazwa_jezyk : $zestaw->jezyk_two->nazwa_jezyk.' - '.$zestaw->jezyk_one->nazwa_jezyk).
				'"} );';
		?>
	}
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
                  <h2><?=$this->Html->link(__('To już koniec, wróć do podkategorii'), ['controller'=>'podkategoria','action'=>'view', $zestaw->podkategorium->id_podkategoria]);?></h2>
                </div>
               </div>
   </div>
</div>  