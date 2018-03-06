<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Produto_model');
	}


	public function verificar_sessao()
	{
		if (!$this->session->userdata('logado'))
		{
			$this->load->view('login');
		}
	}

	public function index()
	{	
		//verifica se o usuário está logado
		$this->verificar_sessao();

		$tabela = "produtos";
		$dados['produtos'] = $this->Produto_model->getAll($tabela);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('lista_produtos', $dados);
		$this->load->view('includes/html_footer');
	}
}