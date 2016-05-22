/* Custom JavaScript */
$(document).ready(function($)
{
	consultar('#formProximosAgendamentos', '', 'json', antesEnviar('#resposta', '.loading'), retornoProximosAgendamentos);
});

function retornoProximosAgendamentos(resp, error)
{
	var datasHTML = '';

	resp.forEach(function(item , i)
	{
		datasHTML += '<div class="panel-body">'+
						'<div class="row">'+
							'<div class="col-md-12">'+
								'<ul class="todo-list">'+
									'<li class="todo-list-item">'+
										'<div class="row">'+
											'<div class="col-md-12">'+
												'<div class="col-md-3">'+
													'<label>'+item.nomePaciente+'</label>'+
												'</div>'+
												'<div class="col-md-3">'+
													'<label for="list">'+item.nomeMedico+'</label>'+
												'</div>'+
												'<div class="col-md-3">'+
													'<label for="list">'+item.datahora+'</label>'+
												'</div>'+
												'<div class="col-md-3">'+
													'<label for="list">'+item.tipoAgendamento+'</label>'+
												'</div>'+
											'</div>'+
										'</div>'+
									'</li>'+
								'</ul>'+
							'</div>'+
						'</div>'+
					'</div>';
	});

	$('#proximosAgendamentos').append(datasHTML);
}