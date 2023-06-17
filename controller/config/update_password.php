<?php
require_once('../../model/config.class.php');

$id = $_POST['id'];
$currentPassword = md5($_POST['currentPassword']);
$newPassword = md5($_POST['newPassword']);

if (isset($_POST['action']) && $_POST['action'] === 'update_password') {
    $config = new Config();
    $update = $config->updatePassword($id, $currentPassword, $newPassword);
    if ($update) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_update' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>