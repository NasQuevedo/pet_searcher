<?php
require_once('db.class.php');
require_once('admin.class.php');

class User extends Db {

    private $admin;

    private $table = 'users';

    public function __construct()
    {
        $this->admin = new Admin();
    }

    public function getUsers($userId)
    {
        $superadmin = $this->admin->checkSuperAdmin($userId);

        $query = "SELECT
                    u.id,
                    u.name,
                    u.last_name,
                    u.email,
                    ut.name as user_type,
                    u.created_at,
                    u.deleted
                FROM ".$this->table." u
                INNER JOIN user_types ut ON (u.user_type_id = ut.id)";
        if (!$superadmin) { 
            $params = [ 1 , $userId ];
            $query .= "WHERE u.user_type_id != ? AND
                            u.id != ?
                        ORDER BY u.created_at DESC";
        } else {
            $params = [ $userId ];
            $query .= "WHERE u.id != ?
                    ORDER BY u.created_at DESC";
        }
        
        $conn = $this->connect();

        $users = $this->selectMultiple($conn, $query, $params);

        $results = [];
        if (count($users) > 0) {
            $results['response'] = true;
            $results['results'] = $users;
            
            return $results;
        }

        $results['response'] = false;
        $results['results'] = [];
        
        return $results;
    }

    public function getUserTypes($userId)
    {
        $superadmin = $this->admin->checkSuperAdmin($userId);

        $query = "SELECT
                    id,
                    name
                FROM user_types
                WHERE deleted = ?";
        if (!$superadmin) {
            $params = [ 0, 1 ];
            $query .= " AND id != ? ";
        } else {
            $params = [ 0 ];
        }

        $conn = $this->connect();

        $userTypes = $this->selectMultiple($conn, $query, $params);

        $results = [];
        if (count($userTypes) > 0) {
           $results['response'] = true;
           $results['results'] = $userTypes;
           
           return $results;
        }

        $results['response'] = false;
        $results['results'] = [];
        
        return $results;
    }

    public function create($name, $lastName, $email, $userType, $phone, $address, $url, $password) 
    {
        $params = [
            $name,
            $lastName,
            $email,
            $userType,
            $phone,
            $address,
            $url,
            $password
        ];

        $query = "INSERT INTO " . $this->table . " (
                    name,
                    last_name,
                    email,
                    user_type_id,
                    phone,
                    address,
                    url,
                    password
                ) VALUE (?,?,?,?,?,?,?,?)";

        $conn = $this->connect();

        $create = $this->query($conn, $query, $params);
        
        if ($create) {
            return true;
        }

        return false;
    }

    public function getUser($id) {
        $params = [$id];

        $query = "SELECT
                    id,
                    name,
                    last_name,
                    email,
                    user_type_id,
                    phone,
                    address,
                    url
                FROM " . $this->table ."
                WHERE id = ?";
        
        $conn = $this->connect();

        $user = $this->select($conn, $query, $params);

        $result = [];
        if (isset($user['id'])) {
            $result['response'] = true;
            $result['result'] = $user;

            return $result;
        }

        $result['response'] = false;
        $result['result'] = [];

        return $result;
    }

    public function update($id, $name, $lastName, $email, $userType, $phone, $address, $url) 
    {
        $params = [
            $name,
            $lastName,
            $email,
            $userType,
            $phone,
            $address,
            $url,
            $id
        ];

        $query = "UPDATE " . $this->table . " SET 
                    name = ?,
                    last_name = ?,
                    email = ?,
                    user_type_id = ?,
                    phone = ?,
                    address = ?,
                    url = ?
                WHERE id = ?";
        
        $conn  = $this->connect();

        $update = $this->query($conn, $query, $params);

        if ($update) {
            return true;
        }

        return false;
    }

    public function delete($id)
    {
        $params = [ $id ];

        $query = "UPDATE " . $this->table . " SET 
                    deleted = 1
                WHERE id = ?";
        
        $conn = $this->connect();

        $delete = $this->query($conn, $query, $params);
        
        if ($delete) {
            return true;
        }

        return false;
    }

    public function enable($id) 
    {
        $params = [ $id ];

        $query = "UPDATE " . $this->table . " SET 
                    deleted = 0
                WHERE id = ?";
        
        $conn = $this->connect();

        $enable = $this->query($conn, $query, $params);
        
        if ($enable) {
            return true;
        }

        return false;
    }
}
