<?php require_once('header.php'); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
			
				<li><a href="#"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i></a></li>
				<li class="active">Cadastrar Agendamento</li>
			</ol>
		</div><!--/.row-->			
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Cadastrar Agendamento</div>
					<!-- Inicio Form de edição de Paciente-->
					<div class="panel-body">
						<div id="resposta"></div>
						<form id="formCadastrarAgendamento" action="../action/inserir.php" method="POST" onkeydown="if(event.keyCode == 13) enter();">
							<input type="hidden" name="acao" value="cadastrarAgendamento">
							<div class="col-md-6">					
								<div class="form-group">
									<label>Código Paciente</label>
									<input type="number" class="form-control" name="agendamento[paciente_codigo]" placeholder="Código do Paciente">
								</div>				
								<div class="form-group">
									<label>Data</label>
									<input type="date" class="form-control" name="agendamento[data]" placeholder="Data da Consulta">
								</div>						
								<div class="form-group">
									<label>Médico</label>
									<select class="form-control" id="listarMedico" name="agendamento[medico_id]">
										<option value="">-- Selecione</option>
									</select>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>Hora</label>
									<input type="time" class="form-control" name="agendamento[hora]" placeholder="Hora da Consulta">
								</div>
								<div class="form-group">
									<label>Tipo Consulta</label>
									<select class="form-control" name="agendamento[tipo]">
										<option value="">-- Selecione</option>
										<option value="1">Normal</option>
										<option value="2">Retorno</option>
									</select>
								</div>
							</div>

							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-disabled">Cadastrar</button>
								<span class="loading hide">
									<img src="../../assets/img/load.gif" alt="Carregando...">
								</span>
							</div>
						</form>
						<form id="formListarMedico" action="../action/listar.php" method="POST">
							<input type="hidden" name="acao" value="listarMedico">
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
<?php require_once('footer.php'); ?>
	<script type="text/javascript" src="../../assets/js/pags/agendamento-cadastrar.js"></script>