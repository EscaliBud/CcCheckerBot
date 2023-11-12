<?php


function antispam($chat_id) {
    $cooldown_time = 10; // Adjust to your needs

    if(!isset($_SESSION['last_submit'][$chat_id])) {
        $_SESSION['last_submit'][$chat_id] = time();
    }

    // Get the current time
    $currentTime = time();
    // Get the time the message was last sent
    $lastSubmitTime = $_SESSION['last_submit'][$chat_id];
    // Calculate the time difference in seconds
    $timeDifference = $currentTime - $lastSubmitTime;

    // If the message was sent less than cooldown time ago
    if($timeDifference < $cooldown_time) {
        return $cooldown_time - $timeDifference; // return remaining time
    } else {
        // Update 'last_submit' session variable with the current time
        $_SESSION['last_submit'][$chat_id] = time();

        return true;
    }
}
?>
