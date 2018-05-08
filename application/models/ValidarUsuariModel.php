<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ValidarUsuariModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  public function getUsuari($session){
	  
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