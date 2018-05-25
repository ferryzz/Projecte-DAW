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
				<h1>Eliminar Usuaris</h1>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>ID Cliente</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Población</th>
							<th>País</th>
						</tr>
					</thead>
					<tbody>
				<?php foreach ($usuaris->result() as $row){?>
					<form class="form" role="form" method="post" action="<?php echo site_url("welcome/eliminars");?>">
					<tr>
					<td><?php echo $row->id; ?></p></td>
					<td><?php echo $row->nombre; ?></p></td>
					<td><?php echo $row->email; ?></p></td>
					<td><?php echo $row->poblacion; ?></p></td>
					<td><?php echo $row->pais; ?></p></td>
					
					<?php echo "<input type='hidden' name='id' value=".$row->id.">" ?>
					<td><button type="submit" class="btn btn-primary">Eliminar</button></td>
				</tr>
			</form>
				<?php }?>			
				</tbody>
				</table>		
			</div>
		</div>
	</div>
	