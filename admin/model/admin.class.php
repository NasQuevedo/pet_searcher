<?php
require_once('../../model/db.class.php');

class Admin extends Db {
    public function login ($email, $password)
    {
        $params = [
            $email,
            $password,
            1
        ];

        $query = "SELECT 
                    id,
                    name, 
                    last_name, 
                    email,
                    user_type_id
                FROM users 
                WHERE 
                    email = ? AND
                    password = ? AND
                    user_type_id = ?
                LIMIT 1";

        $conn = $this->connect();

        $result = $this->select($conn, $query, $params);

        if (count($result) > 0 && isset($result['id'])) {        
            session_start();

            $_SESSION['id'] = $result['id'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['last_name'] = $result['last_name'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['user_type_id'] = $result['user_type_id'];

            return true;
        }

        return false;
    }

    public function logout()
    {
        session_start();

        unset($_SESSION['id']);
        unset($_SESSION['name']);
        unset($_SESSION['last_name']);
        unset($_SESSION['email']);
        unset($_SESSION['user_type_id']);

        session_destroy();
    }

    public function getUserTypes()
    {
        $params = [ 1 ];

        $query = "SELECT
                    name,
                    last_name,
                    email
                FROM users
                WHERE user_type_id != ? ";
    }

    public function createUser($name, $lastName, $email, $password, $userType) 
    {

    }
}