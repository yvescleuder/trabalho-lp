<?php

class Input
{

    protected $data;

    public function __construct()
    {
        $this->data = $_POST;
    }

    protected function getData()
    {
        return $this->data;
    }

    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    public function all()
    {
        return $this->getData();
    }

    protected function only($keys)
    {
        return array_only($this->data, $keys);
    }

}