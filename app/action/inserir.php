<?php

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

switch($acao)
{
	case "cadastrarPaciente":
	{
		echo json_encode(['msg' => ['texto' => 'Cadastrar Paciente', 'tipo' => 's']]);
		break;
	}
    default: 
    {
        echo "Operação inválida";
        break;
    }

}