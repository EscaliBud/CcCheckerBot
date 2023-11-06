<?php

function send_reply($chatId, $message_id, $keyboard, $message) {
    global $website;
    $url = $website . "/sendMessage?chat_id=" . $chatId . "&text=" . urlencode($message) . "&reply_to_message_id=" . $message_id . "&parse_mode=HTML&reply_markup=" . $keyboard;
    $response = file_get_contents($url);
    
    if ($response === FALSE) {
        error_log("Failed to send message: " . $url);
    }
    
    return json_decode($response, TRUE)['result']['message_id'];
}


function edit_sent_message($chatId, $message_id, $message) {
    global $website;
    $url = $website . "/editMessageText?chat_id=" . $chatId . "&message_id=" . $message_id . "&text=" . urlencode($message) . "&parse_mode=HTML";
    $response = file_get_contents($url);

    if ($response === FALSE) {
        error_log("Failed to edit message: " . $url);
    }
    return $response;
}


function checkAccess($userid) {
    $usersPaid = file("Database/paid.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $usersOwner = file("Database/owner.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
  $allUsers = array_merge($usersPaid, $usersOwner);
    foreach($allUsers as $user) {
        $parts = explode(" ", $user);
        $userIdFromFile = $parts[0];

        if($userid == $userIdFromFile) {
            return true;
        }
    }
    return false;
}

function editMessagei ($chatId, $message,$message_id){
global $botToken;
$url = "https://api.telegram.org/bot".$botToken."/editMessageText?chat_id=".$chatId."&message_id=".$message_id."&text=".$message."&parse_mode=HTML";
$result = file_get_contents($url);      

}






