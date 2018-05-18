<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
        <div class="row">
            <div class="col-md-12">
    <h2>TOTAL: <?php echo $_SESSION['total']; ?>€</h2>
    <h3>Forma de pago:</h3>
    <h4>Actualmente solo está disponible el pago mediante transferencia bancaria.</h4>
    <h4>Si usted hace click en "Confirmar Compra", recibirá un correo en su e-mail indicando las instrucciones de pago y con el seumen de pedido.</h4>
    <button type="button" class="btn btn-primary" onclick="location.href='http://localhost/proj/index.php/welcome/finalizar'">Confirmar Compra</button>
    
</div></div></div>