<?php
require_once('../model/user.class.php');

$name       = $_POST['name'];
$lastName   = $_POST['lastName'];
$email      = $_POST['email'];
$password   = md5($_POST['password']);

if (isset($_POST['action']) && $_POST['action'] === 'signup') {
    $user   = new User();
    $signup = $user->signup($name, $lastName, $email, $password);

    if ($signup) {
        echo json_encode(['response' => 'success']);
    } else {
        echo json_encode(['response' => 'error_signup']);
    }
} else {
    echo json_encode(['response' => 'error_request']);
}
?>