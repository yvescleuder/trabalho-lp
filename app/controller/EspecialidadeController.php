<?php

// Importação de Controller
require_once('Controller.php');
// Importação de Model
require_once('../model/Especialidade.php');
// Importação de Classes que não são do projeto
require_once('../../vendor/wixel/gump/gump.class.php');

class EspecialidadeController extends Controller
{
	private $especialidade;

	public function __construct()
	{
		parent::__construct();
		$this->especialidade = new Especialidade();
	}

	public function listar()
	{
		return $this->especialidade->listar();
	}


}