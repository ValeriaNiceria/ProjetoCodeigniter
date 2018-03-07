<?php

class Usuario_model extends MY_Model {


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