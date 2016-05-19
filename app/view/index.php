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
			#require_once('paciente-editar.php');
			break;
		}
		
		default:
		{
			echo 'pagina não existe';
			break;
		}
	}
}