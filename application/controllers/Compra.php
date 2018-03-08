<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compra extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Produto_model');
	}


	public function index()
	{
		$id_comprador = $this->session->userdata('id');
		$id = $this->uri->segment(2);
		$tabela = "produtos";

		$dados = array(
			'vendido' => 1,
			'comprador_id' => $id_comprador
		);

		if ($this->Produto_model->atualizar($id, $tabela, $dados)) 
		{
			$this->session->set_flashdata('success', 'Parabéns! Compra realizada com sucesso.');
			redirect('produto');
		} else
		{
			$this->session->set_flashdata('error', 'Não foi possível realizar à compra.');
			redirect('produto');
		}

	}
	
}