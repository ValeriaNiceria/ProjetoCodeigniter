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

		$por_pagina = 4; //número de registros por página
		$inicio = ($this->uri->segment(2)) ? $this->uri->segment(2) : ''; //Está pegando o segundo campo da url

		$tabela = "produtos";
		$dados['produtos'] = $this->Produto_model->findPagination($tabela, $por_pagina, $inicio);


		// ** Dados para paginação ** 
		$this->load->library('pagination');
		
		$config['base_url'] = base_url() . 'page/';
		$config['per_page'] = $por_pagina; 
		$config['total_rows'] = $this->Produto_model->num_rows($tabela);
		$config['num_links'] = 5;
		$config['first_url'] = '0';
		$config['uri_segment'] = 2;
		//** Inicializar a paginação **
		$this->pagination->initialize($config);
		//** Criar links da paginação ** 
		$dados['paginacao_produtos'] = $this->pagination->create_links(); 


		/*Carregando a páginas*/
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


	public function pesquisar()
	{
		//verifica se o usuário está logado
		$this->verificar_sessao();

		$pesquisa = $this->input->post('pesquisar');
		$tabela = "produtos";
		$dados['produtos'] = $this->Produto_model->pesquisar($pesquisa, $tabela);

		$this->load->view('includes/html_header');
		$this->load->view('includes/menu');
		$this->load->view('lista_produtos', $dados);
		$this->load->view('includes/html_footer');	
	}
}