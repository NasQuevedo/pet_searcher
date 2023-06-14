<?php 
    require_once('../model/user.class.php');

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if (isset($_POST['action']) && $_POST['action'] === 'login') {
        $user = new User();
        $login = $user->login($email, $password);
        if ($login) {
            echo json_encode(['response' => 'success']);
        } else {
            echo json_encode(['response' => 'error_login']);
        }
    } else {
        echo json_encode(['response' => 'error_request']);
    }
?>