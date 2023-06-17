<?php
require_once('../../model/type.class.php');

$id = $_GET['id'];
if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_type' &&
    $_GET['module'] === 'admin'
) {
    $type = new Type();
    $ty = $type->getType($id);
    if ($ty['response']) {
        echo json_encode([
            'response' => 'success',
            'result' => $ty['result']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
} 
?>