<?php
require_once('db.class.php');
require_once('admin.class.php');

class Color extends Db {
    private $admin;

    private $table = 'pet_color';

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function getColors()
    {
        $params = [ 0 ];

        $query = "SELECT 
                    b.id,
                    pt.name as pet_type,
                    b.color,
                    b.deleted
                FROM " . $this->table . " b
                INNER JOIN pet_types pt ON (b.pet_type_id = pt.id)
                WHERE b.deleted = ?
                ORDER BY pt.id ASC, b.created_at DESC";
        
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

    public function create($petType, $name)
    {
        $params = [ $petType, $name ];

        $query = "INSERT INTO " . $this->table . "(
                    pet_type_id, color   
                ) VALUES (?,?)";
        
        $conn = $this->connect();

        $create = $this->query($conn, $query, $params);

        if ($create) {
            return true;
        }

        return false;
    }

    public function getBreed($id)
    {
        $params = [ $id ];

        $query = "SELECT 
                    b.id,
                    pt.id as pet_type,
                    b.color
                FROM " . $this->table . " b
                INNER JOIN pet_types pt ON (b.pet_type_id = pt.id)
                WHERE b.id = ? ";
        
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

    public function update($id, $petType, $name) 
    {
        $params = [
            $petType,
            $name,
            $id
        ];

        $query = "UPDATE " . $this->table . " SET 
                    pet_type_id = ?,
                    color = ?
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