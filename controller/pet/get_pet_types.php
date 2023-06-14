<?php
require_once('../../model/pet.class.php');

if (isset($_POST['action']) && $_POST['action'] === 'get_pet_types') {
    $pet = new Pet();
    $getPetTypes = $pet->getPetTypes();
    if ($getPetTypes['response']) {
        echo json_encode(
            [
                'response' => 'success',
                'results' => $getPetTypes['results']
            ]
        );
    } else {
        echo json_encode([ 'response' => 'error_get' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>