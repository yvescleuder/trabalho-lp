<?php require_once('header.php'); ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i></a></li>
				<li class="active">Início</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" align="center">
			<div class="col-md-12">
				<!-- <h3 href="javascript:;" class="page-header"><b>SysMedic </b>Calendário</h3> -->
				<h3>
				      SysMedic
				      <small>Calendário</small>
			    </h3>
			</div>
		</div><!--/.row-->

		<section class="content">
      <div class="row">
        <div class="col-md-3">
          <div class="box box-solid">
            <div class="box-header with-border">
              <h4 class="box-title">Tipo de Agendamento</h4>
            </div>
            <div class="box-body">
              <!-- the events -->
              <div id="external-events">
                <div class="external-event bg-yellow">Retorno</div>
                <div class="external-event bg-blue">Consulta</div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <div id="calendar"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
		
	</div>	<!--/.main-->
<?php require_once('footer.php'); ?>
	<script type="text/javascript" src="../../assets/js/pags/inicio.js"></script>
