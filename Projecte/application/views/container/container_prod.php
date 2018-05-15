<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="index-content">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div id="Carrousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#Carrousel" data-slide-to="0" class="active"></li>
						<li data-target="#Carrousel" data-slide-to="1"></li>
						<li data-target="#Carrousel" data-slide-to="2"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img src="./assets/img/promo1.jpg" alt="img1">
						</div>

						<div class="item">
							<img src="./assets/img/promo2.jpg" alt="img2">
						</div>

						<div class="item">
							<img src="./assets/img/promo3.jpg" alt="img3">
						</div>
					</div>
					<a class="left carousel-control" href="#Carrousel" role="button" data-slide="prev">
						<span class="left-arrow" aria-hidden="true"><i class="glyphicon glyphicon-arrow-left"></i></span>
						<span class="sr-only">Anterior</span>
					</a>
					<a class="right carousel-control" href="#Carrousel" role="button" data-slide="next">
						<span class="right-arrow" aria-hidden="true"><i class="glyphicon glyphicon-arrow-right"></i></span>
						<span class="sr-only">Següent</span>
					</a>
				</div>
			</div>
		</div>
		<div class="row">
					<?php if(empty($productos)){echo 'No hi ha productes';} else{?>
					<?php foreach ($productos->result() as $row){?>
					 <a href="container_prod.php">
						<div class="col-md-4">
							<div class="card">
								<img src="http://cevirdikce.com/proje/hasem-2/images/finance-1.jpg">
								<h2 ><?php echo $row->nombre_corto;?></h2>
								<h3>Preu:<?php echo $row->precio;?></h3>
								<?php if(($row->stock)>0){
										echo "<h3 class='stocks'>Disponible</h3>";
								}else{
									echo "<h3 class='stocks'>No Disponible</h3>";
								}
									
								
								?>
								
								<a href="detall.php" class="blue-button">Detall</a>
							</div>
						</div>	
					</a>
					<?php }?>
					<?php }?>
		</div>
	</div>
</div>