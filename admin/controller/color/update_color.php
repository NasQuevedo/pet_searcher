<?php
require_once('../../model/color.class.php');

$id = $_POST['id'];
$petType = $_POST['petType'];
$name = $_POST['name'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'update_color' &&
    $_POST['module'] === 'admin'
) {
    $color = new Color();
    $update = $color->update($id, $petType, $name);
    if ($update) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>