<?php
require_once('vendor/autoload.php');

var_dump(
    (new InstanceExample())->getString(),
    StaticExample::getString(),
    getTrue(),
    GLOBAL_CONSTANT,
    App\Utils::getFalse()
);

$db = new Database([
    'dbname' => POSTGRES_DB_NAME,
    'host' => POSTGRES_DB_HOST,
    'port' => POSTGRES_DB_PORT,
    'user' => POSTGRES_DB_USER,
    'password' => POSTGRES_DB_PASSWORD,
]);
foreach ($db->query('SELECT * FROM list LIMIT 1') as $row) {
    var_dump($row);
}
