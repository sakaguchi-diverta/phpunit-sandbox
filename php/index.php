<?php
require_once('vendor/autoload.php');

var_dump(
    (new InstanceExample())->getString(),
    StaticExample::getString(),
    getTrue(),
    GLOBAL_CONSTANT,
    App\Utils::getFalse()
);
