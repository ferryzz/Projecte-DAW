<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Mi Cesta</h1>
				<table class="table table-hover">
				<?php $i=0;
				$semitotal=0;
				$total=0; ?>
				<?php if(empty($productes) or empty($cantidades)){echo '<h2>La cesta está vacia!!!</h2>';} else{?>
				<thead>
						<tr>
							<th>Nombre</th>
							<th>Cantidad</th>
							<th>Disponibilidad</th>
							<th>Precio</th>
						</tr>
					</thead>
				<?php foreach ($productes->result() as $row){?>

					
					<tbody>
						<tr>
							<td><?php echo "<a href='http://localhost/projecte/index.php/producto/".$row->id."''>" .$row->nombre."</a>";?></td>
							<td><?php echo $cantidades[$i]; $semitotal=$cantidades[$i]; echo"<a href='http://localhost/projecte/index.php/welcome/borrarproducto/".$row->id."/1'>     Quitar</a>"?></td>
							<td><?php $disponible=Date('d/m/y', strtotime("+10 days"));  if ($row->stock < $cantidades[$i]) {
								echo "Disponible a partir del ".$disponible." (*)";;
							}else{ echo "Disponible";}  ?></td>
							<td><?php echo $row->precio."€"; $semitotal=$semitotal*$row->precio; $total=$total+$semitotal; $semitotal=0; ?></td>
						</tr>
					
					<?php $i++; }?>
					
					<tr>
						<td>Transporte 48-72H</td>
						<td></td>
						<td></td>
						<td>8€</td>
					</tr>
					<?php $total=$total+8;?>
					</tbody>
									</table>
				<h3>Total: <?php echo $total."€"; $_SESSION["total"]=$total; ?></h3>
				<button type="button" class="btn btn-primary" onclick="location.href='http://localhost/projecte/index.php/welcome/validar'">Confirmar Pedido</button>
				<?php }?>

					
				
			</div>
		</div>
	</div>
	