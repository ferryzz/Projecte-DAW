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
		$this->load->helper("form");
		
	    $this->load->model("ProductesModel");
	  
	    $data = array(
						'productos' => $this->ProductesModel->MostrarProductes()
				);
				
		$this->load->helper("url");
		$this->load->view('header/header_s');
		$this->load->view('container/container_prod',$data);
		$this->load->view('footer/footer_s');
	}

	public function verProductos()
      {
      	$this->load->helper("form");
      	$this->load->library('form_validation');
		$this->form_validation->set_rules('buscar', 'Buscar', 'trim|min_length[4]|max_length[20]|prep_for_form');
		$this->form_validation->set_message('min_length', 'La longitud minima es de 4');
		$this->form_validation->set_message('max_length', 'La longitud maxima es de 20');
      	if ($this->form_validation->run() == TRUE)
                {
			      	$this->load->helper("url");
			      	$this->load->model('ProductesModel');//carguem el model
			      	$a = $this->input->post('buscar');
			        $resultat = array('resultat2' => $this->ProductesModel->select($a),
			     					'categorias' => $this->ProductesModel->llista_cat(),
			     					'p'=>$a);
			        $this->load->view('header/header_s');
			        $this->load->view('container/resultat',$resultat);
					$this->load->view('footer/footer_s');
			    }
		else
				{
					$data = array(
						'productos' => $this->ProductesModel->MostrarProductes()
				);
					$this->load->helper("url");
					$this->load->view('header/header_s');
					$this->load->view('container/container_prod',$data);
					$this->load->view('footer/footer_s');
				}
      }

      public function ordenar_nombres()
      {
      	$this->load->helper("url");
      	$this->load->helper("form");
      	$this->load->model('ProductesModel');//carguem el model
      	$ordenar = $this->uri->segment(3);
      	$search = $this->uri->segment(4);
      	
      	if ($ordenar == 'nombre') {
      		$funcio = $this->ordenar_llista_nom($search);
      	}elseif($ordenar == 'precio_desc'){
      		$funcio = $this->ordenar_llista_preu_desc($search);
      	}else{
      		$funcio = $this->ordenar_llista_preu_asc($search);
      	}

      }

      public function ordenar_llista_nom($search){
      	$this->load->helper("url");
      	$this->load->helper("form");
      	//$this->load->model('informe_model');//carguem el model
      	$ordenar = array('categorias' => $this->ProductesModel->llista_cat(),
			     					'resultat2' => $this->ProductesModel->ordenar_llista_nom($search),
			     					'p'=>$search);
		$this->load->view('header/header_s');
		$this->load->view('container/resultat',$ordenar);
		$this->load->view('footer/footer_s');
      }



      public function ordenar_llista_preu_asc($search){
      	$this->load->helper("url");
      	$this->load->helper("form");
      	//$this->load->model('informe_model');//carguem el model
      	$ordenar2 = array('categorias' => $this->ProductesModel->llista_cat(),
			     					'resultat2' => $this->ProductesModel->ordenar_llista_preu_asc($search),
			     					'p'=>$search);
      	$this->load->view('header/header_s');
		$this->load->view('container/resultat',$ordenar2);
		$this->load->view('footer/footer_s');
      }



      public function ordenar_llista_preu_desc($search){
      	$this->load->helper("url");
      	$this->load->helper("form");
      	//$this->load->model('informe_model');//carguem el model
      	$ordenar3 = array('categorias' => $this->ProductesModel->llista_cat(),
			     					'resultat2' => $this->ProductesModel->ordenar_llista_preu_desc($search),
			     					'p'=>$search);
      	$this->load->view('header/header_s');
		$this->load->view('container/resultat',$ordenar3);
		$this->load->view('footer/footer_s');
      }
	
	
}
