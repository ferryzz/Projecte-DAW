<?php
/**
    * Vista que demana al usuari que confirmi les seves dades per a fer la compra
    * @author Sergi
    */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Cambiar pedidos enviados</h1>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID venta</th>
							<th>Fecha</th>
							<th>Intr. nº seguimiento</th>
							<th>Intr. Transportista</th>
							<th>Intr. Total</th>
						</tr>
					</thead>
					<tbody>
				<?php foreach ($pedidos->result() as $row){?>
					<form class="form" role="form" method="post" action="<?php echo site_url("welcome/modificar");?>">
					<tr>
					<td><?php echo $row->id; ?></p></td>
					<td><?php echo $row->fecha; ?></p></td>
					<td><input id="seguimiento" class="form-control" name="seguimiento" value="" placeholder="Num. Seguimiento" required> </td>
					<td><div class="form-group">
  						<select class="form-control" id="select" name="select" required>
    						<option value="1">Seur</option>
    						<option value="2">MRW</option>
    						<option value="3">NACEX</option>
  							</select>
					</div> </td>
					<?php echo "<input type='hidden' name='id' value=".$row->id.">" ?>
					<td><input id="total" class="form-control" name="total" value="" placeholder="Total (€)" required> </td>
					<td><button type="submit" class="btn btn-primary">Modificar</button></td>
				</tr>
			</form>
				<?php }?>			
				</tbody>
				</table>		
			</div>
		</div>
	</div>
	