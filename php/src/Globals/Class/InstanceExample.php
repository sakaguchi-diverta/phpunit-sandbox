<?php

class InstanceExample {
    protected $text = 'test';
    public function __construct()
    {
    }
    public function returnString()
    {
        return $this->text;
    }
}
