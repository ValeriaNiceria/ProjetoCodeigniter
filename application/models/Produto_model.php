<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends MY_Model {


	public function pesquisar($pesquisa, $tabela)
	{
		if (isset($pesquisa) && isset($tabela))
		{
			$this->db->like('nome', $pesquisa);
			$this->db->or_like('descricao', $pesquisa);
			$query = $this->db->get($tabela);
			if ($query->num_rows() > 0)
			{
				return $query->result_array();
			}

		}
		return FALSE;
	}

}