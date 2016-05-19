<?php

require_once('../controller/ConvenioController.php');
require_once('../controller/PacienteController.php');

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
    default: 
    {
        echo "Operação inválida";
        break;
    }

}