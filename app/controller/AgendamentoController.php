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
		$dados['data'] = date("Y-m-d", strtotime($dados['data']));
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
			if($this->agendamento->verificarDataHora($dados['data'], $dados['hora']))
			{
				$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => "Já existe um agendamento com os respectivos horários (".date('d/m/Y', strtotime($dados['data']))." - ".$dados['hora'].")"]];
			}
			else
			{
				if($this->paciente->verificarExiste($dados['paciente_codigo']))
				{
					// Insere o paciente no banco de dados
					$resultado = $this->agendamento->inserir($dados);

					if($resultado == false)
					{
						$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => "Criação de agendamento falhou"]];
					}
					else
					{
						$this->resposta = ['msg' => ['tipo' => 's', 'texto' => "Agendamento criado com sucesso, <u>anote o número do agendamento</u>: <strong>".$resultado."</strong>"]];
					}
				}
				else
				{
					$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => "O Paciente de Código (".$dados['paciente_codigo'].") não existe"]];
				}
			}
		}

		echo json_encode($this->resposta);
	}

	public function verificarExiste()
	{
		$id = $this->input->get("id");

		if($this->agendamento->verificarExiste($id))
		{
			$this->resposta = ["msg" => ["tipo" => "s", "texto" => $id]];
		}
		else
		{
			$this->resposta = ["msg" => ["tipo" => "e", "texto" => 'Este agendamento não existe']];
		}

		return $this->resposta;
	}

	public function buscarPorCodigo()
	{
		$id = $this->input->get("id");

		return $this->agendamento->buscarPorCodigo($id);
	}

	public function listar()
	{
		return $this->agendamento->listar();
	}
}