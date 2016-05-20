<?php

require_once('Model.php');

class Especialidade extends Model
{
	private $tabela = 'especialidade';

	public function __construct()
	{
		$this->open();
	}

	public function listar()
	{
		$listar = $this->database->select($this->tabela, "*");

		return $listar;
	}
}