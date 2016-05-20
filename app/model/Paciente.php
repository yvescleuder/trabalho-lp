<?php

require_once('Model.php');

class Paciente extends Model
{
	private $tabela = 'paciente';
	private $tabelaConvenio = 'convenio';

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

	public function buscarPorCodigo($codigo)
	{
		$buscar = $this->database->query("SELECT
											t1.*,
											t2.id as convenio_id,
											t2.nome as convenio_nome
										FROM $this->tabela as t1
										INNER JOIN $this->tabelaConvenio as t2 ON (t1.convenio_id = t2.id)
										WHERE codigo = $codigo")->fetch();
		
		if($buscar == true)
		{
			return $buscar;
		}
    
        $this->mostrarError();
        return false;		
	}

	public function alterar($dados)
	{
		$codigo = $dados['codigo'];
        unset($dados['codigo']);

        $alterar = $this->database->update($this->tabela, $dados, ["codigo" => $codigo]);

        if($alterar == true)
        {
            return true;
        }

        $this->mostrarError();
        return false;
	}
}