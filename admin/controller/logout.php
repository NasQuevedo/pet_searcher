<?php 
require_once('../model/admin.class.php');

if (
    isset($_POST['action']) && 
    isset($_POST['module']) &&
    $_POST['action'] === 'logout' &&
    $_POST['module'] === 'admin'
) 
{
    $admin = new Admin();
    $logout = $admin->logout();

    if ($logout) {
        echo json_encode([ 'response' => 'success' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>