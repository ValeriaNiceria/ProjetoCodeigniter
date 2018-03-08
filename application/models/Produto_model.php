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
			}else
			{
				return NULL;
			}
		}
		return FALSE;
	}


	public function findPagination($tabela, $por_pagina, $inicio)
	{
		$this->db->limit($por_pagina, $inicio);
		$query = $this->db->get($tabela);
		return $query->result_array();
	}



	public function num_rows($tabela)
    {
        $query = $this->db->get($tabela);
        return $query->num_rows();
    }


    public function get_ultimos()
    {	
    	$this->db->order_by('data', 'desc')->limit(2);
    	$query = $this->db->get("produtos");
    	if ($query->num_rows() > 0){
    		return $query->result_array();
    	}else {
    		return NULL;
    	}
    }


    public function findMeusPagination($id, $tabela, $por_pagina, $inicio)
	{
		$this->db->where('vendedor_id', $id);
		$this->db->limit($por_pagina, $inicio);
		$query = $this->db->get($tabela);
		return $query->result_array();
	}

}