/* Custom JavaScript */
$(document).ready(function($)
{
	var formBuscar = $('#formBuscarPaciente');

	formBuscar.validate({
		rules: {
			"codigo": {
				required: true,
				number: true,
				minlength: 1,
				maxlength: 10
			}
		}
	});

	var formDados = $('#formDadosPaciente');

	formDados.validate({
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

	$('#botaoBuscarPaciente').click(function(event)
	{
		event.preventDefault();
		if(formBuscar.valid())
		{
			consultar('#formBuscarPaciente', '', 'json', antesEnviar('#resposta', '.loading'), retornoBuscarPaciente);
		}
		else
		{
			formBuscar.validate().focusInvalid();
		}
	});

	$('#botaoSalvarAlteracoes').click(function(event)
	{
		event.preventDefault();
		if(formDados.valid())
		{
			salvar($('#formDadosPaciente'), 'json', antesEnviar('#resposta','.loading'), retornoSalvarAlteracoes);
		}
		else
		{
			formDados.validate().focusInvalid();
		}
	});
});

function retornoSalvarAlteracoes(resp, error)
{
	var resposta = resp.msg.texto;
	loading('.loading', 0);
	if(resp.msg.tipo == 's')
	{
		swal({ title: "Sucesso!", text: resposta, html: true, type: 'success'});
		form.reset();
	}
	else
	{
		swal({ title: "Erro!", text: resposta, html: true, type: 'error'});
	}
	$('html, body').animate({scrollTop: $('.navbar-brand').offset().top }, 1000);
	
}

function retornoBuscarPaciente(resp, error)
{
	var form = $('#formBuscarPaciente');
	var resposta = resp.msg.texto;
	loading('.loading', 0);
	if(resp.msg.tipo == 's')
	{
		consultar('#formBuscarPaciente', '', 'json', function(){}, retornoDadosPaciente);
		$('#divBuscarPaciente').attr('class', 'hidden');
		$('#divDadosPaciente').removeClass('hidden');
		form.reset();
	}
	else
	{
		swal({ title: "Erro!", text: resposta, html: true, type: 'error'});
	}

	$('html, body').animate({scrollTop: $('.navbar-brand').offset().top }, 1000);
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