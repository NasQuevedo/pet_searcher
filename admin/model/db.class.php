<?php

class Db {
    private $host = 'localhost';
    private $port = '3306';
    private $user = 'root';
    private $password = '';
    private $db = 'pet-searcher';

    public function connect()
    {
        $connection = new mysqli(
            $this->host, 
            $this->user, 
            $this->password, 
            $this->db
        );

        if (!$connection) {
            return false;
        }

        return $connection;
    }

    public function query($conn, string $query, array $params) 
    {
        return $conn->execute_query($query, $params);
    }

    public function select($conn, $query, $params) 
    {
        $result = $conn->execute_query($query, $params);
        return $result->fetch_assoc();
    }

    public function selectMultiple($conn, $query, $params)
    {
        $results = $conn->execute_query($query, $params);
        return $results->fetch_all(MYSQLI_ASSOC);
    }
}