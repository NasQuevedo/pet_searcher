<?php
require_once('../../model/type.class.php');

$id = $_POST['id'];
$name = $_POST['name'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'update_type' &&
    $_POST['module'] === 'admin'
) {
    $type = new Type();
    $update = $type->update($id, $name);
    if ($update) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>