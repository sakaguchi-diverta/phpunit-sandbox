<?php
require_once('vendor/autoload.php');

var_dump(
    (new InstanceExample())->returnString(),
    StaticExample::returnString(),
    globalFunc(),
    APP_CONSTANT,
    App\Utils::returnFalse()
);
