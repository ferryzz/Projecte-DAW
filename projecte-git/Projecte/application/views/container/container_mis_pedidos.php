<?php
/**
    * Vista que mostra els pedidos que ha fet l'usuari
    * @author Sergi
    */

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Mis pedidos:</h1>
				<h4>Haz click en el pedido que desees visualizar</h4>
					<ul>
					<?php foreach ($pedidos->result() as $row){?>
						<li><?php echo "<a href=".site_url("/welcome/ver_pedido/").$row->id.">Pedido nº".$row->id." con fecha ".$row->fecha." ".$row->hora."</a>"  ?></li>
					
					<?php }?>
					</ul> 
			</div>
		</div>
	</div>