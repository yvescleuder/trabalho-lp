/* Custom JavaScript */
$(document).ready(function($)
{
	$('#data').mask('00/00/0000');
	$('#hora').mask('00:00');

	consultar('#formListarMedico', '', 'json', function(){}, retornoListarMedico);

	var form = $('#formCadastrarAgendamento');

	form.validate({
		rules: {
			"agendamento[paciente_codigo]": {
				required: true,
				minlength: 1,
				maxlength: 10
			},
			"agendamento[hora]": {
				required: true
			},
			"agendamento[data]": {
				required: true
			},
			"agendamento[tipo]": {
				required: true,
				minlength: 1,
				maxlength: 1
			},
			"agendamento[medico_id]": {
				required: true,
				minlength: 1,
				maxlength: 10
			}
		}
	});

	$('.btn-primary').click(function(event)
	{
		event.preventDefault();
		if(form.valid())
		{
			salvar(form, 'json', antesEnviar('#resposta', '.loading'), retornoAgendamentoCadastrar);
		}
		else
		{
			form.validate().focusInvalid();
		}
	});
});

function retornoAgendamentoCadastrar(resp, error)
{
	var form = $('#formCadastrarAgendamento');
	notificacao("#resposta", resp.msg);
	if(resp.msg.tipo == 's')
	{
		form.reset();
	}

	$('html, body').animate({scrollTop: $('.navbar-brand').offset().top }, 1000);

	loading('.loading', 0);
}

function retornoListarMedico(resp, error)
{
	var datasHTML = '';
	resp.forEach(function(item, i)
	{
		datasHTML += '<option value="'+item.id+'">'+item.nome+' - '+item.crm+'</option>';
	});

  	$('#listarMedico').append(datasHTML);
} 