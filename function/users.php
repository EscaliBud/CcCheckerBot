<?php

$owners = ["6421164902", "BADDOOR"];  // Add owner ids here

function getUsersCount($filename) {
    if(file_exists($filename)) {
        $lines = file($filename);
        return count($lines);
    } else {
        return 0; // Return 0 if the file doesn't exist
    }
}

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update['message']['text'])) {
    $message = $update['message']['text'];
    $chat_id = $update['message']['chat']['id'];

    if ($message === '/users') {
        if (in_array($chat_id, $owners)) {
            $freeUserCount = getUsersCount('Database/free.txt');
            $paidUserCount = getUsersCount('Database/paid.txt');
            $banUserCount = getUsersCount('Database/banned.txt');
            $response = "<b>[↯] Total users: {$freeUserCount}%0A[↯] Paid users: {$paidUserCount}%0A[↯] Banned users: {$banUserCount}%0A%0A[↯] Bot by: @BADDOOR </b>";
        } else {
            $response = "<b>Bad luck!You're not the Owner ❌</b>";
        }
        sendMessage($chat_id, $response, $message_id);
    }
}
?>
