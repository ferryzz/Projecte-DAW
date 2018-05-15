<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UsuarisModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  function existeixUsuari($user, $pass){
	
		//Versio ActiveRecord
		$this->db->select('email,password');
		$this->db->where('email',$user);
		$this->db->where('password',$pass);
		$query = $this->db->get('cliente');
    
		if ($query->num_rows() > 0){
			return TRUE;
		} 
		else {
			return FALSE;
		}
	}

}