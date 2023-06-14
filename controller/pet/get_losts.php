<?php
require_once('../../model/lost.class.php');

$userId = $_POST['userId'];
if (isset($_POST['action']) && $_POST['action'] === 'get_losts') {
    $lost = new Lost();
    $losts = $lost->getLosts($userId);
    if ($losts['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $losts['results']
        ]);
    }else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>