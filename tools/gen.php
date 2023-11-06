<?php

function sendMessageWithInlineKeyboard($chatId, $response, $messageId = null) {
    $inline_keyboard = array(
        array(
            array("text" => "𝑮𝒆𝒏𝒆𝒓𝒂𝒕𝒆 𝑨𝒈𝒂𝒊𝒏", "callback_data" => "/gen")
        )
    );
    
    $replyMarkup = array(
        'inline_keyboard' => $inline_keyboard
    );
    
    $data = array(
        'chat_id' => $chatId,
        'text' => $response,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    );
    
    if (isset($messageId)) {
        $data['reply_to_message_id'] = $messageId;
    }

    $url = $GLOBALS['website'] . "/sendMessage?" . http_build_query($data);
    file_get_contents($url);
}

//======inline keyboard end=======//
function editMessage($chatId, $messageId, $text) {
    $inline_keyboard = array(
        array(
            array("text" => "𝑮𝒆𝒏𝒆𝒓𝒂𝒕𝒆 𝑨𝒈𝒂𝒊𝒏", "callback_data" => "/gen")
        )
    );
    
    $replyMarkup = array(
        'inline_keyboard' => $inline_keyboard
    );
    
    $data = array(
        'chat_id' => $chatId,
        'message_id' => $messageId,
        'text' => $text,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    );

    $url = $GLOBALS['website'] . "/editMessageText?" . http_build_query($data);
    file_get_contents($url);
}
//==========function editMessage====//

function saveLastUsedBin($userId, $bin) {
    // Each user has a unique file named by their ID
    $filename = "bincache/last_used_bin_$userId.txt";

    // Load the existing data
    $data = file_exists($filename) ? file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

    // Create new record
    $newRecord = "$userId - $bin";

    // If data is not empty, and there are more than 100 records, remove the oldest
    if (count($data) >= 100) {
        array_shift($data);
    }

    // Add new record
    array_push($data, $newRecord);

    // Save the data
    file_put_contents($filename, implode("\n", $data));
}

function getLastUsedBin($userId) {
    $filename = "bincache/last_used_bin_$userId.txt";
    
    if (!file_exists($filename)) {
        return null;
    }

    $data = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Get the last bin used by the user
    $lastRecord = end($data);
    list($id, $bin) = explode(' - ', $lastRecord);
    
    return $bin;
}

    

function generateCC($input, $quantity = 20) {
    // Fetch BIN information outside the loop
    $binInfo = fetchBINInfo($input);

    // Initialize the response array for credit cards
    $cardsResponse = [];

    for ($i = 0; $i < $quantity; $i++) {
        // Generate your CC number, expiration month, expiration year, and CVV based on the given format
        $ccInfo = parseCCFormat($input);
        $cc = generateCCNumber($ccInfo['ccNumber'], $input); // Pass the BIN as a prefix
        $mm = $ccInfo['expirationMonth'] ?? str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
        $yy = $ccInfo['expirationYear'] ?? "20" . rand(23, 33);
        $cvv = $ccInfo['cvv'] ?? generateRandomCVV();
      
        $cardsResponse[] = [
            'cc' => $cc,
            'mm' => $mm,
            'yy' => $yy,
            'cvv' => $cvv,
        ];
    }

    // Generate the response string
$response = "<b>🧾𝑯𝒆𝒓𝒆 𝒂𝒓𝒆 𝒚𝒐𝒖𝒓 𝒄𝒂𝒓𝒅𝒔 𝑳𝒐𝒍𝒊𝒄𝒐𝒏\n\n•├𝑩𝒊𝒏 ⇾ $input\n•├𝑨𝒎𝒐𝒖𝒏𝒕 ⇾ $quantity\n╔═════════════════╗\n</b>";

foreach ($cardsResponse as $card) {
    // Access individual elements of each credit card and append to the response string
    $cc = $card['cc'];
    $mm = $card['mm'];
    $yy = $card['yy'];
    $cvv = $card['cvv'];

    $response .= "<code>$cc|$mm|$yy|$cvv\n</code>";
}

// Append BIN information to the response string
$name = strtoupper($binInfo['country']['name'] ?? '');
$brand = strtoupper($binInfo['scheme'] ?? '');
$type = strtoupper($binInfo['type'] ?? '');
$bank = isset($binInfo['bank']['name']) ? strtoupper($binInfo['bank']['name']) : '';

$response .= "<b>╚═════════════════╝\n•├𝑩𝒂𝒏𝒌 » <code>$bank</code></b>\n";
$response .= "<b>•├𝑩𝒓𝒂𝒏𝒅 » <code>$brand</code></b>\n";
$response .= "<b>•├𝑻𝒚𝒑𝒆 » <code>$type</code></b>\n";
$response .= "<b>•├𝑪𝒐𝒖𝒏𝒕𝒓𝒚 » <code>$name</code></b>\n";

// Append a custom footer to the response
$response .= "<b>\n•├Dev » <code>@BADDOOR</code></b>";

    return $response;
}

function generateCCNumber($bin, $input) {
    $ccNumber = $bin; 
    $remainingDigits = 16 - strlen($bin) - 1;

    for ($i = 0; $i < $remainingDigits; $i++) {
        $ccNumber .= mt_rand(0, 9);
    }

    $ccNumber .= calculateLuhnCheckDigit($ccNumber);
    return $ccNumber;
}

function calculateLuhnCheckDigit($number) {
    $sum = 0;
    $numDigits = strlen($number);
    $parity = $numDigits % 2;

    for ($i = $numDigits - 1; $i >= 0; $i--) {
        $digit = intval($number[$i]);

        if ($i % 2 != $parity) {
            $digit *= 2;
            if ($digit > 9) {
                $digit -= 9;
            }
        }

        $sum += $digit;
    }

    $checkDigit = (10 - ($sum % 10)) % 10;
    return $checkDigit;
}

function generateRandomCVV() {
    return str_pad(rand(1, 999), 3, "0", STR_PAD_LEFT);
}

function generateRandomCVVWithLuhn($ccNumber) {
    $randomCVV = str_pad(rand(1, 999), 3, "0", STR_PAD_LEFT); // Generate a random 3-digit CVV
    $ccNumberWithCVV = $ccNumber . $randomCVV;
    $luhnCheckDigit = calculateLuhnCheckDigit($ccNumberWithCVV);
    return substr($randomCVV, 0, 2) . $luhnCheckDigit;
}


function parseCCFormat($input) {
    if (strpos($input, '|') !== false) {
        $ccInfo = [];
        $parts = explode('|', $input);
        if (count($parts) >= 4) {
            $ccInfo['ccNumber'] = str_replace('x', null, $parts[0]);
            $ccInfo['expirationMonth'] = $parts[1];
            $ccInfo['expirationYear'] = $parts[2];
            $ccInfo['cvv'] = str_replace('xxx', generateRandomCVV(), $parts[3]);

            if (strpos($ccInfo['expirationMonth'], 'x') !== false) {
                $ccInfo['expirationMonth'] = str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
            }

            if (strpos($ccInfo['expirationYear'], 'x') !== false) {
                $ccInfo['expirationYear'] = "20" . rand(23, 33); // Modified here
            }
        }
        return $ccInfo;
    } else {
        $ccInfo = [];
        $ccInfo['ccNumber'] = str_replace('x', null, $input);
        $ccInfo['expirationMonth'] = str_pad(rand(1, 12), 2, "0", STR_PAD_LEFT);
        $ccInfo['expirationYear'] = "20" . rand(23, 33); // Modified here
        $ccInfo['cvv'] = generateRandomCVV();
        return $ccInfo;
    }
}


$message = $_POST['message'] ?? '';

//--------bin info--------//


function fetchBINInfo($bin) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/' . $bin);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

//--------bin info end----------//



$update = json_decode(file_get_contents('php://input'), true);
if (isset($update['message'])) {
    $message = $update['message']['text'];
    $chat_id = $update['message']['chat']['id'];
    $userId = $update['message']['from']['id'];  // Extract the user id

    if (preg_match('/^(?:\/|\.)gen (.+)$/', $message, $matches)) {
        $input = $matches[1];
        saveLastUsedBin($userId, $input);  // Save the last used bin with userId
        $response = generateCC($input, 10);
        sendMessageWithInlineKeyboard($chat_id, $response);
    } else {
        //$givenMessage = "Please provide a valid format. Example: \n /gen 531462009379xxxx|03|2026|xxx or \n/gen 601120";
        sendMessageWithInlineKeyboard($chat_id, $givenMessage);
    }
} elseif (isset($update['callback_query'])) {
    $callback_query = $update['callback_query'];
    $data = $callback_query['data']; 
    $message = $callback_query['message'];
    $chat_id = $message['chat']['id'];
    $message_id = $message['message_id'];
    $userId = $callback_query['from']['id'];  // Extract the user id from the callback query

    if ($data == '/gen') {
        $input = getLastUsedBin($userId);  // Get the last bin used by the user
        $response = generateCC($input, 10);
        editMessage($chat_id, $message_id, $response);
    }
}
