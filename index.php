<?php

$botToken = "6628835787:AAG3AEn1ukqUaENr09N5vk7S5odcO0BO5JM";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents('php://input');
//echo $update;
$update = json_decode($update, TRUE);
//global $website;
$e = print_r($update);
$update["message"]["chat"]["title"]; 
$newusername     = $update["message"]["new_chat_member"]["username"];
$newgId          = $update["message"]["new_chat_member"]["id"];
$newfirstname    = $update["message"]["new_chat_member"]["first_name"];
$new_chat_member = $update["message"]["new_chat_member"];
$message         = $update["message"]["text"];
$message_id      = $update["message"]["message_id"];
$chatId          = $update["message"]["chat"]["id"];
$username2       = $update["message"]["from"]["username"];
$firstname       = $update["message"]["from"]["first_name"];
$cdata2          = $update["callback_query"]["data"];
$cchatid2        = $update["callback_query"]["message"]["chat"]["id"]; 
$username2       = $update["callback_query"]["from"]["username"];
$firstname2      = $update["callback_query"]["from"]["first_name"];
$userId2         = $update["callback_query"]["from"]["id"];
$cmessage_id2    = $update["callback_query"]["message"]["message_id"]; 
$username3       = ('@'.$username);
// $username3       = '@'.$username2;
 $info            = json_encode($update, JSON_PRETTY_PRINT); 
$emojid = '❌';
$emojil = '✅';
$owner = '<code>@EscaliBud</code>';
$cofuid = '1212';
$cofuid2 = '1212';
$cofuid3 = '1212';
#FIN DE LA CAPTURA

$update = json_decode(file_get_contents("php://input"));

$chat_id = $update->message->chat->id;

$userId = $update->message->from->id;

$userIdd = $update->message->reply_to_message->from->id;

$firstnamee = $update->message->reply_to_message->from->first_name;

$firstname = $update->message->from->first_name;

$lastname = $update->message->from->last_name;

$username = $update->message->from->username;

$chattype = $update->message->chat->type;

$replytomessageis = $update->message->reply_to_message->text;

$replytomessagei = $update->message->reply_to_message->from->id;

$replytomessageiss = $update->message->reply_to_message;

$data = $update->callback_query->data;

$callbackfname = $update->callback_query->from->first_name;

$callbacklname = $update->callback_query->from->last_name;

$callbackusername = $update->callback_query->from->username;

$callbackchatid = $update->callback_query->message->chat->id;

$callbackuserid = $update->callback_query->message->reply_to_message->from->id;

$callbackmessageid = $update->callback_query->message->message_id;

$callbackfrom = $update->callback_query->from->id;

$callbackmessage = $update->callback_query->message->text;

$callbackid = $update->callback_query->id;

$text = $update->message->text;
$owner = '<code>@EscaliBud</code>';




//=======inline keyboard========//
$keyboard = json_encode([
    'inline_keyboard' => [
        [
            ['text' => "𝐎𝐖𝐍𝐄𝐑", 'url' => "https://t.me/EscaliBud"],
            ['text' => "𝐅𝐑𝐄𝐄 𝐏𝐑𝐄𝐌𝐈𝐔𝐌", 'url' => "https://t.me/InfinityHackersKE"],
        ],
    ]
]);

//=======Inline Keyboard for "BACK" button========//

if ($cdata2 == "back") {
    // Go back to the welcome page
    $gatesText = "<b>━━━━━━━━━━━━━━━━━━━\n" . str_repeat(' ', 20) . "『 𝑮𝑨𝑻𝑬𝑾𝑨𝒀𝑺 』 💫" . str_repeat(' ', 20) . "\n━━━━━━━━━━━━━━━━━━━\n • ┌TOTAL GATES ⇢ 9\n • ├PREMIUM GATES ❥︎ 5\n • └FREE GATES ⇢ 4\n\n ├𝐁𝐎𝐓 𝐁𝐘 ❥︎  @InfinityHackersKE</b>";

    $gatesText = "<b>━━━━━━━━━━━━━━━━━━━\n" 
               . str_repeat(' ', 20) . "『 𝑮𝑨𝑻𝑬𝑾𝑨𝒀𝑺 』 💫" 
               . str_repeat(' ', 20) 
               . "\n━━━━━━━━━━━━━━━━━━━\n •├𝗧𝗼𝘁𝗮𝗹  𝗚𝗔𝗧𝗘𝗦 ⇢ 9\n •├𝗣𝗥𝗘𝗠𝗜𝗨𝗠  𝗚𝗔𝗧𝗘𝗦 ⇢ 5 \n •├𝗙𝗥𝗘𝗘 𝗚𝗔𝗧𝗘𝗦 ⇢ 4\n\n━━━━━━━━━━━━━━━━━━━\n •├Dev ➳ <code>@EscaliBud</code></b>";

    $gatesKeyboard = json_encode([
        'inline_keyboard' => [
            [['text' => '𝗣𝗥𝗘𝗠𝗜𝗨𝗠 ', 'callback_data' => 'premium'], ['text' => '𝗙𝗥𝗘𝗘 ', 'callback_data' => 'free']],
            [['text' => '𝗕𝗔𝗖𝗞', 'callback_data' => 'back2']]
        ]
    ]);
    $videoUrl = "https://t.me/DartNetc/6";

    $inputMediaVideo = json_encode([
        'type' => 'video',
        'media' => $videoUrl,
        'caption' => $gatesText,
        'parse_mode' => 'HTML'
    ]);

    file_get_contents("https://api.telegram.org/bot$botToken/editMessageMedia?chat_id=$cchatid2&message_id=$cmessage_id2&media=" . urlencode($inputMediaVideo) . "&reply_markup=" . urlencode($gatesKeyboard));
}

//============GATES START===========//

if ($cdata2 == "gates") {
    $gatesText = "<b>━━━━━━━━━━━━━━━━━━━\n" 
               . str_repeat(' ', 20) . "『 𝑮𝑨𝑻𝑬𝑾𝑨𝒀𝑺 』 💫" 
               . str_repeat(' ', 20) 
               . "\n━━━━━━━━━━━━━━━━━━━\n •├𝗧𝗼𝘁𝗮𝗹 𝗚𝗔𝗧𝗘𝗦 ⇢ 9\n •├𝗣𝗥𝗘𝗠𝗜𝗨𝗠 𝗚𝗔𝗧𝗘𝗦 ⇢ 5\n •├𝗙𝗥𝗘𝗘  𝗚𝗔𝗧𝗘𝗦 ⇢ 4\n\n━━━━━━━━━━━━━━━━━━━\n •├Dev ➳ <code>@InfinityHackersKE</code></b>";

  
    $gatesKeyboard = json_encode([
        'inline_keyboard' => [
            [['text' => '𝗣𝗥𝗘𝗠𝗜𝗨𝗠 ', 'callback_data' => 'premium'], ['text' => '𝗙𝗥𝗘𝗘 ', 'callback_data' => 'free']],
            [['text' => '𝗕𝗔𝗖𝗞', 'callback_data' => 'back2']]
        ]
    ]);

    $videoUrl = "https://t.me/DartNetc/6";

    $inputMediaVideo = json_encode([
        'type' => 'video',
        'media' => $videoUrl,
        'caption' => $gatesText,
        'parse_mode' => 'HTML'
    ]);

    file_get_contents("https://api.telegram.org/bot$botToken/editMessageMedia?chat_id=$cchatid2&message_id=$cmessage_id2&media=" . urlencode($inputMediaVideo) . "&reply_markup=" . urlencode($gatesKeyboard));
}





//=========Back===========//

$premiumButton = json_encode([
    'inline_keyboard' => [
        [
            ['text' => '𝗣𝗥𝗘𝗠𝗜𝗨𝗠 ⭐️', 'callback_data' => 'premium'],
            ['text' => '𝗕𝗔𝗖𝗞 ', 'callback_data' => 'back']
        ]
    ]
]);

if ($cdata2 == "free") {
    $freeText = "<b>\n𝗙𝗥𝗘𝗘 𝗚𝗔𝗧𝗘𝗦 🍁 ⇢\n\n╔═════════════════╗\n├<u>𝑮𝒂𝒕𝒆𝒘𝒂𝒚 </u> : 𝑺𝒕𝒓𝒊𝒑𝒆 𝑪𝒉𝒂𝒓𝒈𝒆 $1 ✅ 
├𝑼𝒔𝒆𝒓 : 𝗙𝗥𝗘𝗘 
├𝑼𝒔𝒂𝒈𝒆 : <code>/au 𝒄𝒄|𝒎𝒎|𝒆𝒙𝒑|𝒄𝒗𝒗 </code>\n\n├<u>𝑮𝒂𝒕𝒆𝒘𝒂𝒚</u> : SHOPIFY ❌
├𝑼𝒔𝒆𝒓 : 𝗙𝗥𝗘𝗘  soon
├𝑼𝒔𝒂𝒈𝒆 : <code>/sr 𝒄𝒄|𝒎𝒎|𝒆𝒙𝒑|𝒄𝒗𝒗 </code>\n\n├<u>𝑮𝒂𝒕𝒆𝒘𝒂𝒚</u> : PAYPAL
├𝑼𝒔𝒆𝒓 : 𝑭𝒓𝒆𝒆 ON ✅
├𝑼𝒔𝒂𝒈𝒆 : <code>/pp 𝒄𝒄|𝒎𝒎|𝒆𝒙𝒑|𝒄𝒗𝒗 </code>\n\n├<u>𝑮𝒂𝒕𝒆𝒘𝒂𝒚</u> : 
├𝑼𝒔𝒆𝒓 : 𝑭𝒓𝒆𝒆 on ✅
├𝑼𝒔𝒂𝒈𝒆 : <code>/ccn 𝒄𝒄|𝒎𝒎|𝒆𝒙𝒑|𝒄𝒗𝒗 </code>\n╚═════════════════╝\n</b>";

    // Replace this with your video URL
    $videoUrl = "https://t.me/DartNetc/6";

    $inputMediaVideo = json_encode([
        'type' => 'video',
        'media' => $videoUrl,
        'caption' => $freeText,
        'parse_mode' => 'HTML'
    ]);

    file_get_contents("https://api.telegram.org/bot$botToken/editMessageMedia?chat_id=$cchatid2&message_id=$cmessage_id2&media=" . urlencode($inputMediaVideo) . "&reply_markup=" . urlencode($premiumButton));
}


//========Premium and free=======//
$freeButton = json_encode([
    'inline_keyboard' => [
        [
            ['text' => '𝗙𝗥𝗘𝗘 ', 'callback_data' => 'free'],
            ['text' => '𝗕𝗔𝗖𝗞 ', 'callback_data' => 'back']
        ]
    ]
]);

if ($cdata2 == "premium") {
   $premiumText = "┏                                                  ┓
 〤𝙋𝙍𝙀𝙈𝙄𝙐𝙈 𝙂𝘼𝙏𝙀𝙒𝘼𝙔〤  
┗                                                  ┛
- - - - - - - - - - - - - - - - - - - - -
𝙂𝙚𝙩𝙖𝙬𝙖𝙮 🔥𝗦𝗤𝗨𝗔𝗥𝗘 𝗔𝗨𝗧𝗛 
┣ꜱᴛᴀᴛᴜꜱ [ ᴏɴʟɪɴᴇ ✅ ]
┣ᴜꜱᴇʀ [ ᴘʀᴇᴍɪᴜᴍ  🌟 ]
┣ꜰᴏʀᴍᴀᴛ: /b3 ᴄᴄ|ᴍᴏɴᴛʜ|ʏᴇᴀʀ|ᴄᴠᴠ
- - - - - - - - - - - - - - - - - - - - -
𝙂𝙖𝙩𝙚𝙬𝙖𝙮 🔥 CCN CHARGE
┣ꜱᴛᴀᴛᴜꜱ [ ᴏɴʟɪɴᴇ ✅ ]
┣ᴜꜱᴇʀ [ ᴘʀᴇᴍɪᴜᴍ  🌟 ]
┣ꜰᴏʀᴍᴀᴛ: /ccn ᴄᴄ|ᴍᴏɴᴛʜ|ʏᴇᴀʀ|ᴄᴠᴠ
- - - - - - - - - - - - - - - - - - - - -
 𝙂𝙖𝙩𝙚𝙬𝙖𝙮 🔥 𝙎𝙩𝙧𝙞𝙥𝙚 [ 𝟭$ ]
┣ꜱᴛᴀᴛᴜꜱ [ ᴏɴʟɪɴᴇ ✅ ]
┣ᴜꜱᴇʀ [ ᴘʀᴇᴍɪᴜᴍ  🌟 ]
┣ꜰᴏʀᴍᴀᴛ: /chk ᴄᴄ|ᴍᴏɴᴛʜ|ʏᴇᴀʀ|ᴄᴠᴠ
- - - - - - - - - - - - - - - - - - - - -
𝙂𝙖𝙩𝙚𝙬𝙖𝙮 🔥 BRAINTREE
┣ꜱᴛᴀᴛᴜꜱ [ ᴏɴʟɪɴᴇ ✅ ]
┣ᴜꜱᴇʀ [ ᴘʀᴇᴍɪᴜᴍ  🌟 ]
┣ꜰᴏʀᴍᴀᴛ: /bra ᴄᴄ|ᴍᴏɴᴛʜ|ʏᴇᴀʀ|ᴄᴠᴠ
 - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
𝙂𝙖𝙩𝙚𝙬𝙖𝙮 🔥 𝙋𝙖𝙮𝙛𝙡𝙤𝙬 𝘼𝙫𝙨
┣ꜱᴛᴀᴛᴜꜱ [ ᴏɴʟɪɴᴇ ✅ ]
┣ᴜꜱᴇʀ [ ꜰʀᴇᴇ ✨ ]
┣ꜰᴏʀᴍᴀᴛ: /pf ᴄᴄ|ᴍᴏɴᴛʜ|ʏᴇᴀʀ|ᴄᴠᴠ
- - - - - - - - - - - - - - - - - - - - -

┗━━━━━━━━━━━━━━━━━━━
";

    // Replace this with your video URL
    $videoUrl = "https://t.me/DartNetc/6";

    $inputMediaVideo = json_encode([
        'type' => 'video', 
        'media' => $videoUrl,
        'caption' => $premiumText,
        'parse_mode' => 'HTML'
    ]);

    file_get_contents("https://api.telegram.org/bot$botToken/editMessageMedia?chat_id=$cchatid2&message_id=$cmessage_id2&media=" . urlencode($inputMediaVideo) . "&reply_markup=" . urlencode($freeButton));
}


//=======Premium and free end=====//


//==============TOOLS===============//
$toolKeyboard = json_encode([
    'inline_keyboard' => [
        [['text' => "𝗚𝗔𝗧𝗘𝗦", 'callback_data' => 'gates'], ['text' => "𝗕𝗔𝗖𝗞", 'callback_data' => 'back2']]
    ]
]);



if ($cdata2 == "herr") {

  $toolcmds = "<b>
🛠️ 𝑻𝒐𝒐𝒍𝒔 🛠️
╔═════════════════╗
├<u>𝑼𝒔𝒆𝒓𝒔 𝑰𝒏𝒇𝒐</u> » /id\n├𝑼𝒔𝒂𝒈𝒆 » <code>/id</code>

├<u>𝑰𝒑 𝑳𝒐𝒐𝒌𝒖𝒑</u> » /ip\n├𝑼𝒔𝒂𝒈𝒆 »/ip <code>1.1.1.1</code>

├<u>𝑩𝒊𝒏 𝑳𝒐𝒐𝒌𝒖𝒑</u> » /bin\n├𝑼𝒔𝒂𝒈𝒆 » <code>/bin 601120</code> 

├<u>𝑪𝑪 𝑮𝒆𝒏𝒆𝒓𝒂𝒕𝒆 </u> » /gen\n├𝑼𝒔𝒂𝒈𝒆 » <code>/gen 601120xxx|xx|xx|xxx</code>

├<u>Credits Check </u> » /credits \n├𝑼𝒔𝒂𝒈𝒆 »<code> /credits Check </code>

├<u>𝑭𝒂𝒌𝒆 𝑨𝒅𝒅𝒓𝒆𝒔𝒔</u> » /fake\n├𝑼𝒔𝒂𝒈𝒆 » <code>/fake us</code>

├<u>𝑺𝑲 𝑪𝒉𝒆𝒄𝒌𝒆𝒓</u> » /sk\n├𝑼𝒔𝒂𝒈𝒆 » <code>/sk sk_live_</code>
 
╚═════════════════╝

               </b>";
  
    // Change this to your video URL
    $videoUrl = "https://t.me/DartNetc/6";

    $inputMediaVideo = json_encode([
        'type' => 'video',
        'media' => $videoUrl,
        'caption' => $toolcmds,
        'parse_mode' => 'HTML'
    ]);

    file_get_contents("https://api.telegram.org/bot$botToken/editMessageMedia?chat_id=$cchatid2&message_id=$cmessage_id2&media=" . urlencode($inputMediaVideo) . "&reply_markup=" . urlencode($toolKeyboard));
}



//=============TOOLS END============//

//=============PRICE===============//
if ($cdata2 == "price") {
    $priceText = "<b>\n" . str_repeat(' ', 20) . "『 𝑷𝒓𝒊𝒄𝒆 💸』" . str_repeat(' ', 20) . "\n╔═════════════════╗\n •├3 𝑫𝒂𝒚𝒔 𝑷𝒍𝒂𝒏 ⇢ 2$\n •├7 𝑫𝒂𝒚𝒔 𝑷𝒍𝒂𝒏 ⇢ 4$\n •├15 𝑫𝒂𝒚𝒔 𝑷𝒍𝒂𝒏 ⇢ 7$\n •├30 𝑫𝒂𝒚𝒔 𝑷𝒍𝒂𝒏 ⇢ 12$\n╚═════════════════╝\n •├Dev ➳ <code>@InfinityHackersKE</code>\n━━━━━━━━━━━━━━━━━━━</b>";

    $priceKeyboard = json_encode([
        'inline_keyboard' => [
            [['text' => '𝑯𝑶𝑴𝑬', 'callback_data' => 'back2'], ['text' => '𝑩𝑼𝒀', 'url' => 'https://t.meEscaliBud']]
        ]
    ]);

    // Change this to your video URL
    $videoUrl = "https://t.me/DartNetc/6";

    $inputMediaVideo = json_encode([
        'type' => 'video',
        'media' => $videoUrl,
        'caption' => $priceText,
        'parse_mode' => 'HTML'
    ]);

    file_get_contents("https://api.telegram.org/bot$botToken/editMessageMedia?chat_id=$cchatid2&message_id=$cmessage_id2&media=" . urlencode($inputMediaVideo) . "&reply_markup=" . urlencode($priceKeyboard));
}



//=============PRICE END============//

if ($cdata2 == "finalize") {
    if ($callbackfrom != $callbackuserid) {

    bot('answerCallbackQuery', [
      'callback_query_id' => $callbackid,
      'text' => "Not Allowed,Open your own Menu ❌",
      "show_alert" => true
    ]);

  } else {
file_get_contents("https://api.telegram.org/bot$botToken/deleteMessage?chat_id=$cchatid2&message_id=$cmessage_id2");
}
}





//========finalize end=========//
$channel = json_encode([
    'inline_keyboard' => [
        [['text' => "𝗚𝗿𝗼𝘂𝗽 ", 'url' => "https://t.me/InfinityHackersKE"], ['text' => "𝗖𝗵𝗮𝗻𝗻𝗲𝗹", 'url' => "https://t.me/InfinityHack3rs"]],
        [['text' => "𝗕𝗔𝗖𝗞 ", 'callback_data' => 'back2']]
    ]
]);

if ($cdata2 == "channel") {
    $channelText = "<b>𝑱𝒐𝒊𝒏 𝒐𝒖𝒓 𝑶𝒇𝒇𝒊𝒄𝒊𝒂𝒍 𝑮𝒓𝒐𝒖𝒑 𝒂𝒏𝒅 𝑪𝒉𝒂𝒏𝒏𝒆𝒍</b>";
    
    // Change this to your video URL
    $videoUrl = "https://t.me/DartNetc/6";

    $inputMediaVideo = json_encode([
        'type' => 'video',
        'media' => $videoUrl,
        'caption' => $channelText,
        'parse_mode' => 'HTML'
    ]);

file_get_contents("https://api.telegram.org/bot$botToken/editMessageMedia?chat_id=$cchatid2&message_id=$cmessage_id2&media=" . urlencode($inputMediaVideo) . "&reply_markup=" . urlencode($channel));
}



//==========back and close========//
if ($cdata2 == "back2") {
    $backtxt = ("<b>𝑾𝒆𝒍𝒄𝒐𝒎𝒆 𝒕𝒐 𝒎𝒚 𝒄𝒐𝒎𝒎𝒂𝒏𝒅 𝒔𝒆𝒄𝒕𝒊𝒐𝒏 $firstname
    
𝑬𝒙𝒑𝒍𝒐𝒓𝒆 𝒎𝒆 𝒎𝒐𝒓𝒆 𝒃𝒚 𝒄𝒍𝒊𝒄𝒌𝒊𝒏𝒈 𝒕𝒉𝒆 𝒃𝒖𝒕𝒕𝒐𝒏𝒔 𝒃𝒆𝒍𝒐𝒘</b>");
    
    // Change this to your video url
    $backVideoUrl = "https://t.me/DartNetc/6"; 

    $keyboard2 = json_encode([
        'inline_keyboard' => [
            [
                ['text' => '𝗚𝗔𝗧𝗘𝗦', 'callback_data' => 'gates'],
                ['text' => '𝗧𝗼𝗼𝗹𝘀', 'callback_data' => 'herr'],
                ['text' => '𝗣𝗿𝗶𝗰𝗲 ', 'callback_data' => 'price'],
            ],
            [
                ['text' => '𝗙𝗶𝗻𝗮𝗹𝗶𝘇𝗲', 'callback_data' => 'finalize'],
            ],
            [
                ['text' => '𝗢𝗳𝗳𝗶𝗰𝗶𝗮𝗹 𝗚𝗿𝗼𝘂𝗽 ', 'callback_data' => 'channel'],
            ],
        ]
    ]);

    $mediaArray = json_encode([
        'type' => 'video',
        'media' => $backVideoUrl,
        'caption' => $backtxt,
        'parse_mode' => 'HTML'
    ]);

    file_get_contents("https://api.telegram.org/bot$botToken/editMessageMedia?chat_id=$cchatid2&message_id=$cmessage_id2&media=" . urlencode($mediaArray) . "&reply_markup=$keyboard2");
}


//========back and close end=======//

//=========functions started=========//

///=====Function Sendphoto======//
function sendPhotox($chatId, $photo, $caption, $keyboard = null) {
    global $website;
    $url = $website."/sendPhoto?chat_id=".$chatId."&photo=".$photo."&caption=".$caption."&parse_mode=HTML";
    
    if ($keyboard != null) {
        $url .= "&reply_markup=".$keyboard;
    }

    return file_get_contents($url);
}

///======function sendVideo========///
function sendVideox($chatId, $videoURL, $caption, $keyboard) {
    global $botToken;
    $url = "https://api.telegram.org/bot$botToken/sendVideo?chat_id=$chatId&video=$videoURL&caption=" . urlencode($caption) . "&parse_mode=HTML&reply_markup=$keyboard";
    file_get_contents($url);
}



function reply_tox($chatId,$message_id,$keyboard,$message) {
    global $website;
    $url = $website."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML&reply_markup=".$keyboard."";
    return file_get_contents($url);
}

function deleteM($chatId,$message_id){
    global $website;
    $url = $website."/deleteMessage?chat_id=".$chatId."&message_id=".$message_id."";
    file_get_contents($url);
}


function edit_message($chatId,$message,$message_id_1) {
  sendChatAction($chatId,"type");
   $url = $GLOBALS['website']."/editMessageText?chat_id=".$chatId."&text=".$message."&message_id=".$message_id."&parse_mode=HTML&disable_web_page_preview=True";
	file_get_contents($url);
}


function multiexplode($delimiters, $string)
{
  $one = str_replace($delimiters, $delimiters[0], $string);
  $two = explode($delimiters[0], $one);
  return $two;
}

function gibarray($message){
    return explode("\n", $message);
}

function sendMessage ($chatId, $message, $messageId){
  sendChatAction($chatId,"type");
$url = $GLOBALS['website']."/sendMessage?chat_id=".$chatId."&text=".$message."&parse_mode=html&disable_web_page_preview=True";
file_get_contents($url);
  
};
function delMessage ($chatId, $messageId){
$url = $GLOBALS['website']."/deleteMessage?chat_id=".$chatId."&message_id=".$messageId."";
file_get_contents($url);
};

function sendChatAction($chatId, $action)
{
  
$data = array("type" => "typing", "photo" => "upload_photo", "rcvideo" => "record_video", "video" => "upload_video", "rcvoice" => "record_voice", "voice" => "upload_voice", "doc" => "upload_document", "location" => "find_location", "rcvideonote" => "record_video_note", "uvideonote" => "upload_video_note");
$actiontype = $data["$action"];
$url = $GLOBALS['website']."/sendChatAction?chat_id=".$chatId."&action=".$actiontype."&parse_mode=HTML";
file_get_contents($url);
  
}

function answerCallbackQuery($data) {
    global $botToken; // Use the global bot token

    $url = "https://api.telegram.org/bot$botToken/answerCallbackQuery";

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];

    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

}

function bot($method, $datas = [])
{
    global $botToken;
    $url = "https://api.telegram.org/bot" . $botToken . "/" . $method;

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($datas),
        CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
    ]);

    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        // Manejar el error de cURL
        return false;
    } else {
        // Decodificar la respuesta
        $result = json_decode($response, true);

        if ($result['ok']) {
            // La solicitud fue exitosa
            return $result['result'];
        } else {
            // Manejar el error de la API de Telegram
            return false;
        }
    }
}

//=========Functions end===========//


foreach (glob("tools/*.php") as $filename)
{
    include $filename;
} 

foreach (glob("function/*.php") as $filename)
{
    include $filename;
} 

foreach (glob("gates/*.php") as $filename)
{
    include $filename;
} 

foreach (glob("admin/*.php") as $filename)
{
    include $filename;
} 



//==========foreach end============//



?>

    
