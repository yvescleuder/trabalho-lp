<?php

require_once('../controller/PacienteController.php');
require_once('../controller/MedicoController.php');
require_once('../controller/AgendamentoController.php');

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

switch($acao)
{
	case "cadastrarPaciente":
	{
		$controller = new PacienteController();
		return $controller->inserir();
		break;
	}

	case "cadastrarMedico":
	{
		$controller = new MedicoController();
		return $controller->inserir();
		break;
	}

	case "cadastrarAgendamento":
	{
		$controller = new AgendamentoController();
		return $controller->inserir();
		break;
	}

    default: 
    {
        echo "Operação inválida";
        break;
    }

}