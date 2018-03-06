<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
	}


	public function verificar_sessao()
	{
		if ($this->session->userdata('logado') == false) {
			redirect('login');
		}
	}


	public function index()
	{
		/*verifica se o usuário está logado*/
		$this->verificar_sessao();

		$tabela = "usuarios";

		//Utilizando o Inner Join
		$this->db->join('estados', 'estados.id = estado_id');

		$dados['usuarios'] = $this->Usuario_model->getAll($tabela);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('listar_usuario', $dados);
		$this->load->view('includes/html_footer');
	}


	public function cadastro() 
	{
		/*verifica se o usuário está logado*/
		$this->verificar_sessao();

		//Pegando os estados do banco de dados
		$this->load->model('Estado_model');
		$tabela = "estados";
		$dados['estados'] = $this->Estado_model->getAll($tabela);

		//Pegando as cidades do banco de dados
		$this->load->model('Cidade_model');
		$tabela = "cidades";
		$dados['cidades'] = $this->Cidade_model->getAll($tabela);

		/*Carregando a página*/
		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastro_usuario', $dados);
		$this->load->view('includes/html_footer');	
	}


	public function cadastrar()
	{
		/*verifica se o usuário está logado*/
		$this->verificar_sessao();

		$dados = array(
			'nome' => $this->input->post('nome'),
			'cpf' => $this->input->post('cpf'),
			'endereco' => $this->input->post('endereco'),
			'estado_id' => $this->input->post('estado'),
			'cidade_id' => $this->input->post('cidade'),
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
		/*verifica se o usuário está logado*/
		$this->verificar_sessao();
		
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
		/*verifica se o usuário está logado*/
		$this->verificar_sessao();

		//pegando o id na url
		$id = $this->uri->segment(3);
		$tabela = "usuarios";

		//Pegando os dados do usuário
		$dados['usuario'] = $this->Usuario_model->getById($id, $tabela);

		//Pegando os estados do banco de dados
		$this->load->model('Estado_model');
		$tabela = "estados";
		$dados['estados'] = $this->Estado_model->getAll($tabela);

		//Pegando as cidades do banco de dados
		$this->load->model('Cidade_model');
		$tabela = "cidades";
		$dados['cidades'] = $this->Cidade_model->getAll($tabela);

		/*Carregando a página de edição de usuarios*/
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
				'estado_id' => $this->input->post('estado'),
				'cidade_id' => $this->input->post('cidade'),
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
		/*verifica se o usuário está logado*/
		$this->verificar_sessao();

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
