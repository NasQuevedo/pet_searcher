<?php
require_once('../../model/breed.class.php');

if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_breeds' &&
    $_GET['module'] === 'admin'
) {
    $breed = new Breed();
    $breeds = $breed->getBreeds();
    if ($breeds['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $breeds['results']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>