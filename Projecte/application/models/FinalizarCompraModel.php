<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class FinalizarCompraModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  public function finalizar($session){
	  
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
  }
  public function getProductos($IDventa){
	  
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

}
