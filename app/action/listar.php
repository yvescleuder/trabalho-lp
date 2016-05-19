<?php

require_once('../controller/ConvenioController.php');

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

switch($acao)
{
	case "listarConvenio":
	{
		$controller = new ConvenioController();
		echo json_encode($controller->listar());
		break;
	}
    default: 
    {
        echo "Operação inválida";
        break;
    }

}