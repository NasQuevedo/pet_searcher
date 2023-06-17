<?php
require_once('../../model/color_eye.class.php');

$name = $_POST['name'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'create_color' &&
    $_POST['module'] === 'admin'
) {
    $colorEye = new ColorEye();
    $create = $colorEye->create($name);
    if ($create) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>