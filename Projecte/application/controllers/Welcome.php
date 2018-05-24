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
		$this->load->helper("url");
		
	    $this->load->model("ProductesModel");
	  
	    $data = array(
						'productos' => $this->ProductesModel->MostrarProductes()
				);
				
		$this->load->helper("url");
		$this->load->view('header/header_s');
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
		$data = array('productos' => $this->ProductesModel->MostrarProductes());
		
        $this->load->view('header/header_c');
		$this->load->view('container/container_prod',$data);
	    $this->load->view('footer/footer_s');
    }
    else {
      
      $this->session->set_flashdata('error', 'El usuario o contraseña son incorrectos.');
      $this->load->view('header/header_s');
	  $this->load->view('container/container_prod',$data);
	  $this->load->view('footer/footer_s');
    }
  } 
  
  public function logout()
  {
    $this->load->helper("url");
	  $this->load->library("session");
	  $this->load->helper("form");
    
    $datasession = array('email' => '', 'login_ok' => FALSE);
    
    $this->session->unset_userdata($datasession);
	$this->session->sess_destroy();
    
     $this->load->view('header/header_s');
	  $this->load->view('container/container_prod');
	  $this->load->view('footer/footer_s');
  }
  
	
	public function quisom()
	{
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_quisom');
		$this->load->view('footer/footer_s');
	}
	
	public function garantia()
	{
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_garantia');
		$this->load->view('footer/footer_s');
	}
	public function lugar()
	{
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_lugar');
		$this->load->view('footer/footer_s');
	}
	public function aviso()
	{
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
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_privacidad');
		$this->load->view('footer/footer_s');
	}
	public function envio()
	{
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
	    if (isset($session["cesta"])) {
	    	$data = array(
				'productes' => $this->CestaResumenModel->getProductes($session),
				'cantidades' => $this->CestaResumenModel->getCantidades($session)
		);
	    }else{
	    	$data = array();
	    }
	    
	  	

	  $this->load->view('header/header_s');
		$this->load->view('container/container_cesta_resumen',$data);
		$this->load->view('footer/footer_s'); 
	}

	public function addproduct($productID = 0, $cantidad = 0)
  {
      /**
    * Mètode que afegeix un producte a la cistella
    * @param $productID és el id de producte i $cantidad la cantitat d'aquest producte
    * @author Sergi
    */
      $this->load->helper("url");
      $this->load->helper("form");
      if ($cantidad==0) {
        $cantidad=$this->input->post("quantity");
      }


    	for ($i=0; $i < $cantidad; $i++) { 
    		# code...
    	
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
    	$this->load->helper("url");
      	$session = $this->session->userdata();
      	$session["login"]=1;
      	$this->session->set_userdata($session);
      	if (!isset($session["login"]) or $session["login"]==0){
      		$this->load->view('header/header_s');
      		$this->load->view('validar/no_validat');
      		$this->load->view('footer/footer_s'); 
      	}else{
      		$data = array(
				'usuari' => $this->ValidarUsuariModel->getUsuari($session)

			);
			$this->load->view('header/header_s');
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
		$this->load->view('header/header_s');
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
	
}
