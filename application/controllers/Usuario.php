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


	public function cadastro() 
	{
		//Pegando os estados do banco de dados
		$this->load->model('Estado_model');
		$tabela = "estados";
		$dados['estados'] = $this->Estado_model->getAll($tabela);

		/*Carregando a página*/
		$this->load->view('includes/html_header');
		$this->load->view('cadastro_usuario', $dados);
		$this->load->view('includes/html_footer');	
	}


	public function cadastrar()
	{
		$dados = array(
			'nome' => $this->input->post('nome'),
			'cpf' => $this->input->post('cpf'),
			'telefone' => $this->input->post('telefone'),
			'estado_id' => $this->input->post('estado'),
			'email' => $this->input->post('email'),
			'senha' => md5($this->input->post('senha')),
			'nivel' => $this->input->post('nivel'),
			'status' => $this->input->post('status')
		);

		$tabela = "usuarios";

		if ($this->Usuario_model->cadastrar($tabela, $dados))
		{
			$this->session->set_flashdata('success', 'Usuário cadastrado com sucesso.');
			redirect('login');
		} else 
		{
			$this->session->set_flashdata('error', 'Não foi possível realizar o cadastro.');
			redirect('usuario/cadastro');
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
			$this->session->unset_userdata('logado');
			redirect('login');
		} else
		{
			$this->session->set_flashdata('error', 'Não foi possível excluir o usuário.');
			redirect('usuario/perfil');
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
				'telefone' => $this->input->post('telefone'),
				'estado_id' => $this->input->post('estado'),
				'email' => $this->input->post('email'),
				'nivel' => $this->input->post('nivel'),
				'status' => $this->input->post('status')
			);

			if ($this->Usuario_model->atualizar($id, $tabela, $dados))
			{
				$this->session->set_flashdata('success', 'Dados atualizados com sucesso.');
				redirect('usuario/perfil');
			} else
			{
				$this->session->set_flashdata('error', 'Não foi possível atualizar o usuário.');
				redirect('usuario/perfil');
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


	public function perfil()
	{
		$id = $this->session->userdata('id');
		$tabela = "usuarios";
		$dados['usuario'] = $this->Usuario_model->getById($id, $tabela);

		$estado_id = $dados['usuario']['estado_id'];
		$tabela = "estados";
		$dados['estado'] = $this->Usuario_model->getById($estado_id, $tabela);

		$this->load->model('Produto_model');
		$dados['produtos_comprados'] = $this->Produto_model->produto_comprado($id);
		$dados['produtos_vendidos'] = $this->Produto_model->produto_vendido($id);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('perfil', $dados);
		$this->load->view('includes/html_footer');
	}
}
