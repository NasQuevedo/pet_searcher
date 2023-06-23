<?php
require_once('db.class.php');

class Found extends Db {
    public function create($userId, $name, $genre, $petType, $breeds, $petColor, $petEyeColor, $description, $fileUrl)
    {
        $params = [
            $userId,
            $name,
            $genre,
            $petType,
            $breeds,
            $petColor,
            $petEyeColor,
            $description,
            $fileUrl
        ];

        $query = "INSERT INTO found (
                    user_id,
                    name,
                    genre_id,
                    pet_type_id,
                    breed_id,
                    pet_color_id,
                    pet_eye_color_id,
                    description,
                    file_url
                ) VALUES (?,?,?,?,?,?,?,?,?)";

        $conn = $this->connect();

        $create = $this->query($conn, $query, $params);

        if ($create) {
            return true;
        }

        return false;
    }

    public function getFounds($userId)
    {
        $params = [ $userId, 0 ];

        $query = "SELECT
                    f.name,
                    g.name as genre,
                    pt.name as pet_type,
                    b.name as breed,
                    pc.color,
                    pec.color as color_eyes,
                    description,
                    file_url,
                    f.created_at
                FROM found f
                INNER JOIN genres g ON (f.genre_id = g.id)
                INNER JOIN pet_types pt ON (f.pet_type_id = pt.id)
                INNER JOIN breeds b ON (f.breed_id = b.id)
                INNER JOIN pet_color pc ON (f.pet_color_id = pc.id)
                INNER JOIN pet_eye_colors pec ON (f.pet_eye_color_id = pec.id)
                WHERE f.user_id = ? AND
                    f.deleted = ?
                ORDER BY f.created_at ASC";
        
        $conn = $this->connect();

        $losts = $this->selectMultiple($conn, $query, $params);

        $result =  [];
        if (count($losts) > 0) {
            $results['response'] = true;
            $results['results'] = $losts;

            return $results;
        }

        $results['response'] = false;
        $results['results'] = [];

        return $results;
    }
}
?>