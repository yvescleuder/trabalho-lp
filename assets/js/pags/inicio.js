$(function()
{
	/* initialize the calendar
	 -----------------------------------------------------------------*/
	$('#calendar').fullCalendar({
	header:
	{
	    left: 'prev,next today',
	    center: 'title',
	    right: 'month,agendaWeek,agendaDay'
	},
	buttonText:
	{
		today: 'Hoje',
		month: 'Mês',
		week: 'Semana',
		day: 'Dia'
	},
	//Random default events
	events:
	{
		url: '../action/listar.php',
		type: 'POST',
		data:
		{
			acao: 'listarCalendario',
		},
		error: mostraErro,
		success: function(resp)
		{
			return resp.dados;
		}
	},
	editable: false,
	droppable: false, // this allows things to be dropped onto the calendar !!!
	});
});