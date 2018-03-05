<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
	}

	public function index()
	{
		$tabela = "usuarios";

		$dados['usuarios'] = $this->Usuario_model->getAll($tabela);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('listar_usuario', $dados);
		$this->load->view('/includes/html_footer');
	}


	public function cadastro() 
	{
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastro_usuario');
		$this->load->view('/includes/html_footer');	
	}


	public function cadastrar()
	{
		$dados = array(
			'nome' => $this->input->post('nome'),
			'cpf' => $this->input->post('cpf'),
			'endereco' => $this->input->post('endereco'),
			'email' => $this->input->post('email'),
			'senha' => md5($this->input->post('senha')),
			'nivel' => $this->input->post('nivel'),
			'status' => $this->input->post('status')
		);

		$tabela = "usuarios";

		if ($this->Usuario_model->cadastrar($tabela, $dados))
		{
			$this->session->set_flashdata('success', 'Usuário cadastrado com sucesso.');
			redirect('usuario');
		} else 
		{
			$this->session->set_flashdata('error', 'Não foi possível realizar o cadastro.');
		}
	}


	public function excluir()
	{
		$id = $this->uri->segment(3);
		$tabela = "usuarios";

		if ($this->Usuario_model->excluir($id, $tabela))
		{
			$this->session->set_flashdata('success', 'Usuário foi excluído com sucesso.');
			redirect('usuario');
		} else
		{
			$this->session->set_flashdata('error', 'Não foi possível excluir o usuário.');
			redirect('usuario');
		}
	}

}
