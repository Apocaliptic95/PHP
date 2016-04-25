<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Platforma Językowa';
$imie_konto = $this->request->session()->read('Konto.imie_konto');
$nazwisko_konto = $this->request->session()->read('Konto.nazwisko_konto');
$rola_id = $this->request->session()->read('Konto.rola_id');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<?= $this->Html->meta ( 'favicon2.ico', '/favicon2.ico', array ('type' => 'icon')); ?>
	<?= $this->Html->script('jquery.min.js') ?>
	<?= $this->Html->script('bootstrap.js') ?>
	<?= $this->Html->script('jquery.md5.js') ?>
	<?= $this->Html->css('bootstrap.css') ?>
	<?= $this->Html->css('added.css') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?= $this->Flash->render() ?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?=$this->url->build(['controller'=>'kategoria','action'=>'index'])?>"><span class="glyphicon glyphicon-education"></span> <?= $cakeDescription ?></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a href="<?=$this->url->build(['controller'=>'kategoria','action'=>'index'])?>" ><span class="glyphicon glyphicon-th-list"></span> Kategorie</a>
					</li>
					<?php
					if($rola_id != null && $rola_id != ''):
						echo '<li class="dropdown">';
							echo $this->Html->link('<span class="glyphicon glyphicon-signal"></span> Wyniki', ['controller' => 'Wynik', 'action' => 'own'],['escape'=>false]);
						echo '</li>';
						echo '<li class="dropdown">';
						echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-pencil"></span><span class="glyphicon glyphicon-wrench"></span> Operacje <span class="caret"></span></a>';
						echo '<ul class="dropdown-menu">';
							echo '<li role="separator" class="divider"></li>';
							echo '<li class="dropdown-header"><span class="glyphicon glyphicon-user"></span> Użytkownik</li>';
							echo '<li>'.$this->Html->link(__('Utwórz Prywatny Zestaw'), ['controller' => 'Zestaw', 'action' => 'add']).'</li>';
							echo '<li>'.$this->Html->link(__('Edytuj Zestawy'), ['controller' => 'Zestaw', 'action' => 'index']).'</li>';
							if($rola_id > 1):
								echo '<li role="separator" class="divider"></li>';
								echo '<li class="dropdown-header"><span class="glyphicon glyphicon-pencil"></span> Redaktor</li>';
							    echo '<li>'.$this->Html->link(__('Utwórz Publiczny Zestaw'), ['controller' => 'Zestaw', 'action' => 'add']).'</li>';
								endif;
							if($rola_id === 4):
								echo '<li role="separator" class="divider"></li>';
								echo '<li class="dropdown-header"><span class="glyphicon glyphicon-wrench"></span> Administrator</li>';
								echo '<li>'.$this->Html->link(__('Konta'), ['controller' => 'Konto', 'action' => 'index']).'</li>';
								echo '<li>'.$this->Html->link(__('Kategorie'), ['controller' => 'Kategoria', 'action' => 'indexAdmin']).'</li>';
								echo '<li>'.$this->Html->link(__('Podkategorie'), ['controller' => 'Podkategoria', 'action' => 'indexAdmin']).'</li>';
								echo '<li>'.$this->Html->link(__('Uprawnienia'), ['controller' => 'Uprawnienia', 'action' => 'index']).'</li>';
								echo '<li>'.$this->Html->link(__('Języki'), ['controller' => 'Jezyk', 'action' => 'index']).'</li>';
								echo '<li>'.$this->Html->link(__('Role'), ['controller' => 'Rola', 'action' => 'index']).'</li>';
								echo '<li>'.$this->Html->link(__('Słowa'), ['controller' => 'Slowo', 'action' => 'index']).'</li>';
								echo '<li>'.$this->Html->link(__('Zestawienia'), ['controller' => 'Zestawienie', 'action' => 'index']).'</li>';
								echo '<li>'.$this->Html->link(__('Wyniki'), ['controller' => 'Wynik', 'action' => 'index']).'</li>';				
								echo '<li>'.$this->Html->link(__('Tłumaczenia'), ['controller' => 'Tlumaczenie', 'action' => 'index']).'</li>';
								endif;
						echo '</ul>';
					    echo '</li>';
					endif;
					?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php 
						if($rola_id == ''):
							echo '<li class="align-right">'.$this->Html->link('<span class="glyphicon glyphicon-user"></span> Zaloguj', ['controller' => 'Konto', 'action' => 'login'], ['escape'=>false]).'</li>';
							echo '<li>'.$this->Html->link('<span class="glyphicon glyphicon-plus"></span> Załóż Konto', ['controller' => 'Konto', 'action' => 'add'], ['escape'=>false]).'</li>';
						elseif($rola_id > 0):
							echo '<li class="align-right">'.$this->Html->link('<span class="glyphicon glyphicon-user"></span> Wyloguj'.' ('.$imie_konto.' '.$nazwisko_konto.')', ['controller' => 'Konto', 'action' => 'logout'], ['escape'=>false]).'</li>';
						endif;
					?>
				</ul>
			</div>
		</div>
	</nav>
    <div class="container-fluid col-md-10 col-md-offset-1">
		<?= $this->Html->getCrumbList(
		[
			'firstClass' => true,
			'lastClass' => 'active',
			'class' => 'breadcrumb',
			'escape' => false
		],
		$this->Html->tag('span','',['class' => 'glyphicon glyphicon-home']).' Strona Główna'
		); 
	?>
        <?= $this->fetch('content') ?>
    </div>
    <footer class="footer navbar-fixed-bottom">
    </footer>
</body>
</html>
