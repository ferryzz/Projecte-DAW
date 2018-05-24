<?php
/**
* Document que conté el model FinalizarCompraModel
* @author Sergi
*/
defined('BASEPATH') OR exit('No direct script access allowed');


class FinalizarCompraModel extends CI_Model {
  /**
* Model que conte totes les funcions cridades al finalitzar la compra
* @author Sergi
*/
 
  public function __construct () {
    $this->load->database();
  }
  
  public function finalizar($session){
    /**
    * Mètode que fa la inserció a la base de dades i crida als altres mètodes del model
    * @param $session és un array que conté les variables de sessió
    * @author Sergi
    */
	  
	  //Versio ActiveRecord
	  //$query = $this->db->get('productes');
  		

      $consulta2="INSERT INTO ventas (fecha, hora, estado)
      VALUES ('".date("d/m/Y")."', '".date("G:i")."', 'PENDIENTE');";
      $this->db->query($consulta2);

      $consulta3="select id from ventas ORDER BY id DESC limit 1";
      $query3 = $this->db->query($consulta3);
      foreach ($query3->result() as $row){
      $venta= $row->id;
          
      }
      $cliente = $session["login"];
      $contador=0;
      $array=$session["cesta"];
      sort($array);
      $cantidades=array();
      $cont=0;
      $counts = array_count_values($array);
      foreach ($array as $producto){
        if ($cont != $producto) {
          $cantidades[]=$counts[$producto];
          $cont=$producto;
        }
        }
      $session["cesta"] = array_unique($session["cesta"]);
      foreach ($session["cesta"] as $row){
     $query= "INSERT INTO clientes_productos_ventas (id_cliente, id_producto, id_venta, cantidad)
      VALUES ('".$cliente."', '".$row."', '".$venta."', '".$cantidades[$contador]."');";
      $this->db->query($query);
      $contador++;
          
    }
    $data = array(
        'usuari' => $this->getClient($venta),
        'productos' => $this->getProductos($venta),
        'IDventa' => $venta
    );
    $this->generarFactura($data);
    $this->enviarMail($data);
      }
  public function generarFactura($data){
    /**
    * Mètode que construeix el document pdf a partir de la plantilla invoice.php
    * @param $data és un array que conté les dades d'usuari i els productes per a la factura
    *@see invoice.php
    * @author Sergi
    */
    require('invoice.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$pdf = new PDF_Invoice( 'P', 'mm', 'A4' );
$pdf->AddPage();
$pdf->addSociete( "TechnoComputer",
                  "Av. de les Bases de Manresa, 51-59\n" .
                  "08242 Manresa\n".
                  "Barcelona, SPAIN\n" .
                  "NIF: Z888888888" . EURO );
$pdf->fact_dev( "RESUMEN DEL PEDIDO ");
$pdf->temporaire( "NO ES FACTURA" );
$pdf->addDate( date('d-m-Y H:i'));
$usuari = $data["usuari"];
$productos = $data["productos"];
$IDventa = $data["IDventa"];
foreach ($usuari->result() as $row){

  $pdf->addClient($row->id);
  $pdf->addPageNumber("1");
  $pdf->addClientAdresse("Sr/a: ".$row->nombre."\nTelf: ".$row->telefono."\nE-mail: ".$row->email."\n".$row->direccion."\n".
    $row->cp." ".$row->poblacion);
          
 }


$pdf->addReglement("CONTRAREEMBOLSO");
$pdf->addEcheance(date('d-m-Y'));
$pdf->addNumTVA("FC_".$IDventa);
//$pdf->addReferencia("");
$cols=array( "REFERENCIA"    => 23,
             "PRODUCTO"  => 78,
             "CANTIDAD"     => 22,
             "PRECIO"      => 26,
             "PRECIO TOTAL" => 30,
             "TVA"          => 11 );
$pdf->addCols( $cols);
$cols=array( "REFERENCIA"    => "L",
             "PRODUCTO"  => "L",
             "CANTIDAD"     => "C",
             "PRECIO"      => "R",
             "PRECIO TOTAL" => "R",
             "TVA"          => "C" );
$pdf->addLineFormat( $cols);
$pdf->addLineFormat($cols);

$y    = 109;
$contador=0;
$total=0;
foreach ($productos[0]->result() as $row){
$precio=$row->precio;
$calcular=($precio/100)*21;
$sense_iva=$precio-$calcular;
$line = array( "REFERENCIA"    => $row->id,
               "PRODUCTO"  => $row->nombre,
               "CANTIDAD"     => $productos[1][$contador],
               "PRECIO"      => $sense_iva,
               "PRECIO TOTAL" => $sense_iva*$productos[1][$contador],
               "TVA"          => "1" );
$total=$total+($sense_iva*$productos[1][$contador]);
$size = $pdf->addLine( $y, $line );
$y   += $size + 10;
$contador++;
}
$line = array( "REFERENCIA"    => "T0",
               "PRODUCTO"  => "Transporte",
               "CANTIDAD"     => "1",
               "PRECIO"      => "6.32",
               "PRECIO TOTAL" => "6.32",
               "TVA"          => "1" );
$total=$total+6.32;
$size = $pdf->addLine( $y, $line );
$y   += $size + 10;
$line = array( "REFERENCIA"    => "P0",
               "PRODUCTO"  => "Cuota Contrareembolso",
               "CANTIDAD"     => "1",
               "PRECIO"      => "2.37",
               "PRECIO TOTAL" => "2.37",
               "TVA"          => "1" );
$total=$total+3.32;
$size = $pdf->addLine( $y, $line );
$y   += $size + 10;
//$pdf->addCadreTVAs();
        
// invoice = array( "px_unit" => value,
//                  "qte"     => qte,
//                  "tva"     => code_tva );
// tab_tva = array( "1"       => 19.6,
//                  "2"       => 5.5, ... );
// params  = array( "RemiseGlobale" => [0|1],
//                      "remise_tva"     => [1|2...],  // {la remise s'applique sur ce code TVA}
//                      "remise"         => value,     // {montant de la remise}
//                      "remise_percent" => percent,   // {pourcentage de remise sur ce montant de TVA}
//                  "FraisPort"     => [0|1],
//                      "portTTC"        => value,     // montant des frais de ports TTC
//                                                     // par defaut la TVA = 19.6 %
//                      "portHT"         => value,     // montant des frais de ports HT
//                      "portTVA"        => tva_value, // valeur de la TVA a appliquer sur le montant HT
//                  "AccompteExige" => [0|1],
//                      "accompte"         => value    // montant de l'acompte (TTC)
//                      "accompte_percent" => percent  // pourcentage d'acompte (TTC)
//                  "Remarque" => "texte"              // texte
$tot_prods = array( array ( "px_unit" => 600, "qte" => 1, "tva" => 1 ),
                    array ( "px_unit" =>  10, "qte" => 1, "tva" => 1 ));
$tab_tva = array( "1"       => 21.0,
                  "2"       => 5.5);
$params  = array( "RemiseGlobale" => 1,
                      "remise_tva"     => 1,       // {la remise s'applique sur ce code TVA}
                      "remise"         => 0,       // {montant de la remise}
                      "remise_percent" => 10,      // {pourcentage de remise sur ce montant de TVA}
                  "FraisPort"     => 1,
                      "portTTC"        => 10,      // montant des frais de ports TTC
                                                   // par defaut la TVA = 19.6 %
                      "portHT"         => 0,       // montant des frais de ports HT
                      "portTVA"        => 19.6,    // valeur de la TVA a appliquer sur le montant HT
                  "AccompteExige" => 1,
                      "accompte"         => 0,     // montant de l'acompte (TTC)
                      "accompte_percent" => 15,    // pourcentage d'acompte (TTC)
                  "Remarque" => "Avec un acompte, svp..." );

//$pdf->addTVAs( $params, $tab_tva, $tot_prods);
$iva_total=($total/100)*21;
$total_amb_iva=$total+$iva_total;
$pdf->addCadreEurosFrancs($total,$iva_total,$total_amb_iva);
$filename="assets/pdf/FC_".$IDventa.".pdf";
$pdf->Output('F',$filename);
    
    

  }
  public function getClient($IDventa){
    /**
    * Mètode que fa la consulta a la base de dades i reorna totes les dades les usuari amb la id que se li ha passat
    * @param $IDventa és el id del usuari a retornar
    *@return Retorna el resultat de la consulta
    * @author Sergi
    */
    
    //Versio ActiveRecord
    //$query = $this->db->get('productes');
      $consulta="select id_cliente from clientes_productos_ventas where id_venta=".$IDventa." limit 1";
      $query = $this->db->query($consulta);
      foreach ($query->result() as $row){
     $consulta2= "select * from cliente WHERE id=".$row->id_cliente;
          
  }
      
      $query2 = $this->db->query($consulta2);
      if($query2->num_rows()>0){
       return $query2;
      }
    
    //Versio normal_> $this->db->query("select * from venders");
  }
  public function getProductos($IDventa){
    /**
    * Mètode que ordena els productes, el conta i fa la consulta a la base de dades
    * @param $IDventa és el id de la venta la qual es volen agafar els productes
    * @author Sergi
    */
    
    //Versio ActiveRecord
    //$query = $this->db->get('productes');
      $consulta="select id_producto,cantidad from clientes_productos_ventas where id_venta=".$IDventa." ORDER BY id_producto";
      $query = $this->db->query($consulta);
      $cantidades=[];
      $consulta2="select * from productos WHERE ";
      foreach ($query->result() as $row){
      $consulta2.="(id=".$row->id_producto.") OR";
      $cantidades[]=$row->cantidad;          
      }
      $consulta2=substr($consulta2, 0, -3);
      $query2 = $this->db->query($consulta2);
      if($query2->num_rows()>0){
      $array=array($query2,$cantidades);
      return $array;
      }
    
    //Versio normal_> $this->db->query("select * from venders");
  }

   public function enviarMail($data){
    /**
    * Mètode que envia un correu de confirmació al client
    * @param $data és un array amb els camps que s'enviaràn al correu
    * @author Sergi
    */
    
    $this->load->library('email');
    $config['protocol'] = "smtp";
    $config['smtp_host'] = "ssl://smtp.gmail.com";
    $config['smtp_port'] = "465";
    $config['smtp_timeout'] = '7';
    $config['smtp_user'] = "technocomputer2018@gmail.com";
    $config['smtp_pass'] = "DAW2018.";
    $config['charset'] = "utf-8";
    $config['mailtype'] = "html";
    $config['newline'] = "\r\n";
    $usuari = $data["usuari"];
    $IDventa = $data["IDventa"];
    $this->email->initialize($config);
      foreach ($usuari->result() as $row){
            $message = 'Querido '.$row->nombre.', le adjuntamos el resumen del pedido en este correo. Cuando se realize el envio recibira otro e-mail con la confirmocian del envio y el numero de sguimiento. <br> Gracias por confiar en nosotros';
            $this->email->set_newline("\r\n");
            $this->email->from('technocomputer2018@gmail.com'); // change it to yours
            $this->email->to($row->email);// change it to yours
            $this->email->subject('Resumen de tu pedido en TechnoComputer');
            $this->email->message($message);
        
 }
 $this->email->attach("assets/pdf/FC_".$IDventa.".pdf");
$this->email->send();
    
  }

}
