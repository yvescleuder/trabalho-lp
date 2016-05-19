<?php

require_once('Model.php');

class Convenio extends Model
{
	private $tabela = 'convenio';

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