<?php 
    require_once('db.class.php');

    class User extends Db {

        public function signup($name, $lastName, $email, $password) 
        {
            $params = array(
                $name,
                $lastName,
                $email,
                $password,
                2
            );

            $connection = $this->connect();

            $query = "INSERT INTO users (
                        name, 
                        last_name, 
                        email, 
                        password, 
                        user_type_id
                        ) VALUES (?,?,?,?,?)";

            $query = $this->query($connection, $query, $params);
            
            if ($query) {
                return true;
            }

            return false;
        }

        public function login($email, $password) 
        {
            $params = [
                $email,
                $password
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
                        password = ? 
                    LIMIT 1";

            $connection = $this->connect();

            $result = $this->select($connection, $query, $params);

            if (is_array($result) && count($result) > 0) {
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

            return true;
        }
    }
?>