<?php $this->Html->addCrumb('Wyniki', '/wynik/index'); ?>
<script>
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Procent'],
		  <?php foreach($wyniki as $wynik)
		  {
			echo '["'.$wynik->zestaw->nazwa_zestaw.' '.$wynik->komentarz_wynik.'", '.$wynik->wynik_wynik.'],';
		  }
          ?>
        ]);

        var options = {
          width: 900,
          axes: {
            x: {
              0: { side: 'top', label: 'Wyniki'}
            }
          },
          bar: { groupWidth: "90%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>

<div>
    <h3><?= __('Wyniki') ?></h3>
	<div class="col-md-10 col-md-offset-1">
		<?php 
		if($wyniki->count() > 0)
			echo '<div id="top_x_div" style="width: 900px; height: 500px;"></div>';
		else
			echo '<p class="alert alert-warning">Brak Wyników.</p>';
		?>
	</div>
</div>
