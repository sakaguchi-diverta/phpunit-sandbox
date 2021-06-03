<?php

use PHPUnit\DbUnit;
class DBUnitTest extends \PHPUnit\Framework\TestCase {
    use DbUnit\TestCaseTrait;

    static private $pdo;
    private $conn;

    protected function getConnection() {
        if (isset($this->conn)) {
            return $this->conn;
        }

        self::$pdo = self::$pdo ?? new PDO(
            'pgsql:'.join(' ', [
                'dbname='.POSTGRES_DB_NAME,
                'host='.POSTGRES_DB_HOST,
                'port='.POSTGRES_DB_PORT
            ]),
            POSTGRES_DB_USER,
            POSTGRES_DB_PASSWORD
        );
        $this->conn = $this->createDefaultDBConnection(self::$pdo);

        return $this->conn;
    }

    protected function getDataSet() {
        return $this->createArrayDataSet([
            'list' => [
                // [
                //     'id' => 1,
                //     'category' => 'category1',
                //     'value' => 'hello',
                //     'data' => '{"key1": "hello", "key2":"world"}'
                // ]
            ]
        ]);
    }

    protected function getSetUpOperation() {
        // Required to cleanup pgsql tables because AUTOINCREMENT error occurs if using default operation
        return DbUnit\Operation\Factory::CLEAN_INSERT(true);
    }

    public function setUp(): void {
        parent::setUp();
        $this->getConnection();
    }

    public function testListTable() {
        $this->getConnection();

        $dataSet = $this->createArrayDataSet([
            'list' => [
                [
                    'id' => 1,
                    'category' => 'category1',
                    'value' => 'hello',
                    'data' => json_encode((object)[
                        "key1" => "hello",
                        "key2" => "world"
                    ])
                ]
            ]
        ]);

        $list = [];
        foreach (self::$pdo->query('SELECT * FROM list', PDO::FETCH_ASSOC) as $row) {
            $row['data'] = json_encode(json_decode($row['data'], true));
            $list[] = $row;
        }

        $this->assertEquals($dataSet->getTable('list')->getRow(0), $list[0]);
    }
}
