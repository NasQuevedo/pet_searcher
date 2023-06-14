<?php
require_once('../../model/found.class.php');

$userId = $_POST['userId'];
if (isset($_POST['action']) && $_POST['action'] === 'get_founds') {
    $found = new Found();
    $founds = $found->getFounds($userId);
    if ($founds['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $founds['results']
        ]);
    }else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>