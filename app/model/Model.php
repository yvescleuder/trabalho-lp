<?php

require_once("Database.php");

class Model extends Database
{
	public function __call($name, $value)
	{
		$this->{$name} = $value[0];
		return $this;
	}
}