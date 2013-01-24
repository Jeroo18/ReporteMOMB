<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller{
			
	public function __construct(){
		//Llamando al constructor padre
		parent::__construct();
		
		//Cargando el usuario autenticado
		//$this->data['usuarioAutenticado'] = $this->_usuarioAutenticado;
		
		//variable usada para marcar la pantalla donde te encuentras
		//$this->data['pantalla'] = 'inicio';	
	}
	
	public function index()
	{							
		//Cargando la vista		
		$this->load->view("main");		
	}
}
