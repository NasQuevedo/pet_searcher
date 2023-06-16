<?php
    require_once('../../model/user.class.php');

    $userId = $_GET['userId'];
    if (
        isset($_GET['action']) &&
        isset($_GET['module']) &&
        $_GET['action'] === 'get_user_types' &&
        $_GET['module'] === 'admin'
    ) {
        $user = new User();
        $userTypes = $user->getUserTypes($userId);
       if ($userTypes['response']) {
            echo json_encode([
                'response' => 'success',
                'results' => $userTypes['results']
            ]);
       } else {
            echo json_encode([ 'response' => 'error_select' ]);
       }
    } else {
        echo json_encode([ 'response' => 'error_request' ]);
    }
?>