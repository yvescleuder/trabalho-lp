<?php require_once('header.php'); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
				<li class="active">Visualizar Agendamento</li>
			</ol>
		</div><!--/.row-->			
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Visualizar Agendamento</div>
						<!-- Form Busca Codigo Agendamento -->
						<div class="panel-body" id="divBuscarAgendamento">
							<div id="resposta"></div>
							<form id="formBuscarAgendamento" action="../action/listar.php" method="POST">
								<input type="hidden" name="acao" value="buscarAgendamento">
								<div class="col-md-6">
									<div class="form-group">
										<label>Código</label>
										<input type="number" class="form-control" placeholder="Código" name="id" maxlength="10">
									</div>
								</div>

								<div class="col-md-12">
									<button type="submit" id="botaoBuscarAgendamento" class="btn btn-primary btn-disabled">Buscar</button>
									<span class="loading hide">
										<img src="../../assets/img/load.gif" alt="Carregando...">
									</span>
								</div>
							</form>
						</div>
						<!-- Fim Form Busca Codigo Agendamento -->
						<form id="formDadosAgendamento" action="../action/listar.php" method="POST">
								<input type="hidden" name="acao" value="buscarDadosAgendamento">
								<input type="hidden" id="agendamento_id" name="id" value="">
						</form> 
						<!-- Inicio Form de Visualização de Agendamento -->
						<div class="panel-body hidden" id="divDadosAgendamento">
							<form>
								<div class="col-md-6">					
									<div class="form-group">
										<label>Código Agendamento</label>
										<input type="number" class="form-control" id="id" placeholder="Código do Agendamento" disabled="disabled">
									</div>				
									<div class="form-group">
										<label>Data</label>
										<input type="text" class="form-control" id="data" placeholder="Data da Consulta" disabled="disabled">
									</div>						
									<div class="form-group">
										<label>Médico</label>
										<input type="text" class="form-control" id="nomeMedico" placeholder="CRM - Nome do Médico" disabled="disabled">
									</div>
								</div>

								<div class="col-md-6">					
									<div class="form-group">
										<label>Paciente</label>
										<input type="text" class="form-control" id="nomePaciente" placeholder="Código - Nome do Paciente" disabled="disabled">
									</div>
									<div class="form-group">
										<label>Hora</label>
										<input type="text" class="form-control" id="hora" placeholder="Hora da Consulta" disabled="disabled">
									</div>
									<div class="form-group">
										<label>Tipo Agendamento</label>
										<input type="text" class="form-control" id="tipoAgendamento" placeholder="Tipo do Agendamento" disabled="disabled">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
<?php require_once('footer.php'); ?>
	<script type="text/javascript" src="../../assets/js/pags/agendamento-visualizar.js"></script>