<?php
require_once('db.class.php');
require_once('user.class.php');

class Config extends Db {
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function updateUserInfo($id, $name, $lastName, $email, $phone, $address, $url)
    {
        $params = [
            $name,
            $lastName,
            $email,
            $phone,
            $address,
            $url,
            $id
        ];

        $query = "UPDATE users SET
                    name = ?,
                    last_name = ?,
                    email = ?,
                    phone = ?,
                    address = ?,
                    url = ?
                WHERE id = ?";

        $conn = $this->connect();

        $update = $this->query($conn, $query, $params);
        if ($update) {
            $this->user->updateSession($name, $lastName, $email, $phone, $address, $url);
            return true;
        }

        return false;
    }

    public function updatePassword($id, $currentPassword, $newPassword)
    {
        $check = $this->user->checkPassword($id, $currentPassword);

        if ($check) {
            $params = [$newPassword, $id];

            $query = "UPDATE users SET
                        password = ?
                    WHERE id = ?";
            
            $conn = $this->connect();

            $update = $this->query($conn, $query, $params);
            if ($update) {
                $this->user->logout();
                return true;
            }
        }

        return false;
    }

    public function deleteAccount($id)
    {
        $params = [ $id ];

        $query = "UPDATE users SET
                    deleted = 1
                WHERE id = ?";
        
        $conn = $this->connect();

        $delete = $this->query($conn, $query, $params);

        if ($delete) {
            $this->user->logout();
            return true;
        }

        return false;
    }
}
?>