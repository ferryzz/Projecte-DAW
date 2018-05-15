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
	
	public function pago()
	{
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_pago');
		$this->load->view('footer/footer_s');
	}
	
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
	
}
