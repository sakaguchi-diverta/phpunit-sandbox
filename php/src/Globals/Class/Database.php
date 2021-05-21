<?php

class Database {
    public function __construct(array $dbConfig) {
        $this->db = new PDO(
            "pgsql:dbname={$dbConfig['dbname']} host={$dbConfig['host']} port={$dbConfig['port']}",
            $dbConfig['user'],
            $dbConfig['password']
        );
    }

    public function query($sql) {
        return $this->db->query($sql);
    }
}
