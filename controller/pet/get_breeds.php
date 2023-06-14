<?php
require_once('../../model/pet.class.php');

$petType = $_POST['petType'];
if (isset($_POST['action']) && $_POST['action'] === 'get_breeds') {
    $pet = new Pet();
    $getBreeds = $pet->getBreeds($petType);

    if ($getBreeds['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $getBreeds['results']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_get' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>