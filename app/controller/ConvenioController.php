<?php

// Importação de Controller
require_once('Controller.php');
// Importação de Model
require_once('../model/Convenio.php');

class ConvenioController extends Controller
{
	private $convenio;

	public function __construct()
	{
		parent::__construct();
		$this->convenio = new Convenio();
	}

	public function listar()
	{
		return $this->convenio->listar();
	}

	public function listarEditar()
	{
		$convenio_id = $this->input->get("convenio_id");
		return $this->convenio->listarEditar($convenio_id);
	}
}