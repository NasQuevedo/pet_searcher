<?php
require_once('../../model/user.class.php');

$id = $_POST['id'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'enable_user' &&
    $_POST['module'] === 'admin'
) {
   $user = new User($id);
   $enable = $user->enable($id);
   if ($enable) {
    echo json_encode([ 'response' => 'success' ]);
   } else {
        echo json_encode([ 'response' => 'error_update' ]);
   }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>