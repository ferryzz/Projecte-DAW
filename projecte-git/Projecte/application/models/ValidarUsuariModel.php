<?php
/**
    * Document que conté el Model ValidarUsuariModel
    * @author Sergi
    */
defined('BASEPATH') OR exit('No direct script access allowed');


class ValidarUsuariModel extends CI_Model {
  /**
    * Model que conté els mètodes per a validar un usuari
    * @author Sergi
    */
 
  public function __construct () {
    $this->load->database();
  }
  
  public function getUsuari($session){
    /**
    * Mètode que retorna la consulta a la bd de les dades del usuari que ha iniciat sessio
    * @param $session és un array amb les variables de sessió
    * @return retorna el resultat de la consulta a la bd
    * @author Sergi
    */
	  
	  //Versio ActiveRecord
	  //$query = $this->db->get('productes');
  		$usuari_id=$session["login"];
  		$consulta="select * from cliente WHERE id = ".$usuari_id;
  		$query = $this->db->query($consulta);
		if($query->num_rows()>0){
			return $query;
		}
  	
	  //Versio normal_> $this->db->query("select * from venders");
  }


  	
	  //Versio normal_> $this->db->query("select * from venders");
  }