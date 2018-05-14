<?php


//Set useful variables for paypal form
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'sagu7012@gmail.com'; //Business Email

?>
<div class="container">
        <div class="row">
            <div class="col-md-12">
    <h2>TOTAL: <?php echo $_SESSION['total']; ?>€</h2>
    <h3>Forma de pago:</h3>
    <form action="<?php echo $paypalURL; ?>" method="post">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypalID; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        
        <input type="hidden" name="amount" value="<?php echo $_SESSION['total']; ?>">
        <input type="hidden" name="currency_code" value="EUR">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='http://localhost/projecte/index.php/welcome/cesta_resumen'>
        <input type='hidden' name='return' value='http://localhost/projecte/pago.php'>
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/webstatic/mktg/logo-center/logotipo_paypal_tarjetas.jpg" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>
</div></div></div>