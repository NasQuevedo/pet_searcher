<?php
require_once('../../model/config.class.php');

$id = $_POST['id'];
$name = $_POST['name'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$url = $_POST['url'];

if (isset($_POST['action']) && $_POST['action'] === 'update_info') {
    $config = new Config();
    $update = $config->updateUserInfo($id, $name, $lastName, $email, $phone, $address, $url);
    if ($update) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_update' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>