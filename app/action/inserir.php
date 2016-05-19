<?php

require_once('../controller/PacienteController.php');

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

switch($acao)
{
	case "cadastrarPaciente":
	{
		$controller = new PacienteController();
		return $controller->cadastrar();
		break;
	}
    default: 
    {
        echo "Operação inválida";
        break;
    }

}