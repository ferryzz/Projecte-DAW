<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
      /**
    * Mètode que enseña la pantalla principal cargant les vistes que s'especifiquen
    * @author Ferran
    */
		$this->load->helper("url");
    $this->load->helper("form");
		
	    $this->load->model("ProductesModel");
	  
	    $data = array(
            'productos' => $this->ProductesModel->MostrarProductes(),
            'familias' => $this->ProductesModel->MostrarFamilias(),
            'categorias' => $this->ProductesModel->llista_cat());
				
		$this->load->helper("url");
		$this->load->view('header/header_s',$data);
		$this->load->view('container/container_prod',$data);
		$this->load->view('footer/footer_s');
		
		
	}
	
	
	public function login(){
	  $this->load->helper("url");
	  $this->load->library("session");
	  $this->load->helper("form");
	  
	  $user = $this->input->post("email");
	  $pass = $this->input->post("password");
	  $this->load->model("UsuarisModel");
	  
    
	  if ($this->UsuarisModel->existeixUsuari($user, $pass)){
        
		$this->load->helper("url");
		
        $datasession = array(
          'email'  => $user,
          'login_ok' => TRUE
        );
        
    $this->session->set_userdata($datasession);
		$this->load->model("ProductesModel");
		$data = array('productos' => $this->ProductesModel->MostrarProductes(),
                              'familias' => $this->ProductesModel->MostrarFamilias(),
                              'categorias' => $this->ProductesModel->llista_cat());
		
    $this->load->view('header/header_c',$data);
		$this->load->view('container/container_prod',$data);
    $this->load->view('footer/footer_s');
    }
    else {
      
    $this->session->set_flashdata('error', 'El usuario o contraseña son incorrectos.');
    $this->load->view('header/header_s',$data);
	  $this->load->view('container/container_prod',$data);
	  $this->load->view('footer/footer_s');
    }
  } 
  
  public function logout()
  {
    $this->load->helper("url");
	  $this->load->library("session");
	  $this->load->helper("form");
    
    $datasession = array('email' => '', 'login_ok' => FALSE,
                        'productos' => $this->ProductesModel->MostrarProductes(),
                        'familias' => $this->ProductesModel->MostrarFamilias(),
                        'categorias' => $this->ProductesModel->llista_cat());
    
    $this->session->unset_userdata($datasession);
	$this->session->sess_destroy();
    
     $this->load->view('header/header_s',$datasession);
	  $this->load->view('container/container_prod',$datasession);
	  $this->load->view('footer/footer_s');
  }
  
	
	public function quisom()
	{
      /**
    * Mètode que mostra la pagina de quisom
    * @author Julio
    */
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_quisom');
		$this->load->view('footer/footer_s');
	}
	
	public function garantia()
	{
    /**
    * Mètode que mostra la pagina de garantia
    * @author Julio
    */
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_garantia');
		$this->load->view('footer/footer_s');
	}
	public function lugar()
	{
    /**
    * Mètode que mostra la pagina de lloc
    * @author Julio
    */
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_lugar');
		$this->load->view('footer/footer_s');
	}
	public function aviso()
	{
    /**
    * Mètode que mostra la pagina d'avis
    * @author Julio
    */
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_aviso');
		$this->load->view('footer/footer_s');
	}
	
	//public function pago()
	//{
		//$this->load->helper("url");
		//$this->load->view('header/header_s');
		//$this->load->view('container/container_pago');
		//$this->load->view('footer/footer_s');
	//}
	
	public function privacidad()
	{
      /**
    * Mètode que mostra la pagina de privacitat
    * @author Julio
    */
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_privacidad');
		$this->load->view('footer/footer_s');
	}
	public function envio()
	{
      /**
    * Mètode que mostra la pagina d'envio
    * @author Julio
    */
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_envio');
		$this->load->view('footer/footer_s');
	}
	
	public function cesta_resumen(){
    /**
    * Mètode que fa que es mostri per pantalla els productes que hi ha a la variable de sessió cistella
    * @author Sergi
    */
		$this->load->helper("url");
		$session = $this->session->userdata();
	    $this->load->model("CestaResumenModel");
      $this->load->model("ProductesModel");
	    if (isset($session["cesta"])) {
	    	$data = array(
				'productes' => $this->CestaResumenModel->getProductes($session),
				'cantidades' => $this->CestaResumenModel->getCantidades($session),
        'familias' => $this->ProductesModel->MostrarFamilias(),
        'categorias' => $this->ProductesModel->llista_cat()
		);
	    }else{
	    	$data = array();
	    }
	    
	  	

	  $this->load->view('header/header_s',$data);
		$this->load->view('container/container_cesta_resumen',$data);
		$this->load->view('footer/footer_s'); 
	}

	public function addproduct($productID = 0, $cantidad = 1)
  {
      /**
    * Mètode que afegeix un producte a la cistella
    * @param $productID és el id de producte i $cantidad la cantitat d'aquest producte
    * @author Sergi
    */
      $this->load->helper("url");
      $this->load->helper("form");
      if ($cantidad!=0) {
        $prova=$this->input->post('quantity');
      }


    	for ($i=0; $i < $cantidad; $i++) {    	
      	$session = $this->session->userdata();
      	$array=$session["cesta"];
      	$array[]=$productID;
      	$session["cesta"]=$array;
      	$this->session->set_userdata($session);
      	$session2 = $this->session->userdata();
      	}      	
      $this->load->view('redirect/redirect',$session2);
    }

    public function borrarproducto ($productID = 0, $cantidad = 0)
    {
      /**
    * Mètode que esborra un producte de la cistella
    * @param $productID és el id de producte i $cantidad la cantitat d'aquest producte
    * @author Sergi
    */
      if ($cantidad>1) {
        $cantidad=1;
      }
    	for ($i=0; $i < $cantidad; $i++) { 
    		# code...
    	
      	$session = $this->session->userdata();
      	$array=$session["cesta"];
      	$cont=0;
      	foreach (array_keys($array, $productID) as $key) {
      		if ($cont==0) {
      			unset($array[$key]);
      			$cont=1;
      		}
    		
		}
      	$session["cesta"]=$array;
      	$this->session->set_userdata($session);
      	$session2 = $this->session->userdata();
      	}      	
      $this->load->view('redirect/redirect',$session2);
    }

     public function validar ()
    {
       /**
    * Mètode que valida que un usuari hagi iniciat sessió per a completar la compra
    * @author Sergi
    */
    	$this->load->model("ValidarUsuariModel");
      $this->load->model("ProductesModel");
    	$this->load->helper("url");
      	$session = $this->session->userdata();
      	$session["login"]=1;
      	$this->session->set_userdata($session);
        $data = array(
        'usuari' => $this->ValidarUsuariModel->getUsuari($session),
        'familias' => $this->ProductesModel->MostrarFamilias(),
        'categorias' => $this->ProductesModel->llista_cat()
        );
      	if (!isset($session["login"]) or $session["login"]==0){
      		//$this->load->view('header/header_s',$data);
      		$this->load->view('validar/no_validat');
      		$this->load->view('footer/footer_s'); 
      	}else{
      		$this->load->view('header/header_s',$data);
          $this->load->view('validar/validat',$data);
          $this->load->view('footer/footer_s'); 
      	}
      
    }

    public function pago (){

      /**
    * Mètode que carrega la pestanya per escollir el pagament
    * @author Sergi
    */
    $this->load->helper("url");
    $this->load->model("ProductesModel");
    $data = array(
        'familias' => $this->ProductesModel->MostrarFamilias(),
        'categorias' => $this->ProductesModel->llista_cat()
        );
		$this->load->view('header/header_s',$data);
		$this->load->view('pago/prepago');
		$this->load->view('footer/footer_s'); 
     }

    public function finalizar ()
    {
      /**
    * Mètode que acaba la compra i reinicia la sessió
    * @author Sergi
    */
    	$this->load->helper("url");
    	$this->load->model("FinalizarCompraModel");
    	$session = $this->session->userdata();
    	$this->FinalizarCompraModel->finalizar($session);
    	$usuari=$session["login"];
    	$session = array('login' => $usuari);
    	$this->session->sess_destroy();
    	$session = $this->session->userdata();
      $array=$session["cesta"];
      $array[]=2;
      	$this->session->set_userdata($session);
		$this->load->view('header/header_s');
		$this->load->view('container/container_compra_ok');
		$this->load->view('footer/footer_s'); 
     }
	 
	 public function mispedidos ()
    {
      /**
    * Mètode que fa les consultes a les bd i mostra els pdf's corresponents
    * @author Sergi
    */
    $this->load->helper("url");
    $session = $this->session->userdata();
    $this->load->model("MisPedidosModel");
    if (isset($session["login"]) or $session["login"]==0) {
        $data = array(
        'pedidos' => $this->MisPedidosModel->getPedidos($session)
    );
    $this->load->view('header/header_s');
    $this->load->view('container/container_mis_pedidos',$data);
    $this->load->view('footer/footer_s'); 
      }else{
        $this->load->view('header/header_s');
          $this->load->view('validar/no_validat');
          $this->load->view('footer/footer_s'); 
      }
    
     }
	 
	 public function ver_pedido ($idpedido)
    {
      /**
    * Mètode que mostra per pantalla el pdf de pedido
    * @param $idpedido el id de la compra a mostrar
    * @author Sergi
    */
    $this->load->helper("url");
    $session = $this->session->userdata();
    $this->load->model("MisPedidosModel");
    if (isset($session["login"]) or $session["login"]==0) {

      $this->MisPedidosModel->verPedido($session,$idpedido);

      }else{
        $this->load->view('header/header_s');
          $this->load->view('validar/no_validat');
          $this->load->view('footer/footer_s'); 
      }
    
     }
    public function verProductos()
      {
        /**
        * Mètode que mostra la cerca dels productes
        * @author Ferran
        */
        $this->load->helper("form");
        $this->load->helper("url");
        $this->load->library('form_validation');
    $this->form_validation->set_rules('buscar', 'Buscar', 'trim|min_length[2]|max_length[15]|prep_for_form|encode_php_tags');
    $this->form_validation->set_message('min_length', 'La longitud minima es de 2');
    $this->form_validation->set_message('max_length', 'La longitud maxima es de 15');
        if ($this->form_validation->run() == TRUE)
                {
              $this->load->helper("url");
              $this->load->model('ProductesModel');//carguem el model
              $a = $this->input->post('buscar');
              $resultat = array('resultat2' => $this->ProductesModel->select($a),
                    'categorias' => $this->ProductesModel->llista_cat(),
                    'familias' => $this->ProductesModel->MostrarFamilias(),
                    'p'=>$a);
              $this->load->view('header/header_s',$resultat);
              $this->load->view('container/resultat',$resultat);
          $this->load->view('footer/footer_s');
          }
    else
        {
          $this->load->model('ProductesModel');//carguem el model
          $data = array(
            'productos' => $this->ProductesModel->MostrarProductes(),
            'familias' => $this->ProductesModel->MostrarFamilias(),
            'categorias' => $this->ProductesModel->llista_cat(),
        );
          $this->load->helper("url");
          $this->load->view('header/header_s',$data);
          $this->load->view('container/container_prod',$data);
          $this->load->view('footer/footer_s');
        }
      }

      public function ordenar_nombres()
      {
      /**
      * Mètode que envia les dades a la funcio que jo controlo
      * @author Ferran
      */  
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model('ProductesModel');//carguem el model
        $ordenar = $this->uri->segment(3);
        $search = $this->uri->segment(4);
        
        if ($ordenar == 'nombre') {
          $funcio = $this->ordenar_llista_nom($search);
        }
          elseif($ordenar == 'precio_desc')
          {
            $funcio = $this->ordenar_llista_preu_desc($search);
          }
          elseif($ordenar == 'cat_nombre')
          {
            $funcio = $this->ordenar_cat_nombre($search);
          }
          elseif($ordenar == 'cat_precio_asc')
          {
            $funcio = $this->ordenar_cat_precio_asc($search);
          }
          elseif($ordenar == 'cat_precio_desc')
          {
            $funcio = $this->ordenar_cat_precio_desc($search);
          }
          else
          {
            $funcio = $this->ordenar_llista_preu_asc($search);
        }

      }

      public function ordenar_llista_nom($search){
        /**
      * Mètode que ordena les dades de la funcio verProducto per ordre alfabetic
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model('ProductesModel');//carguem el model
        $ordenar = array('categorias' => $this->ProductesModel->llista_cat(),
                    'resultat2' => $this->ProductesModel->ordenar_llista_nom($search),
                    'familias' => $this->ProductesModel->MostrarFamilias(),
                    'p'=>$search);
    $this->load->view('header/header_s',$ordenar);
    $this->load->view('container/resultat',$ordenar);
    $this->load->view('footer/footer_s');
      }



      public function ordenar_llista_preu_asc($search){
          /**
      * Mètode que ordena les dades de la funcio verProducto per preu ascendent
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model('ProductesModel');//carguem el model
        $ordenar2 = array('categorias' => $this->ProductesModel->llista_cat(),
                    'resultat2' => $this->ProductesModel->ordenar_llista_preu_asc($search),
                    'familias' => $this->ProductesModel->MostrarFamilias(),
                    'p'=>$search);
        $this->load->view('header/header_s',$ordenar2);
    $this->load->view('container/resultat',$ordenar2);
    $this->load->view('footer/footer_s');
      }



      public function ordenar_llista_preu_desc($search){
          /**
      * Mètode que ordena les dades de la funcio verProducto per preu descendent
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model('ProductesModel');//carguem el model
        $ordenar3 = array('categorias' => $this->ProductesModel->llista_cat(),
                    'resultat2' => $this->ProductesModel->ordenar_llista_preu_desc($search),
                    'familias' => $this->ProductesModel->MostrarFamilias(),
                    'p'=>$search);
        $this->load->view('header/header_s',$ordenar3);
    $this->load->view('container/resultat',$ordenar3);
    $this->load->view('footer/footer_s');
      }
      public function filtro_cat($search){
          /**
      * Mètode que mostra de la cerca que has fet Fs els productes de la categoria desitjada 
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model('ProductesModel');
        $b = $this->input->post('categoria');
        $filtrar_cat = array('categorias' => $this->ProductesModel->llista_cat(),
                    'resultat2' => $this->ProductesModel->filtrar_cat($b,$search),
                    'familias' => $this->ProductesModel->MostrarFamilias(),
                    'id_cat'=>$b,
                      'p'=>$search);
        $this->load->view('header/header_s',$filtrar_cat);
    $this->load->view('container/resultat',$filtrar_cat);
    $this->load->view('footer/footer_s');
      }


      public function ordenar_cat_precio_asc($search){
          /**
      * Mètode que ordena les dades de la funcio verProducto per preu ascendent y per categoria
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
        $this->load->helper("url");
        $this->load->helper("form");
        $id_cat = $this->uri->segment(5);
        $this->load->model('ProductesModel');//carguem el model
        $ordenar3 = array('categorias' => $this->ProductesModel->llista_cat(),
                'resultat2' => $this->ProductesModel->ordenar_cat_preu_asc($id_cat,$search),
                'familias' => $this->ProductesModel->MostrarFamilias(),
                'p'=>$search,
                  'id_cat'=>$id_cat);
        $this->load->view('header/header_s',$ordenar3);
    $this->load->view('container/resultat',$ordenar3);
    $this->load->view('footer/footer_s');
      }


      public function ordenar_cat_precio_desc($search){
            /**
      * Mètode que ordena les dades de la funcio verProducto per preu descendent y per categoria
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
        $this->load->helper("url");
        $this->load->helper("form");
        $id_cat = $this->uri->segment(5);
        $this->load->model('ProductesModel');//carguem el model
        $ordenar3 = array('categorias' => $this->ProductesModel->llista_cat(),
                    'resultat2' => $this->ProductesModel->ordenar_cat_preu_desc($id_cat,$search),
                    'familias' => $this->ProductesModel->MostrarFamilias(),
                    'p'=>$search,
                      'id_cat'=>$id_cat);
        $this->load->view('header/header_s',$ordenar3);
    $this->load->view('container/resultat',$ordenar3);
    $this->load->view('footer/footer_s');
      }

      public function ordenar_cat_nombre($search){
            /**
      * Mètode que ordena les dades de la funcio verProducto per ordre alfabetic y per categoria
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
        $this->load->helper("url");
        $this->load->helper("form");
        $id_cat = $this->uri->segment(5);
        $this->load->model('ProductesModel');//carguem el model
        $ordenar3 = array('categorias' => $this->ProductesModel->llista_cat(),
                    'resultat2' => $this->ProductesModel->ordenar_cat_nombre($id_cat,$search),
                    'familias' => $this->ProductesModel->MostrarFamilias(),
                    'p'=>$search,
                      'id_cat'=>$id_cat);
        $this->load->view('header/header_s',$ordenar3);
    $this->load->view('container/resultat',$ordenar3);
    $this->load->view('footer/footer_s');
      }

      public function llista_categorias($search){
            /**
      * Mètode que mostra les families i categories en la barra del header
      * @param $search és el contingut del input de la cerca que esta en la URL
      * @author Ferran
      */
        $this->load->helper("url");
        $this->load->helper("form");
        $this->load->model('ProductesModel');//carguem el model
        $categoria = $this->uri->segment(3);
        $comprovar_cat = $this->ProductesModel->comprovar_categoria();
      if ($comprovar_cat!=false){
        $resultat =  array('resultat2' => $this->ProductesModel->select_categoria($categoria),
                  'familias' => $this->ProductesModel->MostrarFamilias(),
                  'categorias' => $this->ProductesModel->llista_cat()
                  );
        $this->load->view('header/header_s',$resultat);
      $this->load->view('container/select_categorias',$resultat);
      $this->load->view('footer/footer_s');
        }
  }

  public function detalle(){
        /**
      * Mètode que mostra el producte que has clickat totes les seves dades
      * @author Ferran
      */
    $this->load->helper("url");
        $this->load->helper("form");
        $productID = $this->uri->segment(3);
        $this->load->model('ProductesModel');//carguem el model
        $resultat =  array('detall' => $this->ProductesModel->mostrar_detall($productID),
                  'familias' => $this->ProductesModel->MostrarFamilias(),
                  'categorias' => $this->ProductesModel->llista_cat(),
                  'id_producte' => $productID
                  );
    $this->load->view('header/header_s',$resultat);
    $this->load->view('container/container_detalle',$resultat);
    $this->load->view('footer/footer_s');


  }
	
}
