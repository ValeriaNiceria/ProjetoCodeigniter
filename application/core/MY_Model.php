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
}