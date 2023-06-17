<?php
require_once('../../model/color_eye.class.php');

$id = $_GET['id'];
if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_color' &&
    $_GET['module'] === 'admin'
) {
    $colorEye = new ColorEye();
    $color = $colorEye->getColor($id);
    if ($color['response']) {
        echo json_encode([
            'response' => 'success',
            'result' => $color['result']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>