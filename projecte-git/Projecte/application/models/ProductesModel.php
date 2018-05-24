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
         $this->db->select('productos.id as pro_id, categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->like('productos.nombre',$buscar);
         $this->db->or_like('categorias.nombre',$buscar);
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }
      public function ordenar_llista_nom($search){
         $this->db->select('productos.id as pro_id,categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
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
         $this->db->select('productos.id as pro_id,categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->like('productos.nombre',$search);
         $this->db->or_like('categorias.nombre',$search);
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->order_by('productos.precio', 'ASC');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }
      public function ordenar_llista_preu_desc($search){
         $this->db->select('productos.id as pro_id,categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->like('productos.nombre','$search');
         $this->db->or_like('categorias.nombre',$search);
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->order_by('productos.precio','DESC');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }
      public function llista_cat(){
         $this->db->select('id, nombre,id_familia');
         $query = $this->db->get('categorias');
         //echo $this->db->queries[0]; //mirar la ultima query feta
         if ($query -> num_rows() > 0){
            return $query;
         }
      }

      public function filtrar_cat($b,$search){
         $this->db->select('productos.id as pro_id,categorias.id as cat_id, categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         //$this->db->where('categorias.id','productos.categoria_id');
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->where("productos.categoria_id=".$b." and(productos.nombre like '%".$search."%' or categorias.nombre like '%".$search."%')");

         //$this->db->like('productos.nombre',$search);
         //$this->db->or_like('categorias.nombre',$search);
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }

      public function ordenar_cat_preu_desc($id_cat,$search){
         $this->db->select('productos.id as pro_id,categorias.id as cat_id, categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->where("productos.categoria_id=".$id_cat." and(productos.nombre like '%".$search."%' or categorias.nombre like '%".$search."%')");
         //$this->db->where('productos.categoria_id',$b);
         //$this->db->like('productos.nombre',$search);
         //$this->db->or_like('categorias.nombre',$search);
         $this->db->order_by('productos.precio','DESC');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }

      public function ordenar_cat_preu_asc($id_cat,$search){
         $this->db->select('productos.id as pro_id,categorias.id as cat_id, categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->where("productos.categoria_id=".$id_cat." and(productos.nombre like '%".$search."%' or categorias.nombre like '%".$search."%')");
         //$this->db->where('productos.categoria_id',$b);
         //$this->db->like('productos.nombre',$search);
         //$this->db->or_like('categorias.nombre',$search);
         $this->db->order_by('productos.precio','ASC');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }

      public function ordenar_cat_nombre($id_cat,$search){
         $this->db->select('productos.id as pro_id,categorias.id as cat_id, categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
         $this->db->join('categorias','productos.categoria_id = categorias.id');
         $this->db->where("productos.categoria_id=".$id_cat." and(productos.nombre like '%".$search."%' or categorias.nombre like '%".$search."%')");
         //$this->db->where('productos.categoria_id',$b);
         //$this->db->like('productos.nombre',$search);
         //$this->db->or_like('categorias.nombre',$search);
         $this->db->order_by('productos.nombre','ASC');
         $query = $this->db->get('productos');
         if ($query -> num_rows() > 0){
            return $query;
         }
      }

      public function MostrarFamilias(){
     
     //Versio ActiveRecord
    
     $this->db->select('*');
     $query = $this->db->get('familias');
     
     if($query->num_rows()>0){
        return $query;
     }
     //Versio normal_> $this->db->query("select * from venders");
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

   function comprovar_categoria(){
      //Versio ActiveRecord
      $this->db->select('categoria_id');
      $query = $this->db->get('productos');
      
      if ($query->num_rows()!=0){
         return true;
      }else{
         return false;
      }
   }

   function select_categoria($productID){

      $this->db->select('productos.id as pro_id,categoria_id as cat_id, categorias.nombre as cat_nombre, productos.nombre_corto as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen');
      $this->db->where('categoria_id',$categoria);
      $this->db->join('categorias','productos.categoria_id = categorias.id');
      $query = $this->db->get('productos');
      //echo $this->db->queries[1]; //mirar la ultima query feta
      if ($query -> num_rows() > 0){
            return $query;
         }
   }
   function mostrar_detall($productID){
      $this->db->select('productos.id as pro_id, categorias.nombre as cat_nombre, productos.nombre as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen, promocion, stock,descripcion');
      $this->db->where('productos.id',$productID);
      $this->db->join('categorias','productos.categoria_id = categorias.id');
      $query = $this->db->get('productos');
      if ($query -> num_rows() > 0){
            return $query;
         }

   }


  
}
