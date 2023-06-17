<?php
require_once('../../model/color_eye.class.php');

if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_colors' &&
    $_GET['module'] === 'admin'
) {
    $colorEye = new ColorEye();
    $colors = $colorEye->getColors();
    if ($colors['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $colors['results']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>