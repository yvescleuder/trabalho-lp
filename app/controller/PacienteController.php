<?php

// Importação de Controller
require_once('Controller.php');
// Importação de Model
require_once('../model/Paciente.php');
// Importação de Classes que não são do projeto
require_once('../../vendor/wixel/gump/gump.class.php');

class PacienteController extends Controller
{
	private $paciente;

	public function __construct()
	{
		parent::__construct();
		$this->paciente = new Paciente();
	}

	public function inserir()
	{
		$dados = $this->input->get('paciente');

		// Verifica se esses 2 campos (não são obrigátórios), se veio vazio eu removo eles para não irem com valores vazios para o banco.
		if(empty($dados['telefone2']))
		{
			unset($dados['telefone2']);
		}
		if(empty($dados['celular2']))
		{
			unset($dados['celular2']);
		}

		$resultadoInvalido = "";

		// Faz a validação de todos os campos
		$valido = GUMP::is_valid($dados, array(
			'codigo' => 'required|integer|min_len,1|max_len,10',
			'nome' => 'required|alpha_space|min_len,4|max_len,100',
			'sobrenome' => 'required|alpha_space|min_len,4|max_len,100',
			'telefone1' => 'required|min_len,14|max_len,16',
			'celular1' => 'required|min_len,14|max_len,16',
			'convenio_id' => 'required|min_len,1',
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
			// Verifica se o valor do campo codigo já existe no banco de dados 
			if($this->paciente->valorExiste('codigo', $dados['codigo']))
			{
				$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => MensagemController::msg003($dados['codigo'])]];
			}
			else
			{
				// Insere o paciente no banco de dados
				$resultado = $this->paciente->inserir($dados);

				if($resultado == true)
				{
					$this->resposta = ['msg' => ['tipo' => 's', 'texto' => MensagemController::msg001()]];
				}
				else
				{
					$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => MensagemController::msg002()]];
				}
			}
		}

		echo json_encode($this->resposta);
	}

	public function buscarPorCodigo()
	{
		$codigo = $this->input->get("codigo");
		$dados = array('codigo' => $codigo);
		$resultadoInvalido = "";

		// Faz a validação de todos os campos
		$valido = GUMP::is_valid($dados, array(
			'codigo' => 'required|integer|min_len,1|max_len,10'
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
			$buscar = $this->paciente->buscarPorCodigo($codigo);

			if($buscar == true)
			{
				$this->resposta = ['msg' => ['tipo' => 's', 'texto' => $buscar]];
			}
			else
			{
				$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => MensagemController::msg004($codigo)]];
			}
		}

		return $this->resposta;
	}

	public function alterar()
	{
		$dados = $this->input->get('paciente');
		$codigo_paciente = $this->input->get('codigo_paciente');

		// Verifica se esses 2 campos (não são obrigátórios), se veio vazio eu removo eles para não irem com valores vazios para o banco.
		if(empty($dados['telefone2']))
		{
			unset($dados['telefone2']);
		}
		if(empty($dados['celular2']))
		{
			unset($dados['celular2']);
		}
		// Se chegar o código dele, irá retirar
		if(isset($dados['codigo']))
		{
			unset($dados['codigo']);
		}

		$resultadoInvalido = "";

		// Faz a validação de todos os campos
		$valido = GUMP::is_valid($dados, array(
			'nome' => 'required|alpha_space|min_len,4|max_len,100',
			'sobrenome' => 'required|alpha_space|min_len,4|max_len,100',
			'telefone1' => 'required|min_len,14|max_len,16',
			'celular1' => 'required|min_len,14|max_len,16',
			'convenio_id' => 'required|min_len,1',
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
			$dados['codigo'] = $codigo_paciente;

			// Insere o paciente no banco de dados
			$resultado = $this->paciente->alterar($dados);

			if($resultado == true)
			{
				$this->resposta = ['msg' => ['tipo' => 's', 'texto' => MensagemController::msg005()]];
			}
			else
			{
				$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => MensagemController::msg006()]];
			}
		}

		echo json_encode($this->resposta);
	}

	public function verificarExiste($codigo)
	{
		return $this->paciente->verificarExiste($codigo);
	}
}