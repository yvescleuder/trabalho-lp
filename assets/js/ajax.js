// Função genérica do AJAX
function enviar(form, datatype, antesEnviar, retorno)
{
    $.ajax({
        type: form.attr('method'),
        url: form.attr('action'),
        data: form.serialize(),
        dataType: datatype,
        beforeSend: antesEnviar,
        error: mostraErro,
        success: retorno
    });
}

// Função de exibir erro
function mostraErro(xhr, ajaxOptions, thrownError)
{
    console.log('errooooo');
    $("div.error-porto-aberto").html(xhr.responseText);
    $(".modal-error").modal('show');
    loading('.loading', 0);
}


// Função executada antes de enviar uma equisição
function antesEnviar(id_resposta, seletor)
{
    removerNotificacao(id_resposta);
    loading(seletor, 1);
}


// Função que exibi um Loading
function loading(seletor, status) 
{
    if(status == 1)
    {
        $(seletor).removeClass('hide');
        $('.btn-disabled').attr("disabled", "enabled");
    }
    else
    {
        $(seletor).addClass('hide');
        $(".btn-disabled").removeAttr("disabled");
    }
}

function salvar(form, datatype, antesEnviar, retorno) 
{
    enviar(form, datatype, antesEnviar, retorno);
}

function consultar(id_form, metodo, datatype, antesEnviar, retorno) 
{
    var form = $(id_form);
    enviar(form, datatype, antesEnviar, retorno);
}

function excluir(id_form, metodo, nome, datatype, antesEnviar, retorno) 
{
    var url = $(id_form).attr("action");
    var status = confirm('Deseja excluir: ' + nome);
    if(status)
    {
        enviarPorUri(url + '/' + metodo, datatype, antesEnviar, retorno);
    }
    else
    {
        loading('.loading', 0);
    }
}

$.fn.reset = function() 
{
    $(this).each(function()
    {
        this.reset();
    });
};

function sair()
{
    enviar($("#form-sair"), 'json', function(){}, function(resp, error)
    {
        if(resp.msg.tipo == "s")
        {
            $(location).attr("href", resp.msg.texto);
        }
    });
}

function upload(form, selector, retUpload)
{
    $('#imagemSrc').addClass('hide');
    loading('.loading-upload', 1);
    
    var formData = new FormData();
    formData.append(selector, $('#'+selector)[0].files[0]);
    formData.append('acao', 'uploadAvatar');
  
    var url = $(form).attr("action");

    $.ajax({
        type:'post',
        url: url,
        data: formData,
        cache: false,
        dataType: 'json',
        contentType: false,
        processData: false,
        beforeSend: antesEnviar('#resposta','.loading'),
        error: mostraErro,
        success: retUpload
    });
}

