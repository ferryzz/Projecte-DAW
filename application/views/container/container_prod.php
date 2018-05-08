https://www.adictosaltrabajo.com/tutoriales/primeros-pasos-con-codeigniter/
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Producte info</h1>
				<table class="table table-hover">
				<?php if(empty($cerques)){echo 'no hi ha cerques per oferir';} else{?>
				<?php foreach ($cerques->result() as $row){?>
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Precio</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $row->nombre;?></td>
							<td><?php echo $row->precio;?></td>
						</tr>
					</tbody>
					<?php }?>
					<?php }?>
				</table>
				
					
				
			</div>
		</div>
	</div>