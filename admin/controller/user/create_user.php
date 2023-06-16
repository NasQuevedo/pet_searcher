<?php
require_once('../../model/user.class.php');

$name       = $_POST['name'];
$lastName   = $_POST['lastName'];
$email      = $_POST['email'];
$userType   = $_POST['userType'];
$phone      = $_POST['phone'];
$address    = $_POST['address'];
$url        = $_POST['url'];
$password   = md5('P3tS34rch3r' . rand(1, 100));

if (
    isset($_POST['action']) &&
    isset($_POST['module']) &&
    $_POST['action'] === 'create_user' &&
    $_POST['module'] === 'admin'
) {
    $user = new User();
    $create = $user->create($name, $lastName, $email, $userType, $phone, $address, $url, $password);
    if ($create) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_insert' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}

?>