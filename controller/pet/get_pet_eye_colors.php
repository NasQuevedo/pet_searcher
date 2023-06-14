<?php
require_once('../../model/pet.class.php');

if (isset($_POST['action']) && $_POST['action'] === 'get_pet_eye_color') {
    $pet = new Pet();
    $getPetEyeColors = $pet->getPetEyeColors();

    if ($getPetEyeColors['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $getPetEyeColors['results']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_get' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>