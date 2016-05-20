<?php require_once('header.php'); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-plus" aria-hidden="true"></i></a></li>
				<li class="active">Cadastrar Paciente</li>
			</ol>
		</div><!--/.row-->			
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Cadastrar Médico</div>
					<div class="panel-body">
						<div id="resposta"></div>
						<form id="formCadastrarPaciente" action="../action/inserir.php" method="POST">
							<input type="hidden" name="acao" value="cadastrarPaciente">
							<div class="col-md-6">
								<div class="form-group">
									<label>CRM</label>
									<input type="number" class="form-control" placeholder="CRM" name="paciente[codigo]" maxlength="10">
								</div>
																
								<div class="form-group">
									<label>Nome</label>
									<input type="text" class="form-control" name="medico[nome]" placeholder="Primeiro Nome" maxlength="100">
								</div>
																
								<div class="form-group">
									<label>Especialidade</label>
									<input type="text" class="form-control" name="especialidade" placeholder="(99) # 9999-9999" maxlength="16">
								</div>
																
								<div class="form-group">
									<label>Celular 1</label>
									<input type="text" class="form-control" name="medico[celular1]" placeholder="(99) # 9999-9999" maxlength="16">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label>CPF</label>
									<input type="text" class="form-control" name="medico[cpf]" placeholder="CPF" maxlength="100">
								</div>
																
								<div class="form-group">
									<label>Sobrenome</label>
									<input type="text" class="form-control" name="paciente[sobrenome]" placeholder="Sobrenome" maxlength="100">
								</div>
																
								<div class="form-group">
									<label>Telefone 2</label>
									<input type="text" class="form-control" name="paciente[telefone2]" placeholder="(99) # 9999-9999" maxlength="16">
								</div>
																
								<div class="form-group">
									<label>Celular 2</label>
									<input type="text" class="form-control" name="paciente[celular2]" placeholder="(99) # 9999-9999" maxlength="16">
								</div>
							</div>

							<div class="col-md-12">
								<button type="submit" class="btn btn-primary btn-disabled">Cadastrar</button>
								<button type="reset" class="btn btn-default btn-disabled">Limpar campos</button>
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