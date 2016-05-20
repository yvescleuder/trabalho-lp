<?php

// Importação de Controller
require_once('Controller.php');
// Importação de Model
require_once('../model/Medico.php');
// Importação de Classes que não são do projeto
require_once('../../vendor/wixel/gump/gump.class.php');

class MedicoController extends Controller
{
	private $medico;

	public function __construct()
	{
		parent::__construct();
		$this->medico = new Medico();
	}

	public function cadastrar()
	{
		$dados = $this->input->get('medico');

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
			'crm' => 'required|integer|min_len,1|max_len,10',
			'nome' => 'required|alpha_space|min_len,4|max_len,100',
			'sobrenome' => 'required|alpha_space|min_len,4|max_len,100',
			'telefone1' => 'required|min_len,14|max_len,16',
			'celular1' => 'required|min_len,14|max_len,16',
			'especialidade_id' => 'required|min_len,1|max_len,10',
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
			if($this->medico->valorExiste('crm', $dados['crm']))
			{
				$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => "Este CRM ({$dados['crm']}) já existe"]];
			}
			else
			{
				// Insere o paciente no banco de dados
				$resultado = $this->medico->inserir($dados);

				if($resultado == true)
				{
					$this->resposta = ['msg' => ['tipo' => 's', 'texto' => "Médico criado com sucesso"]];
				}
				else
				{
					$this->resposta = ['msg' => ['tipo' => 'e', 'texto' => "Criação de médico falhou"]];
				}
			}
		}

		echo json_encode($this->resposta);
	}

}