<?php
require_once('../../model/user.class.php');

$userId = $_GET['userId'];

if (
    isset($_GET['action']) &&
    isset($_GET['module']) &&
    $_GET['action'] === 'get_users' &&
    $_GET['module'] === 'admin'
) {
    $user = new User();
    $users = $user->getUsers($userId);
   if ($users['response']) {
        echo json_encode([
            'response' => 'success',
            'results' => $users['results']
        ]);
   } else {
        echo json_encode([ 'response' => 'error_select' ]);
   }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>