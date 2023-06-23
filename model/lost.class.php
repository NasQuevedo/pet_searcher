<?php
require_once('db.class.php');

class Lost extends Db {
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

        $query = "INSERT INTO lost (
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

    public function getLosts($userId)
    {
        $params = [ $userId, 0 ];

        $query = "SELECT
                    l.name,
                    g.name as genre,
                    pt.name as pet_type,
                    b.name as breed,
                    pc.color,
                    pec.color as color_eyes,
                    description,
                    file_url,
                    l.created_at
                FROM lost l
                INNER JOIN genres g ON (l.genre_id = g.id)
                INNER JOIN pet_types pt ON (l.pet_type_id = pt.id)
                INNER JOIN breeds b ON (l.breed_id = b.id)
                INNER JOIN pet_color pc ON (l.pet_color_id = pc.id)
                INNER JOIN pet_eye_colors pec ON (l.pet_eye_color_id = pec.id)
                WHERE l.user_id = ? AND
                    l.deleted = ?
                ORDER BY l.created_at ASC";
        
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