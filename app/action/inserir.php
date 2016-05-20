<?php

require_once('../controller/PacienteController.php');
require_once('../controller/MedicoController.php');

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

switch($acao)
{
	case "cadastrarPaciente":
	{
		$controller = new PacienteController();
		return $controller->cadastrar();
		break;
	}

	case "cadastrarMedico":
	{
		$controller = new MedicoController();
		return $controller->cadastrar();
		break;
	}

    default: 
    {
        echo "Operação inválida";
        break;
    }

}