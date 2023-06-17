<?php
require_once('../../model/breed.class.php');

$id = $_POST['id'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'delete_breed' &&
    $_POST['module'] === 'admin'
) {
    $breed = new Breed();
    $delete = $breed->delete($id);
    if ($delete) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>