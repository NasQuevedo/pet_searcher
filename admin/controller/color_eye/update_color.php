<?php
require_once('../../model/color_eye.class.php');

$id = $_POST['id'];
$name = $_POST['name'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'update_color' &&
    $_POST['module'] === 'admin'
) {
    $colorEye = new ColorEye();
    $update = $colorEye->update($id, $name);
    if ($update) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>