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
});

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
}