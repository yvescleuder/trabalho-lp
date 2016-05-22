/* Custom JavaScript */
$(document).ready(function($)
{
	$('#telefone1').mask('(00) 0000-00009');
	$('#telefone1').blur(function(event)
	{
		// Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
		if($(this).val().length == 15) 
		{ 
			$('#telefone1').mask('(00) 00000-0009');
		}
		else
		{
	    	$('#telefone1').mask('(00) 0000-00009');
	    }
	});

	$('#telefone2').mask('(00) 0000-00009');
	$('#telefone2').blur(function(event)
	{
		// Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
		if($(this).val().length == 15) 
		{ 
			$('#telefone2').mask('(00) 00000-0009');
		}
		else
		{
	    	$('#telefone2').mask('(00) 0000-00009');
	    }
	});

	$('#celular1').mask('(00) 0000-00009');
	$('#celular1').blur(function(event)
	{
		// Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
		if($(this).val().length == 15) 
		{ 
			$('#celular1').mask('(00) 00000-0009');
		}
		else
		{
	    	$('#celular1').mask('(00) 0000-00009');
	    }
	});

	$('#celular2').mask('(00) 0000-00009');
	$('#celular2').blur(function(event)
	{
		// Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
		if($(this).val().length == 15) 
		{ 
			$('#celular2').mask('(00) 00000-0009');
		}
		else
		{
	    	$('#celular2').mask('(00) 0000-00009');
	    }
	});
});