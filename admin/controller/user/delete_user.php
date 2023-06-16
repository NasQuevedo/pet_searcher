<?php
require_once('../../model/user.class.php');

$id = $_POST['id'];

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'delete_user' &&
    $_POST['module'] === 'admin'
) {
    $user = new User();
    $delete = $user->delete($id);
    if ($delete) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_delete' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}