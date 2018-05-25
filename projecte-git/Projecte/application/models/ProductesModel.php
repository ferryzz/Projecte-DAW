<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class ProductesModel extends CI_Model {
 
  public function __construct () {
    $this->load->database();
  }
  
  public function mostrarProductes(){
      /**
      * Mètode que mostra 12 registres en la pagina principal
      * @author Julio
      */	  
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

      /**
      * Mètode que fa la query per mostrar les dades dels productes i mostrarla despues de cercar
      * @param $buscar és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
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
         /**
      * Mètode que fa la query per mostrar les dades dels productes i mostrarla despues de cercar en ordre alfabetic
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
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
         /**
      * Mètode que fa la query per mostrar les dades dels productes i mostrarla despues de cercar en ordre ascendent
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
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
         /**
      * Mètode que fa la query per mostrar les dades dels productes i mostrarla despues de cercar en ordre descendent
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
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
         /**
      * Mètode que fa la query per mostrar les categories amb el seus id
      * @author Ferran
      */
         $this->db->select('id, nombre,id_familia');
         $query = $this->db->get('categorias');
         //echo $this->db->queries[0]; //mirar la ultima query feta
         if ($query -> num_rows() > 0){
            return $query;
         }
      }

      public function filtrar_cat($b,$search){
         /**
      * Mètode que fa la query per mostrar les dades dels productes i mostrarla despues de cercar ordenades per categoria desitjada
      * @param $search és el contingut del input de la cerca que esta en la URL, $b es la id de la categoria
      * @author Ferran
      */
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
            /**
      * Mètode que fa la query per mostrar les dades dels productes i mostrarla despues de cercar ordenades per categoria desitjada i preu descendent
      * @param $search és el contingut del input de la cerca que esta en la URL, $id_cat es la id de la categoria
      * @author Ferran
      */
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
            /**
      * Mètode que fa la query per mostrar les dades dels productes i mostrarla despues de cercar ordenades per categoria desitjada i preu ascendent
      * @param $search és el contingut del input de la cerca que esta en la URL, $id_cat es la id de la categoria
      * @author Ferran
      */
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
            /**
      * Mètode que fa la query per mostrar les dades dels productes i mostrarla despues de cercar ordenades per categoria desitjada i ordenada alfabeticament
      * @param $search és el contingut del input de la cerca que esta en la URL, $b es la id de la categoria
      * @author Ferran
      */
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
         /**
      * Mètode que fa la query per mostrar la id i el nom de les families
      * @author Ferran
      */
     
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
         /**
      * Mètode que fa la query que comprova si existeix la categoria
      * @author Ferran
      */
      //Versio ActiveRecord
      $this->db->select('categoria_id');
      $query = $this->db->get('productos');
      
      if ($query->num_rows()!=0){
         return true;
      }else{
         return false;
      }
   }

   function select_categoria($categoria){
         /**
      * Mètode que fa la query per mostrar tots els productes de una categoria sense fer servir el cercador
      * @param $categoria es la id de la categoria
      * @author Ferran
      */

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
         /**
      * Mètode que fa la query per mostrar el producte el qual vols saber mes informacio
      * @param $prductID es la id del producte
      * @author Ferran
      */
      $this->db->select('productos.id as pro_id, categorias.nombre as cat_nombre, productos.nombre as pro_nombre, productos.precio as pro_precio, productos.imagen as pro_imagen, promocion, stock,descripcion');
      $this->db->where('productos.id',$productID);
      $this->db->join('categorias','productos.categoria_id = categorias.id');
      $query = $this->db->get('productos');
      if ($query -> num_rows() > 0){
            return $query;
         }

   }


  
}
