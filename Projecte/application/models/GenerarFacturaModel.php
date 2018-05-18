<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class GenerarFacturaModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  public function getClient($IDventa){
	  
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
