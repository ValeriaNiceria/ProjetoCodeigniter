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
		$this->load->view('includes/html_footer');
	}


	public function cadastro() 
	{
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastro_usuario');
		$this->load->view('includes/html_footer');	
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


	public function atualizar()
	{
		$id = $this->uri->segment(3);
		$tabela = "usuarios";

		$dados['usuario'] = $this->Usuario_model->getById($id, $tabela);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('editar_usuario', $dados);
		$this->load->view('includes/html_footer');	

		if ($_POST)
		{
			$tabela = "usuarios";
			$id = $this->input->post('id');

			$dados = array(
				'nome' => $this->input->post('nome'),
				'cpf' => $this->input->post('cpf'),
				'endereco' => $this->input->post('endereco'),
				'email' => $this->input->post('email'),
				'nivel' => $this->input->post('nivel'),
				'status' => $this->input->post('status')
			);

			if ($this->Usuario_model->atualizar($id, $tabela, $dados))
			{
				$this->session->set_flashdata('success', 'Usuário atualizado com sucesso.');
				redirect('usuario');
			} else
			{
				$this->session->set_flashdata('error', 'Não foi possível atualizar o usuário.');
				redirect('usuario');
			}
		}
	}



	public function salvar_senha()
	{
		$id = $this->input->post('id');
		$tabela = "usuarios";

		$senha_antiga = md5($this->input->post('senha_antiga'));
		
		//pega a senha do banco
		$usuario = $this->Usuario_model->getById($id, $tabela);

		if ($senha_antiga === $usuario['senha'])
		{
			$dados = array(
				'senha' => md5($this->input->post('senha_nova'))
			);
			if ($this->Usuario_model->atualizar($id, $tabela, $dados))
			{
				$this->session->set_flashdata('success', 'Senha foi atualizada com sucesso.');
				redirect("usuario/atualizar/".$id);
			} else 
			{
				$this->session->set_flashdata('error', 'Não foi possível atualizar a senha.');
				redirect("usuario/atualizar/".$id);
			}
		} else
		{
			$this->session->set_flashdata('error', 'Senha antiga não é a mesma que está cadastrada no banco.');
			redirect("usuario/atualizar/".$id);
		}
	}

}
