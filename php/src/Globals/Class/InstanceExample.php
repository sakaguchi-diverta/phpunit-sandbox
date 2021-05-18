<?php

class InstanceExample {
    protected $text = 'test';
    public function __construct()
    {
    }
    public function getString()
    {
        return $this->text;
    }
}
