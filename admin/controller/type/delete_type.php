<?php
require_once('../../model/type.class.php');

$id = $_POST['id'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'delete_type' &&
    $_POST['module'] === 'admin'
) {
    $type = new Type();
    $delete = $type->delete($id);
    if ($delete) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>