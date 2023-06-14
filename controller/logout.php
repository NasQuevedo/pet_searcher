<?php
require_once('../model/user.class.php');

if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    $user = new User();
    $logout = $user->logout();

    if ($logout) {
        echo json_encode(['response' => 'success']);
    } else {
        echo json_encode(['response' => 'error']);
    }
} else {
    echo json_encode(['response' => 'error']);
}
?>