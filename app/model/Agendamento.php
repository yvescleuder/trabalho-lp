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
            return $inserir;
        }
    
        $this->mostrarError();
        return false;
	}

	public function verificarDataHora($data, $hora)
	{
		$verificar = $this->database->has($this->tabela, ['AND' => ['data' => $data, 'hora' => $hora]]);

		if($verificar == true)
        {
            return true;
        }
    
        $this->mostrarError();
        return false;			
	}

	public function verificarExiste($id)
	{
		$existe = $this->database->select($this->tabela, "*", ['id' => $id]);
		
		if($existe == true)
		{
			return true;
		}
    
        $this->mostrarError();
        return false;		
	}

	public function buscarPorCodigo($id)
	{
		$buscar = $this->database->query("SELECT
											t1.id,
											date_format(t1.data,'%d/%m/%Y') as data,
											date_format(t1.hora,'%H:%i') as hora,
											CASE t1.tipo
												WHEN 1 THEN 'Consulta'
												WHEN 2 THEN 'Retorno'
											END as tipoAgendamento,
											CONCAT(t2.id, ' - ' ,t2.nome) as nomePaciente,
											CONCAT(t3.crm, ' - ' ,t3.nome) as nomeMedico
										FROM $this->tabela as t1
										INNER JOIN paciente as t2 ON (t1.paciente_codigo = t2.codigo)
										INNER JOIN medico as t3 ON (t1.medico_id = t3.id)
										WHERE t1.id = $id")->fetch();

		return $buscar;
	}

	public function listarCalendario()
	{
		$resultado = [];

		$listar = $this->database->query("SELECT
											t1.id,
											CONCAT(date_format(t1.data,'%Y-%m-%d'), ' ', date_format(t1.hora,'%H:%i')) as start,
											CONCAT(date_format(t1.data,'%Y-%m-%d'), ' ', date_format(DATE_ADD(t1.hora, INTERVAL 1 HOUR),'%H:%i')) as end,
											CONCAT(t2.nome, ' - ', t3.nome) as title,
											CASE t1.tipo
												WHEN 1
													THEN '#0073b7'
												WHEN 2
													THEN '#f39c12'
											END as cor
										FROM $this->tabela as t1
										INNER JOIN paciente as t2 ON (t1.paciente_codigo = t2.codigo)
										INNER JOIN medico as t3 ON (t1.medico_id = t3.id)
										WHERE t1.data >= CURDATE()")->fetchAll();

		foreach($listar as $key => $value)
		{
			$linha = ["title" => $value->title, "start" => $value->start, "end" => $value->end, "backgroundColor" => $value->cor, "borderColor" => $value->cor];
			$resultado['dados'][] = $linha;
		}

		return $resultado;
	}

	public function listar()
	{
		$listar = $this->database->query("SELECT
											t1.id,
											CONCAT(date_format(t1.data,'%d/%m/%Y'), ' - ', date_format(t1.hora,'%H:%i')) as datahora,
											CASE t1.tipo
												WHEN 1 THEN 'Consulta'
												WHEN 2 THEN 'Retorno'
											END as tipoAgendamento,
											CONCAT(t2.id, ' - ' ,t2.nome) as nomePaciente,
											CONCAT(t3.crm, ' - ' ,t3.nome) as nomeMedico
										FROM $this->tabela as t1
										INNER JOIN paciente as t2 ON (t1.paciente_codigo = t2.codigo)
										INNER JOIN medico as t3 ON (t1.medico_id = t3.id)
										WHERE t1.data >= CURDATE()")->fetchAll();

		return $listar;
	}
}