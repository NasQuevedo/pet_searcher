<?php
require_once('../../model/type.class.php');

if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_types' &&
    $_GET['module'] === 'admin'
) {
    $type = new Type();
    $types = $type->getTypes();
    if ($types['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $types['results']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>