<?php





$update = json_decode(file_get_contents('php://input'), true);
if (isset($update['message'])) {
    $userId = $update['message']['from']['id'];

}


$users = file_get_contents('Database/free.json');
$freeusers = explode("\n", $users);

$owners = file_get_contents('Database/owner.json');
$admins = explode("\n", $owners);

$pm = file_get_contents('Database/paid.json');
$pms = explode("\n", $pm);


$rank = "[Free]";
if (isset($userId)) {
    if (in_array($userId, $admins)) {
        $rank = "[Owner]";
    } elseif (in_array($userId, $pms)) {
        $rank = "[Premium]";
    } elseif (isset($allowedUsers) && in_array($userId, $allowedUsers)) {
        $rank = "[Authorized]";
    }
} else {
    // Handle error
}

?>
