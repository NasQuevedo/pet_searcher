<?php
require_once('../../model/config.class.php');

$id = $_POST['id'];

if (isset($_POST['action']) && $_POST['action'] === 'delete_account') {
    $config = new Config();
    $update = $config->deleteAccount($id);
    if ($update) {
        echo json_encode([ 'response' => 'success' ]);
    } else {
        echo json_encode([ 'response' => 'error_update' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>