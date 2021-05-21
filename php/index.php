<?php
require_once('vendor/autoload.php');

var_dump(
    (new InstanceExample())->getString(),
    StaticExample::getString(),
    getTrue(),
    GLOBAL_CONSTANT,
    App\Utils::getFalse()
);

$db = $GLOBALS['dbConnection'];
foreach ($db->query('SELECT * FROM list LIMIT 1') as $row) {
    var_dump($row);
}
