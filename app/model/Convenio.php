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
	
	public function listarEditar($convenio_id)
	{
		$listar = $this->database->query("SELECT * FROM $this->tabela WHERE id != $convenio_id")->fetchAll();

		return $listar;
	}

}