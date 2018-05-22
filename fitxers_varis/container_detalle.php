<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script type="text/javascript">
jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});

</script>
 <div class="container">
        	<div class="row">
				<div class="col-md-12">
					<div class="col-md-6">
					<img style="max-width:100%;" src="http://www.legitreviews.com/wp-content/uploads/2016/11/geforce-experience.jpg" />
					</div>  
					<div class="col-md-6">
						<h2>Portátil Lenovo IdeaPad 520S-14IKB Intel Core i5-7200U/8GB/256GB SSD/14" Gris</h2>
						<p><a>Precio</a><p>
						<p><a>Promocion</a><p>
						<p><a>Stock</a><p>
							 <form id='myform' method='POST' action='#'>
								<input type='button' value='-' class='qtyminus' field='quantity' />
								<input type='text' name='quantity' value='0' class='qty' />
								<input type='button' value='+' class='qtyplus' field='quantity' />
							</form>  
					</div>  
				</div>                          
				<div class="col-md-12">
					<div class="col-md-6">
						<h2>Descripcio del producte</h2>
						<p>Esta fuente de alimentación de 650W LL-PS-650 contiene un ventilador de 12 cm y 14 dB apenas perceptibles, que incluye un sistema inteligente con control de velocidad y un sistema antivibraciones. Asimismo, cumple con todas las normas europeas.<p>
					</div>  
				</div>  
                		
            </div>
        </div>        