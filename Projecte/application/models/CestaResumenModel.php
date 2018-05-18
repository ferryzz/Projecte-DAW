<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class CestaResumenModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  public function getProductes($session){
	  
	  //Versio ActiveRecord
	  //$query = $this->db->get('productes');
  		$array=$session["cesta"];
  		sort($array);
  		$array_controlador=array();
  		$consulta="select * from productos";
  		$cont=0;
  		foreach ($array as $producto){
  			if ($cont==0) {
  				$consulta.=" WHERE id=".$producto;
  				$cont=1;
  			}else{
  				$consulta.=" OR id=".$producto;
  			}
  			
  		}
  		$query = $this->db->query($consulta);
		if($query->num_rows()>0){
			return $query;
		}
  	
	  //Versio normal_> $this->db->query("select * from venders");
  }
  public function getCantidades($session){
	  
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
