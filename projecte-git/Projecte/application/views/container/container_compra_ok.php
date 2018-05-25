<?php 
/**
* @brief Contenidor que mostra per pantalla varis missatges dient que la compra ha anat be i redirigeix al usuari al index
* @author Sergi
*/

?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<head>
<?php
header('Refresh: 5; '.site_url());

?>
</head>
<div class="container">
        <div class="row">
            <div class="col-md-12">
    <h2>La compra se ha realizado correctamente.</h2>
    <h3>En breve recibirá un e-mail con los datos del pedido.</h3>
    <h4>Gracias por confiar en nosotros.</h4>
    <h4>Se le redirigirá a la página principal.</h4>
    
</div></div></div>