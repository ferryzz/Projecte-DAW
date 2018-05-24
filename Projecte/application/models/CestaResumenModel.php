<?php
/**
    * Document que conté el model CestaResumenModel
    * @author Sergi
    */
defined('BASEPATH') OR exit('No direct script access allowed');


class CestaResumenModel extends CI_Model {
  /**
    * Model que conté les funcions utilitzades alhora de mostrar la cistella
    * @author Sergi
    */
 
  public function __construct () {
    $this->load->database();
  }
  
  public function getProductes($session){
    /**
    * Mètode que retorna la consulta a la bd dels productes que hi ha a la cistella
    * @param $session és un array amb les variables de sessió
    * @return retorna el resultat de la consulta a la bd
    * @author Sergi
    */
	  
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
  }
  public function getCantidades($session){
    /**
    * Mètode que retorna les cantitats de cada producte que hi ha a la cistella
    * @param $session és un array amb les variables de sessió
    * @return retorna un nou array amb les cantitats
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
