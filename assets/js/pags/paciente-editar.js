/* Custom JavaScript */
$(document).ready(function($)
{
	var form = $('#formBuscarPaciente');

	form.validate({
		rules: {
			"codigo": {
				required: true,
				number: true,
				minlength: 1,
				maxlength: 10
			}
		}
	});

	$('#butaoBuscarPaciente').click(function()
	{
		if(form.valid())
		{
			consultar('#formBuscarPaciente', '', 'json', antesEnviar('#resposta', '.loading'), retornoBuscarPaciente);
		}
		else
		{
			form.validate().focusInvalid();
		}
	});

	$('#botaoSalvarAlteracoes').click(function()
	{
		if(form.valid())
		{
			salvar($('#formDadosPaciente'), 'json', antesEnviar('#mostrar-error','.loading'), retornoSalvarAlteracoes);
		}
		else
		{
			form.validate().focusInvalid();
		}
	});
});

function retornoSalvarAlteracoes(resp, error)
{
	notificacao("#respostaAlterar", resp.msg);
	$('html, body').animate({scrollTop: $('.navbar-brand').offset().top }, 1000);
	loading('.loading', 0);
}

function retornoBuscarPaciente(resp, error)
{
	var form = $('#formBuscarPaciente');
	notificacao("#resposta", resp.msg);
	if(resp.msg.tipo == 's')
	{
		consultar('#formBuscarPaciente', '', 'json', function(){}, retornoDadosPaciente);
		$('#divBuscarPaciente').attr('class', 'hidden');
		$('#divDadosPaciente').removeClass('hidden');
		form.reset();
	}

	$('html, body').animate({scrollTop: $('.navbar-brand').offset().top }, 1000);

	loading('.loading', 0);
}

function retornoDadosPaciente(resp, error)
{
	for(var index in resp.msg.texto)
	{
        $("#"+index).val(resp.msg.texto[index]);
    }
    $('#convenio_id').html(resp.msg.texto['convenio_nome']);
    $('#paciente_id_editar').val(resp.msg.texto['convenio_id']);
    $('#codigo_paciente').val(resp.msg.texto['codigo']);
    consultar('#formBuscarConvenio', '', 'json', function(){}, retornoConvenio);
}

function retornoConvenio(resp, error)
{
	var datasHTML = '';
	resp.forEach(function(item, i)
	{
		datasHTML += '<option value="'+item.id+'">'+item.nome+'</option>';
	});

  	$('#listarConvenio').append(datasHTML);
}