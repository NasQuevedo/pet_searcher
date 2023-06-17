<?php
require_once('../../model/color.class.php');

$id = $_POST['id'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'delete_color' &&
    $_POST['module'] === 'admin'
) {
    $color = new Color();
    $delete = $color->delete($id);
    if ($delete) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>