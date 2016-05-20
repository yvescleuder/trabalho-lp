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
						<form id="formCadastrarPaciente" action="../action/inserir.php" method="POST">
							<input type="hidden" name="acao" value="cadastrarPaciente">
							<div class="col-md-6">
								<div class="form-group">
									<label>Código</label>
									<input type="number" class="form-control" placeholder="Código" name="paciente[codigo]" maxlength="10">
								</div>
																
								<div class="form-group">
									<label>Data</label>
									<input type="date" class="form-control" name="data" placeholder="Data da Consulta">
								</div>
																
								
								
							</div>

							<div class="col-md-6">
								<div class="form-group">
										<label>Hora</label>
										<input type="time" class="form-control" name="hora" placeholder="Hora da Consulta">
								</div>

								<div class="form-group">
									<label>Tipo Consulta</label>
									<select class="form-control" id="listarConvenio" name="paciente[convenio_id]">
										<option value="">-- Selecione</option>
										<option value="">-- Normal</option>
										<option value="">-- Retorno</option>
									</select>
								</div>
																
							
							</div>

							<div class="col-md-12">
								<a type="submit" class="btn btn-primary btn-disabled">Cadastrar</a>
								<span class="loading hide">
									<img src="../../assets/img/load.gif" alt="Carregando...">
								</span>
							</div>
						</form>
						<form id="formListarConvenio" action="../action/listar.php" method="POST">
							<input type="hidden" name="acao" value="listarConvenio">
						</form>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
<?php require_once('footer.php'); ?>
	<script type="text/javascript" src="../../assets/js/pags/paciente-cadastrar.js"></script>