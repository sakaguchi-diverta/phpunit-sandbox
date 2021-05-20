<?php

class Database {
    const DB_NAME     = 'sandbox';
    const DB_HOST     = 'postgres';
    const DB_PORT     = 5432;
    const DB_USER     = 'admin';
    const DB_PASSWORD = 'password';

    private static $connecton;

    protected function __construct() {
        $this->db = new PDO(
            'pgsql:dbname='.self::DB_NAME.' host='.self::DB_HOST.' port='.self::DB_PORT,
            self::DB_USER,
            self::DB_PASSWORD
        );
    }

    public static function getInstance() {
        self::$connecton = self::$connecton ?? new self();
        return self::$connecton;
    }

    public function query($sql) {
        return $this->db->query($sql);
    }
}
