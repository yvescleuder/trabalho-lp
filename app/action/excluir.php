<?php

$acao = isset($_POST['acao']) ? $_POST['acao'] : '';

switch($acao)
{
    default: 
    {
        echo "Operação inválida";
        break;
    }

}