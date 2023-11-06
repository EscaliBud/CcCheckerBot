<?php


if (strpos($message, "/remexp") === 0) {
    // Read the owner's chat ID from the file
    $ownerId = trim(file_get_contents('Database/owner.txt'));

    // Check if the user's chat ID matches the owner's chat ID
    if ($chatId != $ownerId) {
        sendMessage($chatId, "You're not the owner ❌", $randomArgument);
    } else {
        // The rest of your code goes here
        $lines = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
        $currentDate = date('Y-m-d');
        foreach ($lines as $index => $line) {
            list($userIdFromFile, $expiryDate) = explode(" ", $line);
            if ($expiryDate < $currentDate) {
                unset($lines[$index]); // remove the expired entry
            }
        }
        // save the remaining (non-expired) entries back to the file
        $result = file_put_contents('Database/paid.txt', implode("\n", $lines));
        if ($result !== false) {
            sendMessage($chatId, "All the expired users are removed successfully ✅", $randomArgument);
        } else {
            sendMessage($chatId, "An error occurred ❌", $randomArgument);
        }
    }
}
