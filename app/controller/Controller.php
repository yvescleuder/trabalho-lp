<?php

require_once('lib/Input.php');
require_once('MensagemController.php');

class Controller
{
    protected $input;
    protected $resposta = array();

    public function __construct()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $this->input = new Input();
    }
}
