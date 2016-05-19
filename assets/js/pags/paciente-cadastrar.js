/* Custom JavaScript */
$(document).ready(function($)
{
	consultar('#formListarConvenio', '', 'json', function(){}, retornoListarConvenio);

	var form = $('#formCadastrarPaciente');

	form.validate({
		rules: {
			"paciente[codigo]": {
				required: true,
				number: true,
				minlength: 1,
				maxlength: 10
			},
			"paciente[nome]": {
				required: true,
				minlength: 4,
				maxlength: 100
			},
			"paciente[sobrenome]": {
				required: true,
				minlength: 4,
				maxlength: 100
			},
			"paciente[telefone1]": {
				required: true,
				minlength: 14,
				maxlength: 16
			},
			"paciente[telefone2]": {
				minlength: 14,
				maxlength: 16
			},
			"paciente[celular1]": {
				required: true,
				minlength: 14,
				maxlength: 16
			},
			"paciente[celular2]": {
				minlength: 14,
				maxlength: 16
			},
			"paciente[convenio_id]": {
				required: true,
				minlength: 1
			}
		}
	});

	$('.btn-primary').click(function()
	{
		if(form.valid())
		{
			salvar(form, 'json', antesEnviar('#resposta','.loading'), retornoPacienteCadastrar);
		}
		else
		{
			form.validate().focusInvalid();
		}
	});
	
});

function retornoPacienteCadastrar(resp, error)
{
	var form = $('#formCadastrarPaciente');
	notificacao("#resposta", resp.msg);
	if(resp.msg.tipo == 's')
	{
		form.reset();
	}

	$('html, body').animate({scrollTop: $('.navbar-brand').offset().top }, 1000);

	loading('.loading', 0);
}

function retornoListarConvenio(resp, error)
{
	var datasHTML = '';
	resp.forEach(function(item, i)
	{
		datasHTML += '<option value="'+item.id+'">'+item.nome+'</option>';
	});

  	$('#listarConvenio').append(datasHTML);
}