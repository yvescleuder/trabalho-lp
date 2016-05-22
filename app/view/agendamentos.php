<?php require_once('header.php'); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li class="active">Agendamentos</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" align="center">
			<div class="col-md-12">
				<h1 class="page-header">Agendamentos</h1>
			</div>
		</div><!--/.row-->
		<form id="formProximosAgendamentos" action="../action/listar.php" method="POST">
			<input type="hidden" name="acao" value="listarAgendamento">
		</form>
		<div class="row">
			<div class="col-md-12">
				<div id="proximosAgendamentos" class="panel panel-teal">
					<div class="panel-heading dark-overlay"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg>Próximos Agendamentos</div>
					
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<ul class="todo-list">
									<li class="todo-list-item">
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-3">
													<label>Paciente</label>
												</div>
												<div class="col-md-3">
													<label for="list">Médico</label>
												</div>
												<div class="col-md-3">
													<label for="list">Data/Hora</label>
												</div>
												<div class="col-md-3">
													<label for="list">Agendamento</label>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>

				</div>	
			</div>
		</div><!-- /.row -->
	</div>	<!--/.main-->
<?php require_once('footer.php'); ?>
	<script type="text/javascript" src="../../assets/js/pags/agendamentos.js"></script>
