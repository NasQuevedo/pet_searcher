<?php
require_once('../model/admin.class.php');

$email      = $_POST['email'];
$password   = md5($_POST['password']);

if (
    isset($_POST['action']) && 
    isset($_POST['module']) &&
    $_POST['action'] === 'login' &&
    $_POST['module'] === 'admin'
) 
{
    $admin = new Admin();
    $login = $admin->login($email, $password);

    if ($login) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_login' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>