<?php require_once('header.php'); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
				<li class="active">Editar Paciente</li>
			</ol>
		</div><!--/.row-->			
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Editar Paciente</div>
						<!-- Form Busca Codigo Paciente-->
						<div class="panel-body" id="divBuscarPaciente">
							<div id="resposta"></div>
							<form id="formBuscarPaciente" action="../action/listar.php" method="POST" onkeydown="if(event.keyCode == 13) enterBuscar();">
								<input type="hidden" name="acao" value="buscarPaciente">
								<div class="col-md-6">
									<div class="form-group">
										<label>Código</label>
										<input type="number" class="form-control" placeholder="Código" name="codigo" maxlength="10">
									</div>
								</div>

								<div class="col-md-12">
									<button type="submit" id="botaoBuscarPaciente" class="btn btn-primary btn-disabled">Buscar</button>
									<span class="loading hide">
										<img src="../../assets/img/load.gif" alt="Carregando...">
									</span>
								</div>
							</form>
						</div>
						<!-- Fim Form Busca Codigo Paciente-->
						<form id="formBuscarConvenio" action="../action/listar.php" method="POST">
							<input type="hidden" name="acao" value="listarConvenioEditar">
							<input type="hidden" id="paciente_id_editar" name="convenio_id" value="">
						</form>
						<!-- Inicio Form de edição de Paciente-->
						<div class="panel-body hidden" id="divDadosPaciente">
							<div id="respostaAlterar"></div>
							<form id="formDadosPaciente" action="../action/alterar.php" method="POST" onkeydown="if(event.keyCode == 13) enterAlterar();">
								<input type="hidden" name="acao" value="editarPaciente">
								<input type="hidden" id="codigo_paciente" name="codigo_paciente" value="">
								<div class="col-md-6">
									<div class="form-group">
										<label>Código</label>
										<input type="number" id="codigo" class="form-control" placeholder="Código" name="paciente[codigo]" maxlength="10" disabled>
									</div>
																	
									<div class="form-group">
										<label>Nome</label>
										<input type="text" id="nome" class="form-control" name="paciente[nome]" placeholder="Primeiro Nome" maxlength="100">
									</div>
																	
									<div class="form-group">
										<label>Telefone 1</label>
										<input type="text" id="telefone1" class="form-control" name="paciente[telefone1]" placeholder="(99) # 9999-9999" maxlength="16">
									</div>
																	
									<div class="form-group">
										<label>Celular 1</label>
										<input type="text" id="celular1" class="form-control" name="paciente[celular1]" placeholder="(99) # 9999-9999" maxlength="16">
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label>Convênio</label>
										<select class="form-control" id="listarConvenio" name="paciente[convenio_id]">
											<option id="convenio_id" value=""></option>
										</select>
									</div>
																	
									<div class="form-group">
										<label>Sobrenome</label>
										<input type="text" id="sobrenome" class="form-control" name="paciente[sobrenome]" placeholder="Sobrenome" maxlength="100">
									</div>
																	
									<div class="form-group">
										<label>Telefone 2</label>
										<input type="text" id="telefone2" class="form-control" name="paciente[telefone2]" placeholder="(99) # 9999-9999" maxlength="16">
									</div>
																	
									<div class="form-group">
										<label>Celular 2</label>
										<input type="text" id="celular2" class="form-control" name="paciente[celular2]" placeholder="(99) # 9999-9999" maxlength="16">
									</div>
								</div>

								<div class="col-md-12">
									<button type="submit" id="botaoSalvarAlteracoes" class="btn btn-success btn-disabled">Salvar alterações</button>
									<span class="loading hide">
										<img src="../../assets/img/load.gif" alt="Carregando...">
									</span>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->
<?php require_once('footer.php'); ?>
	<script type="text/javascript" src="../../assets/js/pags/paciente-editar.js"></script>