<?php


$users = file_get_contents('Database/free.txt');
$freeusers = explode("\n", $users);

$videoURLStart = "https://t.me/DartNetc/6";


if (preg_match('/^(start)/', $text)) {
    if (in_array($userId, $freeusers)) {
        $caption = "<b> HELLO @$username 
ID ✏️ <code>$userId</code></b><code>
Welcome 🤗 To ↯ Daxx Chk⚡️ ↯, Let's Check You're CC And Other Stuff. Click On ' /cmds ' To Check My Power # /cmds </code> <code>button</code> /cmds";
        sendVideox($chatId, $videoURLStart, $caption, $keyboard);
    } else {
        reply_tox($chatId,$message_id,$keyboard,"<code>You are not registered, Register first with</code> /register <code> to use me</code>");
    }
}
//=========START END========//
if (preg_match('/^(\/cmds|\.cmds|!cmds)/', $text)) {
  
    $videoUrl = "https://t.me/DartNetc/6"; 

    $keyboard2 = json_encode([
        'inline_keyboard' => [
            [
                ['text' => '𝗚𝗔𝗧𝗘𝗦', 'callback_data' => 'gates'],
                ['text' => '𝗧𝗼𝗼𝗹𝘀', 'callback_data' => 'herr'],
                ['text' => '𝗣𝗿𝗶𝗰𝗲', 'callback_data' => 'price'],
            ],
            [
                ['text' => '𝗙𝗶𝗻𝗮𝗹𝗶𝘇𝗲', 'callback_data' => 'finalize'],
            ],
            [
                ['text' => '𝗢𝗳𝗳𝗶𝗰𝗶𝗮𝗹 𝗚𝗿𝗼𝘂𝗽', 'callback_data' => 'channel'],
            ],
        ]
    ]);

    $caption = "<b> 𝙒𝙘𝙡𝙢  , 𝙏𝙤 𝙎𝙚𝙘𝙧𝙚𝙩 𝘾𝙢𝙙 𝙎𝙚𝙘𝙩𝙞𝙤𝙣 ⛏️ $firstname
    
𝙀𝙭𝙥𝙡𝙤𝙧𝙚 𝙈𝙮 𝙎𝙩𝙪𝙛𝙛 🌏</b>";
    file_get_contents("https://api.telegram.org/bot$botToken/deleteMessage?chat_id=$chatId&message_id=$messageId");

    // Using sendVideo endpoint instead of sendPhoto
    file_get_contents("https://api.telegram.org/bot$botToken/sendVideo?chat_id=$chatId&video=$videoUrl&caption=" . urlencode($caption) . "&parse_mode=HTML&reply_markup=$keyboard2");
}