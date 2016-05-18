/* Custom JavaScript */
$(document).ready(function($)
{
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
			salvar(form, 'json', antesEnviar('#resposta','.loading'), retornoTeste);
		}
		else
		{
			form.validate().focusInvalid();
		}
	});
	
});

function retornoTeste(resp, error)
{
	var form = $('#formCadastrarPaciente');
	notificacao("#resposta", resp.msg);
	form.reset();

	$('html, body').animate({scrollTop: $('.navbar-brand').offset().top }, 1000);

	loading('.loading', 0);
}