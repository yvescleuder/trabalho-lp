<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SysMedic</title>

<link type="text/css" href="../../assets/css/bootstrap.min.css" rel="stylesheet">
<link type="text/css" href="../../assets/css/datepicker3.css" rel="stylesheet">
<link type="text/css" href="../../assets/css/styles.css" rel="stylesheet">
<link type="text/css" href="../../assets/css/font-awesome.css" rel="stylesheet">
<link type="text/css" href="../../assets/css/customizacao.css" rel="stylesheet">

<!-- Icons Base do Template -->
<script src="../../assets/js/lumino.glyphs.js"></script>

<!--[if lt IE 9]>
<script src="../../assets/js/html5shiv.js"></script>
<script src="../../assets/js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Sys</span>Medic</a>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>
		
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
		</form>
		<ul class="nav menu">
			<li <?php echo (!isset($_GET['pagina']) || empty($_GET['pagina']) || $_GET['pagina'] == 'inicio') ? 'class="active"' : '' ?>><a href="index"><i class="fa fa-home" aria-hidden="true"></i> Início</a></li>
			<li <?php echo (isset($_GET['pagina']) && ($_GET['pagina'] == 'paciente/cadastrar')) ? 'class="active"' : '' ?>><a href="index?pagina=paciente/cadastrar"><i class="fa fa-user-plus" aria-hidden="true"></i> Cadastrar Paciente</a></li>
			<li <?php echo (isset($_GET['pagina']) && ($_GET['pagina'] == 'paciente/editar')) ? 'class="active"' : '' ?>><a href="index?pagina=paciente/editar"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar Paciente</a></li>
			<li <?php echo (isset($_GET['pagina']) && ($_GET['pagina'] == 'agendamento/cadastrar')) ? 'class="active"' : '' ?>><a href="index?pagina=agendamento/cadastrar"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> Cadastrar Agendamento</a></li>
			<li <?php echo (isset($_GET['pagina']) && ($_GET['pagina'] == 'agendamento/visualizar')) ? 'class="active"' : '' ?>><a href="index?pagina=agendamento/visualizar"><i class="fa fa-search" aria-hidden="true"></i> Visualizar Agendamento</a></li>
		</ul>

	</div><!--/.sidebar-->
	