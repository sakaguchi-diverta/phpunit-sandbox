<?php

global $dbConnection;
$dbConnection = Database::getInstance([
    'dbname' => POSTGRES_DB_NAME,
    'host' => POSTGRES_DB_HOST,
    'port' => POSTGRES_DB_PORT,
    'user' => POSTGRES_DB_USER,
    'password' => POSTGRES_DB_PASSWORD,
]);
