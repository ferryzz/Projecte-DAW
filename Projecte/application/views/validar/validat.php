<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Datos de envio</h1>
				<h3>Se realizará la compra con los siguientes datos:</h3><br>
				<?php foreach ($usuari->result() as $row){?>
				<p>Nombre: <?php echo $row->nombre; ?></p>
				<p>Número de contacto: <?php echo $row->telefono; ?></p>
				<p>Dirección de entrega: <?php echo $row->direccion; ?></p>
				<p>Población: <?php echo $row->poblacion." (".$row->cp.")"; ?></p>
				<p>Província: <?php echo $row->Provincia; ?></p>
				<p>País: <?php echo $row->pais; ?></p>
				<?php }?>					
				<button type="button" class="btn btn-primary" onclick="location.href='http://localhost/proj/index.php/welcome/pago'">Pasar al pago</button>
			</div>
		</div>
	</div>
	