<?php

if(!isset($_GET['pagina']))
{
	require_once('inicio.php');
}
elseif(empty($_GET['pagina']))
{
	require_once('inicio.php');
}
else
{
	switch($_GET['pagina'])
	{
		case 'inicio':
		{
			require_once('inicio.php');
			break;
		}

		case 'paciente/cadastrar':
		{
			require_once('paciente-cadastrar.php');
			break;
		}

		case "paciente/editar":
		{
			require_once('paciente-editar.php');
			break;
		}
		
		case "agendamento/cadastrar":
		{
			require_once('agendamento-cadastrar.php');
			break;
		}

		case "agendamento/visualizar":
		{
			require_once('agendamento-visualizar.php');
			break;
		}

		case "medico/cadastrar":
		{
			require_once('medico-cadastrar.php');
			break;
		}

		case "agendamentos":
		{
			require_once('agendamentos.php');
			break;
		}
		
		default:
		{
			echo 'pagina não existe';
			break;
		}
	}
}