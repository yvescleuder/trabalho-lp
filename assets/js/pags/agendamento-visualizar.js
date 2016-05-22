/* Custom JavaScript */
$(document).ready(function($)
{
	var formBuscar = $('#formBuscarAgendamento');

	formBuscar.validate({
		rules: {
			"id": {
				required: true,
				number: true,
				minlength: 1,
				maxlength: 10
			}
		}
	});

	$('#botaoBuscarAgendamento').click(function(event)
	{
		event.preventDefault();
		if(formBuscar.valid())
		{
			consultar('#formBuscarAgendamento', '', 'json', antesEnviar('#resposta', '.loading'), retornoBuscarAgendamento);
		}
		else
		{
			formBuscar.validate().focusInvalid();
		}
	});
});

function retornoBuscarAgendamento(resp, error)
{
	var form = $('#formBuscarAgendamento');
	var resposta = resp.msg.texto;
	loading('.loading', 0);
	if(resp.msg.tipo == 's')
	{
		$('#agendamento_id').val(resp.msg.texto);
		consultar('#formDadosAgendamento', '', 'json', function(){}, retornoDadosAgendamento);
		$('#divBuscarAgendamento').attr('class', 'hidden');
		$('#divDadosAgendamento').removeClass('hidden');
		form.reset();
	}
	else
	{
		swal({ title: "Erro!", text: resposta, html: true, type: 'error'});
	}

	$('html, body').animate({scrollTop: $('.navbar-brand').offset().top }, 1000);	
}

function retornoDadosAgendamento(resp, error)
{
	for(var index in resp)
	{
        $("#"+index).val(resp[index]);
    }
}