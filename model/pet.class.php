<?php 
require_once('db.class.php');

class Pet extends Db {
    public function getPetTypes() 
    {
        $params = [ 0 ];

        $query = "SELECT 
                    id,
                    name
                FROM pet_types
                WHERE deleted = ?";

        $conn = $this->connect();

        $result = $this->selectMultiple($conn, $query, $params);

        $results = [];
        if (count($result) > 0) {
            $results['response'] = true;
            $results['results'] = $result;

            return $results;
        }

        $results['response'] = false;
        $results['result'] = [];

        return $results;
    }

    public function getBreeds($petType) 
    {
        $params = [ $petType, 0 ];

        $query = "SELECT
                    id,
                    name
                FROM breeds
                WHERE pet_type_id = ? AND
                    deleted = ?";

        $conn = $this->connect();

        $result = $this->selectMultiple($conn, $query, $params);

        $results = [];
        if (count($result) > 0) {
            $results['response'] = true;
            $results['results'] = $result;

            return $results;
        }

        $results['response'] = false;
        $results['results'] = [];
        return $results;
    }

    public function getPetColors($petType) 
    {
        $params = [ $petType, 0 ];

        $query = "SELECT
                    id,
                    color
                FROM pet_color
                WHERE pet_type_id = ? AND
                    deleted = ?";

        $conn = $this->connect();

        $result = $this->selectMultiple($conn, $query, $params);

        $results = [];
        if (count($result) > 0) {
            $results['response'] = true;
            $results['results'] = $result;

            return $results;
        }

        $results['response'] = false;
        $results['results'] = [];
        return $results;
    }

    public function getPetEyeColors() 
    {
        $params = [ 0 ];

        $query = "SELECT
                    id,
                    color
                FROM pet_eye_colors
                WHERE 
                    deleted = ?";

        $conn = $this->connect();

        $result = $this->selectMultiple($conn, $query, $params);

        $results = [];
        if (count($result) > 0) {
            $results['response'] = true;
            $results['results'] = $result;

            return $results;
        }

        $results['response'] = false;
        $results['results'] = [];
        return $results;
    }
}
?>