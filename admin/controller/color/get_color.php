<?php
require_once('../../model/color.class.php');

$id = $_GET['id'];

if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_color' &&
    $_GET['module'] === 'admin'
) {
    $color = new Color();
    $col = $color->getBreed($id);
    if ($col['response']) {
        echo json_encode([
            'response' => 'success',
            'result' => $col['result']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>