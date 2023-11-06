<?php


 $currentDate = date('Y-m-d');
    $rank = "FREE";
    $expiryDate = "0";

    $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
    $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
    $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

    if(in_array($userId, $owners)) {
        $rank = "OWNER";
       $expiryDate = "UNTIL DEAD"; 
    } else {
        foreach ($paidUsers as $index => $line) {
            list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
            if ($userIdFromFile == $userId) {
                if ($userExpiryDate < $currentDate) {
                    unset($paidUsers[$index]); //
                    file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                    $freeUsers[] = $userId;
                    file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                } else    $currentDate = date('Y-m-d');
    $rank = "FREE";
    $expiryDate = "0";

    $paidUsers = file('Database/paid.txt', FILE_IGNORE_NEW_LINES);
    $freeUsers = file('Database/free.txt', FILE_IGNORE_NEW_LINES);
    $owners = file('Database/owner.txt', FILE_IGNORE_NEW_LINES);

    if(in_array($userId, $owners)) {
        $rank = "OWNER";
       $expiryDate = "UNTIL DEAD"; 
    } else {
        foreach ($paidUsers as $index => $line) {
            list($userIdFromFile, $userExpiryDate) = explode(" ", $line);
            if ($userIdFromFile == $userId) {
                if ($userExpiryDate < $currentDate) {
                    unset($paidUsers[$index]); 
                    file_put_contents('Database/paid.txt', implode("\n", $paidUsers));
                    $freeUsers[] = $userId; // add to free users list
                    file_put_contents('Database/free.txt', implode("\n", $freeUsers));
                } else {
                    $rank = "PAID";
                    $expiryDate = $userExpiryDate;
                }
            }
        }
    } {
                    $rank = "PAID";
                    $expiryDate = $userExpiryDate;
                }
            }
        }
    }

function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

if ((strpos($message, "/bin") === 0) || (strpos($message, "!bin") === 0) || (strpos($message, ".bin") === 0)) {
    $bin = substr($message, 5);
    $bin = substr($bin, 0, 6);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/' . $bin);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Host: lookup.binlist.net',
        'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'
    ));
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $fim = curl_exec($ch);
    $bank = GetStr($fim, '"bank":{"name":"', '"');
    $name = strtoupper(GetStr($fim, '"name":"', '"'));
    $brand = strtoupper(GetStr($fim, '"brand":"', '"'));
    $country = strtoupper(GetStr($fim, '"country":{"name":"', '"'));
    $scheme = strtoupper(GetStr($fim, '"scheme":"', '"'));
    $emoji = GetStr($fim, '"emoji":"', '"');
    $type = strtoupper(GetStr($fim, '"type":"', '"'));

    if (empty($bank)) {
        $lookup = '<b>Lookup Failed ❌</b>';
        sendMessage($chatId, "<b>$lookup%0A%0ABin : $bin</b>", $message_id);
        exit();
    } else {
        $lookup = '<b>火 BIN INFORMATION♻️</b>';
        sendMessage($chatId, "<b>$lookup%0A╔═════════════════╗%0A•├BIN : <code>$bin</code>%0A•├INFO : <code>$scheme</code>%0A•├TYPE: <code>$type</code>%0A•├BRAND : <code>$brand</code>%0A•├BANK : <code>$bank</code>%0A•├COUNTRY : <code>$name</code> $emoji%0A╚═════════════════╝%0A•├CHECKED BY : @$username <code>[$rank]</code>%0A•├Dev :<code>@BADDOOR</code></b>", $message_id);
    }
}

?>
