<?php

require_once "../../vendor/catfan/medoo/medoo.php";

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "trabalho-lp";
    private $port = "3306";
    private $charset = "utf8";
    private $prefix = "";
    protected $database = NULL;
    private $debug = false;

    public function open()
    {
    	$this->database = new medoo([
		    'database_type' => 'mysql',
		    'database_name' => $this->dbname,
		    'server' => $this->host,
            'username' => $this->user,
            'password' => $this->password,
            'port' => $this->port,
		    'charset' => $this->charset,
		    'prefix' => $this->prefix,
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ]
		]);

        return $this->database;
    }

    public function close()
    {
        $this->database = NULL;
    }

    public function mostrarError() 
    {
        if($this->debug == true)
        {
            $msg = "Erro Medoo: <br>";

            foreach($this->database->error() as $i => $value)
            {
                $msg .= '<b>' .$i. '</b>: '. $value.'<br>';
            }

            $msg .= "<hr>Ultima SQL executada:<br>";
            
            foreach($this->database->log() as $i => $value)
            {
                $msg .= '<b>' .$i. '</b>: '. $value.'<br>';
            }

            echo $msg;
        }
    }
}