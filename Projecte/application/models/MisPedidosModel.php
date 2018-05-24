<?php
/**
    * Document que conté el mètode MisPedidosModel
    * @author Sergi
    */
defined('BASEPATH') OR exit('No direct script access allowed');


class MisPedidosModel extends CI_Model {
  /**
    * Model que conté les funcions necessàries per a la part de Mis pedidos
    * @author Sergi
    */
 
  public function __construct () {
    $this->load->database();
  }
  
  public function getPedidos($session){
    /**
    * Mètode que retorna la consulta a la bd de les compres que ha fet l'usuari loggejat
    * @param $session és un array amb les variables de sessió
    * @return retorna el resultat de la consulta a la bd
    * @author Sergi
    */
	  
  		$id=$session["login"];
      $arraypedidos=array();
  		$consulta="select * from clientes_productos_ventas WHERE id_cliente=".$id;
  		$query = $this->db->query($consulta);
      foreach ($query->result() as $row){
      $arraypedidos[]=$row->id_venta;
          }
      $arraypedidos = array_unique($arraypedidos);

      $consulta2="select * from ventas";
      $cont=0;
      foreach ($arraypedidos as $idpedido) {
        if ($cont==0) {
          $consulta2.=" WHERE id=".$idpedido;
          $cont=1;
        }else{
          $consulta2.=" OR id=".$idpedido;
        }
        # code...
      }
      $query2 = $this->db->query($consulta2);
      if($query2->num_rows()>0){
        return $query2;
      }
  }

  public function verPedido($session,$idpedido){
    /**
    * Mètode que mostra per pantalla el pdf demanat
    * @param $session és un array amb les variables de sessió, $idpedido es el id del pedido que es vol visualitzar
    * @author Sergi
    */
    
      $id=$session["login"];
      $arraypedidos=array();
      $consulta="select * from clientes_productos_ventas WHERE id_venta=".$idpedido." LIMIT 1";
      $query = $this->db->query($consulta);
      foreach ($query->result() as $row){
        if ($row->id_cliente!=$id) {
          echo "Acceso no permitido";
          # code...
        }else{
            $nombrefichero="FC_".$idpedido.".pdf";
            header("Content-type: application/pdf");
            header("Content-Disposition: inline; filename=".$nombrefichero);
            @readfile("assets/pdf/".$nombrefichero);

        }
          }
  }
  public function getCantidades($session){
    /**
    * Retorna les cantitats de cada producte que hi ha a la cistella
    * @param $session és un array amb les variables de sessió
    * @return retorna l'array de les cantitats
    * @author Sergi
    */
	  
	  //Versio ActiveRecord
	  //$query = $this->db->get('productes');
  		$array=$session["cesta"];
  		sort($array);
  		$array_nuevo=array();
  		$cont=0;
		$counts = array_count_values($array);
  		foreach ($array as $producto){
  			if ($cont != $producto) {
  				$array_nuevo[]=$counts[$producto];
  				$cont=$producto;
  			}
  			}
  		return $array_nuevo;
  		}

  	
	  //Versio normal_> $this->db->query("select * from venders");
  }
