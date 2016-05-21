<?php

// Importação de Controller
require_once('Controller.php');
require_ONCE('PacienteController.php');
// Importação de Model
require_once('../model/Agendamento.php');

class AgendamentoController extends Controller
{
	private $agendamento;
	private $paciente;

	public function __construct()
	{
		parent::__construct();
		$this->agendamento = new Agendamento();
		$this->paciente = new PacienteController();
	}

	public function inserir()
	{
		$dados = $this->input->get('agendamento');

		$resultadoInvalido = "";

		// Faz a validação de todos os campos
		$valido = GUMP::is_valid($dados, array(
			'paciente_codigo' => 'required|min_len,1|max_len,10',
			'data' => 'required|date',
			'hora' => 'required',
			'medico_id' => 'required|min_len,1|max_len,10',
			'tipo' => 'required|min_len,1|max_len,1',
		));

		if($valido !== true)
		{
			foreach($valido as $value)
		  	{
		   		$resultadoInvalido .= $value.'<br>';
		  	}
		 	
		 	$this->resposta = ["msg" => ["tipo" => "e", "texto" => $resultadoInvalido]];
		}
		else
		{
			if($this->paciente->verificarExiste($dados['paciente_codigo']))
			{
				// Insere o paciente no banco de dados
				$resultado = $this->agendamento->inserir($dados);

				if($resultado == true)
				{
					$this->resposta = ['msg' => ['tipo' => 's', 'texto' => "Agendamento criado com sucesso"]];
				}
				else
				{
					$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => "Criação de agendamento falhou"]];
				}
			}
			else
			{
				$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => "O Paciente de Código (".$dados['paciente_codigo'].") não existe"]];
			}
			
		}

		echo json_encode($this->resposta);
	}
}