<?php
require_once('db.class.php');

class Search extends Db {
    public function getLostPet($userId) {
        $params = [ $userId ];

        $query = "SELECT 
                    id,
                    user_id,
                    name,
                    genre_id,
                    pet_type_id,
                    breed_id,
                    pet_color_id,
                    pet_eye_color_id,
                    file_url
                FROM lost 
                WHERE user_id = ?
                LIMIT 1";

        $conn = $this->connect();

        $lost = $this->select($conn, $query, $params);

        $results = [];
        if (isset($lost['id'])) {
            $results['response'] = true;
            $results['results'] = $lost;

            return $results;
        }

        $results['response'] = false;
        $result['results'] = [];
        return $results;
    }

    public function match($results) {
        $user = $results['user_id'];
        $name = $results['name']; 
        $genre = $results['genre_id'];
        $petType = $results['pet_type_id'];
        $breed = $results['breed_id'];
        $petColor =  $results['pet_color_id'];
        $petEyeColor = $results['pet_eye_color_id'];
        $fileUrl = $results['file_url'];
    
        $params = [
            $user,
            $genre,
            $petType,
            $breed,
            $petColor,
            $petEyeColor
        ];

        $query = "SELECT
                    '" . $fileUrl. "' as lost_file_url,
                    u.email,
                    g.name as genre,
                    pt.name as pet_type,
                    b.name as breed,
                    pc.color,
                    pec.color as color_eyes,
                    f.file_url
                FROM found f
                INNER JOIN users u ON (f.user_id = u.id)
                INNER JOIN genres g ON (f.genre_id = g.id)
                INNER JOIN pet_types pt ON (f.pet_type_id = pt.id)
                INNER JOIN breeds b ON (f.breed_id = b.id)
                INNER JOIN pet_color pc ON (f.pet_color_id = pc.id)
                INNER JOIN pet_eye_colors pec ON (f.pet_eye_color_id = pec.id)
                WHERE 
                    f.user_id != ? AND
                    f.genre_id = ? AND
                    f.pet_type_id = ? AND
                    f.breed_id = ? AND
                    f.pet_color_id = ? AND
                    f.pet_eye_color_id = ?";
        
        $conn = $this->connect();

        $match = $this->selectMultiple($conn, $query, $params);

        $results = [];
        if (count($match) > 0) {
            $results['response'] = true;
            $results['results'] = $match;
            
            return $results;
        }

        $results['response'] = false;
        $results['results'] = [];

        return $results;
    }
}
?>