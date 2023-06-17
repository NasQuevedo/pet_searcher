<?php
require_once('db.class.php');
require_once('admin.class.php');

class Type extends Db {

    private $admin;

    private $table = 'pet_types';

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function getTypes()
    {
        $params = [ 0 ];

        $query = "SELECT 
                    id,
                    name,
                    deleted
                FROM " . $this->table . "
                WHERE deleted = ?";
        
        $conn = $this->connect();

        $types = $this->selectMultiple($conn, $query, $params);

        $results = [];
        if (count($types) > 0) {
            $results['response'] = true;
            $results['results'] = $types;

            return $results;
        }

        $results['response'] = false;
        $results['results'] = [];

        return $results;
    }

    public function create($name)
    {
        $params = [ $name ];

        $query = "INSERT INTO " . $this->table . "(
                    name   
                ) VALUES (?)";
        
        $conn = $this->connect();

        $create = $this->query($conn, $query, $params);

        if ($create) {
            return true;
        }

        return false;
    }

    public function getType($id)
    {
        $params = [ $id ];

        $query = "SELECT 
                    id,
                    name
                FROM " . $this->table . "
                WHERE id = ? ";
        
        $conn = $this->connect();

        $type = $this->select($conn, $query, $params);

        $result = [];
        if (isset($type['id'])) {
            $result['response'] = true;
            $result['result'] = $type;

            return $result;
        }

        $result['response'] = false;
        $result['result'] = [];

        return $result; 
    }

    public function update($id, $name) 
    {
        $params = [
            $name,
            $id
        ];

        $query = "UPDATE " . $this->table . " SET 
                    name = ?
                WHERE id = ?";

        $conn = $this->connect();

        $update = $this->query($conn, $query, $params);

        if ($update) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $params = [ 1, $id ];

        $query = "UPDATE " . $this->table . " SET 
                    deleted = ?
                WHERE id = ?";
        
        $conn = $this->connect();

        $delete = $this->query($conn, $query, $params);

        if ($delete) {
            return true;
        }

        return false;
    }
}
?>