<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class UsuarisModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  function existeixUsuari($user, $pass){
		//Versio ActiveRecord
		$this->db->select('email,password,id');
		$this->db->where('email',$user);
		$this->db->where('password',$pass);
		$query = $this->db->get('cliente');
		
		
		foreach ($query->result() as $valor) {
			 $id = $valor->id;
		}
		
		
		if ($query->num_rows() > 0){
			return $id;  
		} 
		else {
			return 0;
		}
	}

function getUsuaris($session){
    /**
    * Mètode que retorna la consulta a la bd de tots els usuaris que hi ha
    * @param $session és un array amb les variables de sessió
    * @return retorna el resultat de la consulta a la bd
    * @author Sergi
    */
	  
  		$id=$session["login"];
      if ($id!=500) {
        header("Location: ".site_url("welcome/no_permis"));
      }else{
      $arrayusuaris=array();
  		$consulta="select * from cliente WHERE id <> 500";
  		$query = $this->db->query($consulta);
      if($query->num_rows()>0){
      return $query;
    }
  }
}

 function eliminar($id){
    /**
    * Fa un delete a la bd per eliminar el client
    * @param $id és el id del client que es vol eliminar
    * @author Sergi
    */
	  if (!isset($id)) {
      header("Location: ".site_url());
    }else{
	  $consulta="delete from cliente where id = ".$id;
    $this->db->query($consulta);
  }
  }
	

}