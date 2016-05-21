<?php

require_once('Model.php');

class Agendamento extends Model
{
	private $tabela = 'agendamento';

	public function __construct()
	{
		$this->open();
	}

	public function inserir($dados)
	{
		$inserir = $this->database->insert($this->tabela, $dados);

        if($inserir == true)
        {
            return true;
        }
    
        $this->mostrarError();
        return false;
	}
}