<?php

class StaticExample {
    const TEXT = 'test';
    public static function returnString() {
        return 'test';
    }
    public static function returnTime() {
        return time();
    }
    public static function intval($value) {
        return intval($value);
    }
}
