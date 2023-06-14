<?php
require_once('../../model/search.class.php');

$userId = $_POST['userId'];

if (isset($_POST['action']) && $_POST['action'] === 'search' && $userId !== '') {
    $search = new Search();
    $lost = $search->getLostPet($userId);
    if ($lost['response']) {
        $match = $search->match($lost['results']);
        if ($match['response']) {
            echo json_encode([
                'response' => 'success',
                'results' => $match['results']
            ]);
        }else {
            echo json_encode([ 'response' => 'error_match' ]);
        }
    } else {
        echo json_encode([ 'response' => 'error_select' ]);
    }
} else {
    echo json_encode([ 'response' => 'error_request' ]);
}
?>