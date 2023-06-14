<?php
require_once('../../model/pet.class.php');

$petType = $_POST['petType'];
if (isset($_POST['action']) && $_POST['action'] === 'get_pet_color') {
    $pet = new Pet();
    $getPetColor = $pet->getPetColors($petType);

    if ($getPetColor['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $getPetColor['results']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_get' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>