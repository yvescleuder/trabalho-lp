<?php

require_once('Model.php');

class Medico extends Model
{
	private $tabela = 'medico';

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

	public function valorExiste($campo, $valor)
	{
		$existe = $this->database->has($this->tabela, [$campo => $valor]);

		if($existe == true)
		{
			return true;
		}
    
        $this->mostrarError();
        return false;
	}
}