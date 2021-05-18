<?php
namespace App;

class ExampleObject {
    protected $text = '';
    const APP_CONSTANT = 'const';
    public function __construct(string $text, ExampleObject $childObject = null) {
        $this->text = $text;
        $this->childObject = $childObject;
    }

    public function getString() {
        return $this->text;
    }

    public function getConstant() {
        return self::APP_CONSTANT;
    }

    public function getTimeWithYmdhisFormat() {
        return date('Y-m-d H:i:s', Utils::getTime());
    }

    public function getChild() {
        return $this->childObject ?? new ExampleObject('child');
    }
}
