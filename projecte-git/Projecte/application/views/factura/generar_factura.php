

<?php
// (c) Xavier Nicolay
// Exemple de génération de devis/facture PDF

require('invoice.php');

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
foreach ($usuari->result() as $row){

  $pdf->addClient($row->id);
  $pdf->addPageNumber("1");
  $pdf->addClientAdresse("Sr/a: ".$row->nombre."\nTelf: ".$row->telefono."\nE-mail: ".$row->email."\n".$row->direccion."\n".
    $row->cp." ".$row->poblacion);
          
 }


$pdf->addReglement("TRANSF. BANCARIA");
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

?>

