<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function cadastrar($tabela, $dados)
	{
		if (isset($tabela) && is_array($dados)) 
		{
			return $this->db->insert($tabela, $dados);
		}
		return FALSE;
	}


	public function getAll($tabela)
	{
		if (isset($tabela)) {
			$query = $this->db->get($tabela);
			if ($query->num_rows() > 0) {
				return $query->result_array();
			} else {
				return NULL;
			}
		}
		return FALSE;
	}


	public function excluir($id, $tabela)
	{
		if (!is_null($id) && isset($tabela))
		{
			$this->db->where('id', $id);
			return $this->db->delete($tabela);
		}
		return FALSE;
	}


	public function getById($id, $tabela)
	{
		if (!is_null($id) && isset($tabela))
		{
			$this->db->where('id', $id);
			$query = $this->db->get($tabela);
			if ($query->num_rows() > 0) 
			{
				return $query->row_array();
			} else
			{
				return NULL;
			}
		}
	}


	public function atualizar($id, $tabela, $dados)
	{
		if (is_array($dados) && !is_null($id) && isset($tabela))
		{
			$this->db->where('id', $id);
			return $this->db->update($tabela, $dados);
		}
		return FALSE;
	}


	public function login($tabela, $email, $senha)
	{
		if (isset($tabela) && isset($email) && isset($senha))
		{
			$this->db->where('email', $email);
			$this->db->where('senha', $senha);
			$this->db->where('status', 1);

			return $this->db->get($tabela)->row_array();
		}
		return FALSE;
	}
}