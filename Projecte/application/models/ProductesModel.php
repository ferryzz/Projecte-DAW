<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProductesModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  public function mostrarProductes(){
	  
	  //Versio ActiveRecord
	 
	  $this->db->select('*');
	  $this->db->order_by('id', 'DESC');
	  $this->db->limit('12');
	  $query = $this->db->get('productos');
	  
	  if($query->num_rows()>0){
		  return $query;
	  }
	  //Versio normal_> $this->db->query("select * from venders");
  }
  
}
