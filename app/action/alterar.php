<?php

require_once('../controller/PacienteController.php');

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

switch($acao)
{
	case "editarPaciente":
	{
		$controller = new PacienteController();
		return $controller->alterar();
		break;
	}
    default: 
    {
        echo "Operação inválida";
        break;
    }

}