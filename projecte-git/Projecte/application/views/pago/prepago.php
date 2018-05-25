<?php
/**
    * Vista que demana al usuari que seleccioni un mètode de pagament
    * @author Sergi
    */
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container">
        <div class="row">
            <div class="col-md-12">
    <h2>TOTAL: <?php echo $_SESSION['total']; ?>€</h2>
    <h3>Escoge la forma de pago:</h3>
    <h4>Actualmente solo está disponible el pago contrareembolso.</h4>
    <h4>Paypal (No disponible temporalmente): <img src="<?php echo base_url("assets/img/paypal-disabled.png"); ?>"></h4>
    <h4>Contrareembolso (+3€): <button type="button" class="btn btn-primary" onclick="location.href='http://localhost/projecte-git/Projecte/index.php/welcome/finalizar'">Confirmar Compra</button>
    <h4>Usted recibirá un correo de confirmación del pedido.</h4>
    <p>Al hacer click en confirmar compra, usted acepta que en caso de cancelación del pedido por su parte, se le podrà cobrar una tasa por la gestión.</p>
    
    
</div></div></div>