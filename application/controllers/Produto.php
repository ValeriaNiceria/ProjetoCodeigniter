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
		if ($this->session->userdata('logado') == false)
		{
			redirect('login');
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


	public function cadastro()
	{
		//verfica se o usuário está logado
		$this->verificar_sessao();

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('cadastro_produto');
		$this->load->view('includes/html_footer');
	}


	public function cadastrar()
	{
		//verificar se o usuário está logado
		$this->verificar_sessao();

		$id_usuario = $this->session->userdata('id');
		$nome = $this->input->post('nome');
		$descricao = $this->input->post('descricao');
		$preco = $this->input->post('preco');

		$dados = array(
			'nome' => $nome,
			'descricao' => $descricao,
			'preco' => $preco,
			'usuario_id' => $id_usuario
		);
		$tabela = "produtos";

		if ($this->Produto_model->cadastrar($tabela, $dados))
		{
			$this->session->set_flashdata('success', 'Produto cadastrado com sucesso.');
			redirect('produto');
		} else
		{
			$this->session->set_flashdata('error', 'Não foi possível cadastrar o produto.');
			redirect('produto');
		}
	}



	public function excluir()
	{
		//verificar se o usuário está logado
		$this->verificar_sessao();

		$id = $this->uri->segment(3);
		$tabela = "produtos";

		if ($this->Produto_model->excluir($id, $tabela))
		{
			$this->session->set_flashdata('success', 'Produto excluído com sucesso.');
			redirect('produto');
		}else
		{
			$this->session->set_flashdata('error', 'Não foi possível excluir o produto.');
			redirect('produto');
		}
	}


	public function atualizar()
	{
		//verificar se o usuário está logado
		$this->verificar_sessao();

		$id = $this->uri->segment(3);
		$tabela = "produtos";

		$dados['produto'] = $this->Produto_model->getById($id, $tabela);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('editar_produto', $dados);
		$this->load->view('includes/html_footer');

		if ($_POST)
		{
			$nome = $this->input->post('nome');
			$descricao = $this->input->post('descricao');
			$preco = $this->input->post('preco');
			$id = $this->input->post('id');

			$tabela = "produtos";

			$dados = array(
				'nome' => $nome,
				'descricao' => $descricao,
				'preco' => $preco
			);

			if ($this->Produto_model->atualizar($id, $tabela, $dados))
			{
				$this->session->set_flashdata('success', 'Produto atualizado com sucesso.');
				redirect('produto');
			} else
			{
				$this->session->set_flashdata('error', 'Não foi possível atualizar o produto');
				redirect('produto');
			}
		}
	}
}