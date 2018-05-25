<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php
/**
    * Vista que mostra el footer amb tots els seus links.
    * @author Julio
    */
?>

<footer class="footer">
    <div class="container">
        <div class="row">
         <div class="col-sm-3">
            <h4 class="title">Ayuda y Soporte</h4>
            <span class="acount-icon">          
            <a href="<?php echo site_url("welcome/quisom");?>"><i class="fa fa-users" aria-hidden="true"></i> ¿Quiénes Somos?</a>
            <a href="<?php echo site_url("welcome/garantia");?>"><i class="fa fa-gear" aria-hidden="true"></i> Garantías</a>
            <a href="<?php echo site_url("welcome/lugar");?>"><i class="fa fa-map-marker" aria-hidden="true"></i> Donde Estamos</a>           
            </span>
        </div>
        <div class="col-sm-3">
            <h4 class="title">Legalidad</h4>
            <span class="acount-icon">          
            <a href="<?php echo site_url("welcome/aviso");?>"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Aviso Legal</a>
            <a href="<?php echo site_url("welcome/pago");?>"><i class="fa fa-credit-card" aria-hidden="true"></i>Formas de Pago</a>
            <a href="<?php echo site_url("welcome/privacidad");?>"><i class="fa fa-lock" aria-hidden="true"></i> Privacidad</a>
            <a href="<?php echo site_url("welcome/envio");?>"><i class="fa fa-truck" aria-hidden="true"></i> Logística y Envíos</a>           
            </span>
        </div>
         <div class="col-sm-3">
            <h4 class="title">Redes Sociales</h4>
            <span class="acount-icon">          
            <a href="https://es-es.facebook.com/"><i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</a>          
            </span>
        </div>
      
        </div>
        <hr>
        <div class="row text-center"><a  style="color: #fff;">Copyright © Your Website lacodeid 2017</a></div>
    </div>	
</footer>
		
		 
</body>
</html>