<?php

namespace CovidPHP;

use PDO;
use PDOStatement;

class Queries extends PDO
{
    public function __construct($dbConfig)
    {
        $dsn = 'mysql:dbname='.$dbConfig['name'].';host='.$dbConfig['host'];
        parent::__construct($dsn, $dbConfig['user'], $dbConfig['pass']);

        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function doQuery(string $query, array $params = []): PDOStatement
    {
        $stmt = $this->prepare($query);
        $stmt->execute($params);
    
        return $stmt;
    }
}
