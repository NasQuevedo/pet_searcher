<?php 
require_once('../../model/user.class.php');

$id = $_GET['id'];

if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_user' &&
    $_GET['module'] === 'admin'
) {
    $user = new User();
    $usr = $user->getUser($id);
    if ($usr['response']) {
        echo json_encode([
            'response' => 'success',
            'result' => $usr['result']
        ]);
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>