// Remove a notificação existente
function removerNotificacao(seletor)
{
    $(seletor).html('');
    $(seletor).removeClass('alert alert-success');
    $(seletor).removeClass('alert alert-danger');
    $(seletor).removeClass('alert alert-warning');
}

// Exite a notificação
function notificacao(seletor, msg)
{
    removerNotificacao(seletor);

    $(seletor).html('<span onclick="removerNotificacao(\'' + seletor + '\')" class="close">&times;</span>'+msg.texto);

    switch(msg.tipo)
    {
        case "a":
            $(seletor).addClass('alert alert-warning');
        break;
     
        case "e":
            $(seletor).addClass('alert alert-danger');
        break;
     
        case "s":
            $(seletor).addClass('alert alert-success');
        break;
    }
}