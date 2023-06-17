<?php
require_once('../../model/type.class.php');

$name = $_POST['name'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'create_type' &&
    $_POST['module'] === 'admin'
) {
    $type = new Type();
    $create = $type->create($name);
    if ($create) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>