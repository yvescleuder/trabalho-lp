<?php

require_once('../controller/ConvenioController.php');
require_once('../controller/PacienteController.php');
require_once('../controller/EspecialidadeController.php');
require_once('../controller/MedicoController.php');
require_once('../controller/AgendamentoController.php');

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

switch($acao)
{
	case "listarConvenio":
	{
		$controller = new ConvenioController();
		echo json_encode($controller->listar());
		break;
	}

	case "buscarPaciente":
	{
		$controller = new PacienteController();
		echo json_encode($controller->buscarPorCodigo());
		break;
	}

	case "listarConvenioEditar":
	{
		$controller = new ConvenioController();
		echo json_encode($controller->listarEditar());
		break;
	}

	case "listarEspecialidade":
	{
		$controller = new EspecialidadeController();
		echo json_encode($controller->listar());
		break;
	}

	case "listarMedico":
	{
		$controller = new MedicoController();
		echo json_encode($controller->listar());
		break;
	}

	case "buscarAgendamento":
	{
		$controller = new AgendamentoController();
		echo json_encode($controller->verificarExiste());
		break;
	}

	case "buscarDadosAgendamento":
	{
		$controller = new AgendamentoController();
		echo json_encode($controller->buscarPorCodigo());
		break;
	}

	case "listarAgendamento":
	{
		$controller = new AgendamentoController();
		echo json_encode($controller->listar());
		break;
	}

    default: 
    {
        echo "Operação inválida";
        break;
    }

}