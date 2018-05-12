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
  public function select($buscar){
         //Per eleminar el ESCAPE '!' de la QUERY s'ha de borrar el contingu de les variables de system/database/DB_driver.php y canviar les variables $_like_escape_str y $_like_escape_chr
         $this->db->select('categorias.nombre as cat_nombre, productos.nombre as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->like('productos.nombre',$buscar);
         $this->db->or_like('categorias.nombre',$buscar);
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }
      public function ordenar_llista_nom($search){
         $this->db->select('categorias.nombre as cat_nombre, productos.nombre as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->like('productos.nombre',$search);
         $this->db->or_like('categorias.nombre',$search);
         $this->db->order_by('productos.nombre', 'ASC');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }   
      public function ordenar_llista_preu_asc($search){
         $this->db->select('categorias.nombre as cat_nombre, productos.nombre as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->like('productos.nombre',$search);
         $this->db->or_like('categorias.nombre',$search);
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->order_by('productos.precio', 'DESC');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }
      public function ordenar_llista_preu_desc($search){
         $this->db->select('categorias.nombre as cat_nombre, productos.nombre as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->like('productos.nombre',$search);
         $this->db->or_like('categorias.nombre',$search);
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->order_by('productos.precio','ASC');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }
      public function llista_cat(){
         $this->db->select('id, nombre');
         $query = $this->db->get('categorias');
         //echo $this->db->queries[0]; //mirar la ultima query feta
         if ($query -> num_rows() > 0){
            return $query;
         }

      }
  
}
