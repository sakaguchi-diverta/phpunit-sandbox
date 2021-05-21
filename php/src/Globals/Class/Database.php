<?php

class Database {
    private static $connecton;

    protected function __construct(array $dbConfig) {
        $this->db = new PDO(
            "pgsql:dbname={$dbConfig['dbname']} host={$dbConfig['host']} port={$dbConfig['port']}",
            $dbConfig['user'],
            $dbConfig['password']
        );
    }

    public static function getInstance(array $dbConfig) {
        self::$connecton = self::$connecton ?? new self($dbConfig);
        return self::$connecton;
    }

    public function query($sql) {
        return $this->db->query($sql);
    }
}
