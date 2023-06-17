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
                $password,
                0
            ];

            $query = "SELECT 
                        id, 
                        name, 
                        last_name, 
                        email,
                        user_type_id,
                        phone,
                        address,
                        url
                    FROM users 
                    WHERE 
                        email = ? AND
                        password = ? AND
                        deleted = ? 
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
                $_SESSION['phone'] = $result['phone'];
                $_SESSION['address'] = $result['address'];
                $_SESSION['url'] = $result['url'];
                
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

        public function updateSession($name, $lastName, $email, $phone, $address, $url)
        {   session_start();
            $_SESSION['name'] = $name;
            $_SESSION['last_name'] = $lastName;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['address'] = $address;
            $_SESSION['url'] = $url;
        }

        public function checkPassword($id, $password) 
        {
            $params = [$id, $password];

            $query = "SELECT 
                        id 
                    FROM users 
                    WHERE id = ? AND password = ?";
            
            $conn = $this->connect();
            
            $check = $this->select($conn, $query, $params);
            if (isset($check['id'])) {
                return true;
            }

            return false;
        }
    }
?>