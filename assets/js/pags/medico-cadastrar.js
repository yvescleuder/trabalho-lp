/* Custom JavaScript */
$(document).ready(function($)
{
	consultar('#formListarEspecialidade', '', 'json', function(){}, retornoListarEspecialidade);

	var form = $('#formCadastrarMedico');

	form.validate({
		rules: {
			"medico[crm]": {
				required: true,
				number: true,
				minlength: 1,
				maxlength: 10
			},
			"medico[nome]": {
				required: true,
				minlength: 4,
				maxlength: 100
			},
			"medico[sobrenome]": {
				required: true,
				minlength: 4,
				maxlength: 100
			},
			"medico[telefone1]": {
				required: true,
				minlength: 14,
				maxlength: 16
			},
			"medico[telefone2]": {
				minlength: 14,
				maxlength: 16
			},
			"medico[celular1]": {
				required: true,
				minlength: 14,
				maxlength: 16
			},
			"medico[celular2]": {
				minlength: 14,
				maxlength: 16
			},
			"medico[especialidade_id]": {
				required: true,
				minlength: 1
			}
		}
	});

	$('.btn-primary').click(function(event)
	{
		event.preventDefault();
		if(form.valid())
		{
			salvar(form, 'json', antesEnviar('#resposta', '.loading'), retornoMedicoCadastrar);
		}
		else
		{
			form.validate().focusInvalid();
		}
	});	
});

function retornoMedicoCadastrar(resp, error)
{
	var form = $('#formCadastrarMedico');
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

function retornoListarEspecialidade(resp, error)
{
	var datasHTML = '';
	resp.forEach(function(item, i)
	{
		datasHTML += '<option value="'+item.id+'">'+item.nome+'</option>';
	});

  	$('#listarEspecialidade').append(datasHTML);
}