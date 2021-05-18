<?php

class StaticExample {
    const TEXT = 'test';
    public static function getString() {
        return 'test';
    }
    public static function getTime() {
        return time();
    }
    public static function intval($value) {
        return intval($value);
    }
}
