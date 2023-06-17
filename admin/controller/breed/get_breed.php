<?php
require_once('../../model/breed.class.php');

$id = $_GET['id'];

if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_breed' &&
    $_GET['module'] === 'admin'
) {
    $breed = new Breed();
    $bre = $breed->getBreed($id);
    if ($bre['response']) {
        echo json_encode([
            'response' => 'success',
            'result' => $bre['result']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>