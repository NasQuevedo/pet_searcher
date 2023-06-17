<?php
require_once('../../model/color.class.php');

$petType = $_POST['petType'];
$name = $_POST['name'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'create_color' &&
    $_POST['module'] === 'admin'
) {
    $color = new Color();
    $create = $color->create($petType, $name);
    if ($create) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>