<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
/**
    * Vista que mostra les dades del producte que has clickat.
    * @author Ferran
    */
?>
 <div class="container">
        	<div class="row">
				
                    <div class ="detalle_margin">
                        <?php foreach ($detall -> result() as $row){ ?>
                            <div class="col-md-1"></div>
        					<div class="col-md-4">
                                <div class="imagen_producto"><img src="/Exercicis/projecte_culpa_jonatan/<?php echo $row->pro_imagen?>" /></div>
        	
        					</div>
                            <div class="col-md-1"></div>  
        					<div class="col-md-6">
        						<h2><?php echo $row->pro_nombre; ?></h2>
        						<h4><p>Precio: <?php echo $row->pro_precio; ?> <span class="glyphicon glyphicon-euro"></span></p></h4>
                                <?php if ($row->promocion != 0){ 
                                ?>
        						      <h4><p>Promoción <span class="glyphicon glyphicon-ok"></span></p></h4>
                                <?php 
                                }else{ 
                                ?>
                                    <h4><p>Promocion <span class="glyphicon glyphicon-remove"></span></p></h4>
                                <?php 
                                } 
                                ?>
                                <?php if ($row->stock != 0){ 
                                    ?>
                                    <h4><p class="disponibilidad">&nbsp;Disponibilidad: <b>Tenemos disponibilidad de este producto!</b></p></h4>
                                    <?php echo form_open('Welcome/addproduct/'.$id_producte); ?>
                                        <input type='button' value='-' class='qtyminus' field='quantity' />
                                        <input type='text' id="stock" name='quantity' value='0' class='qty' />
                                        <input type='button' value='+' class='qtyplus' field='quantity' />
                                    <br/>
                                    <form>
                                    <div class="section" style="padding-bottom:20px;">
                                        <button type="submit" id="target" class="btn btn-success"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al carro</button>
                                        <?php echo form_close(); ?>
                                    </div>
                                    </form>
                                <?php 
                                }else{
                                    ?>
                                    <h4><p class="no_disponibilidad">&nbsp;Disponibilidad: <b>No tenemos disponibilidad de este producto en estos momentos!</b></p></h4>
                                <?php 
                                } 
                                ?> 
        					</div>  
    				    </div>   
                
				<div class="container-fluid">       
                    <div class="col-md-12 product-info">
                        <ul id="myTab" class="nav nav-tabs nav_tabs">   
                            <li class="active"><a href="#service-one" data-toggle="tab">Descripción</a></li>
                        </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="service-one"> 
                            <section class="container product-info"><p><?php echo $row->descripcion; ?></p></section>
                        </div>
                </div>
                <hr>
            </div></div><?php } ?>  
                		
            </div>
        </div>       