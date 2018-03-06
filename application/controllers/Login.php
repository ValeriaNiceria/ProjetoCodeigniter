<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
	}


	public function index()
	{
		$this->load->view('login');
	}


	public function logar()
	{
		$email = $this->input->post('email');
		$senha = md5($this->input->post('senha'));

		$tabela = "usuarios";
		$dadosLogin = $this->Usuario_model->login($tabela, $email, $senha);

		if (count($dadosLogin) == 1)
		{
			$dados = array(
				'logado' => TRUE,
				'id' => $dadosLogin->id,
				'nome' => $dadosLogin->nome
			);

			$this->session->set_userdata($dados);
			redirect('dashboard');
		} else
		{
			$this->session->set_flashdata('error', 'Email ou senha inválidos');
			redirect('login');
		}
	}


	public function logout()
	{
		$this->session->unset_userdata('logado');
		/*$this->session->sess_destroy();*/
		redirect('login');
	}

}