<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProductesModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  public function mostrarProductes(){
	  
	  //Versio ActiveRecord
	  $query = $this->db->get('productes');
	  if($query->num_rows()>0){
		  echo  $query;
	  }
	  //Versio normal_> $this->db->query("select * from venders");
  }
  
}
