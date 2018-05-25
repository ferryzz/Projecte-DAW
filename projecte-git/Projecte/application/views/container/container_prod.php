<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
/**
    * Vista que mostra la pagina principal amb uns productes
    * @author Julio
    */
?>

<div class="index-content">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#transition-timer-carousel" data-slide-to="1"></li>
						<li data-target="#transition-timer-carousel" data-slide-to="2"></li>
					</ol>

					<!-- Wrapper for slides -->
					<div class="carousel-inner fot">
						<div class="item active">
							<img  src="./assets/img/promo1.jpg" alt="promocio 1"/>
							 
						</div>
						
						<div class="item">
						   <img src="./assets/img/promo2.jpg" alt="promocio 2"/>
							 
						</div>
						
						<div class="item">
							<img   src="./assets/img/promo3.jpg" alt="promocio 3"/>
							 
						</div>
					</div>

					<!-- Controls -->
					<a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
					
					<!-- Timer "progress bar" -->
					<hr class="transition-timer-carousel-progress-bar animate" />
				</div>
				 
			</div>
		</div>
		<div class="row">
					<?php if(empty($productos)){echo 'No hi ha productes';} else{?>
					<?php foreach ($productos->result() as $row){?>
					 <a href="<?php echo site_url("welcome/detalle/".$row->id);?>">
						<div class="col-md-4">
							<div class="card">
								<img id="principal" src = "/Exercicis/projecte_santos_ferran/<?php echo $row->imagen?>" alt="<?php echo $row->imagen ?>"/>
								<h2 ><?php echo $row->nombre_corto;?></h2>
								<h3>Preu: <?php echo $row->precio;?> €</h3>
								<?php if(($row->stock)>0){
										echo "<h3 class='stocks'>Disponible</h3>";
								}else{
									echo "<h3 class='stocks'>No Disponible</h3>";
								}
									
								
								?>
								
								<a href="<?php echo site_url("welcome/detalle/".$row->id);?>" class="blue-button">Detall</a>
							</div>
						</div>	
					</a>
					<?php }?>
					<?php }?>
		</div>
	</div>
</div>