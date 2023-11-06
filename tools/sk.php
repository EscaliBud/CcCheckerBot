<?php
if ((strpos($message, "/sk") === 0)||(strpos($message, "sk_live_") === 0)||(strpos($message, ".sk") === 0))
{
  if((strpos($message, "/sk") === 0) || (strpos($message, ".sk") === 0))
  {
  $sk = substr($message,4);
  }
  else
  {
    $sk = $message;
  }
  $ch = curl_init();  
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/payment_methods');  
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  
curl_setopt($ch, CURLOPT_USERPWD, $sk. ':' . '');  
curl_setopt($ch, CURLOPT_POSTFIELDS, 'type=card&card[number]=4102770015058552&card[exp_month]=06&card[exp_year]=24&card[cvc]=997');  
$stripe1 = curl_exec($ch); 
if ((strpos($stripe1, 'declined')) || (strpos($stripe1, 'pm_')))
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/balance');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array(
'Authorization: Bearer '.$sk.'',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$stripe = curl_exec($ch);
//echo ($stripe);
$balance = trim(strip_tags(getStr($stripe,' "amount":',',')));

  $pbalance = trim(strip_tags(getStr($stripe,' "pending": [
    {
      "amount": ',',')));
$Currency = trim(strip_tags(getStr($stripe,'"currency": "','",')));
  $livmsg = urlencode("<b>
[↯] 𝗟𝗜𝗩𝗘 𝗦𝗞  ✅

[↯] 𝗞𝗲𝘆 :  <code>$sk</code>

[↯] 𝗕𝗔𝗟𝗔𝗡𝗖𝗘 : $balance 
[↯] 𝗣𝗘𝗡𝗗𝗜𝗡𝗚 𝗕𝗔𝗟𝗔𝗡𝗖𝗘: $pbalance
[↯] 𝗖𝗨𝗥𝗥𝗘𝗡𝗖𝗬 : $Currency 

[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank] </code>
[↯] 𝗕𝗢𝗧 𝗕𝗬 - @BADDOOR </b>
  ");
  sendMessage($chatId,$livmsg,$messageId);

exit;
}
elseif(strpos($stripe1, 'rate_limit'))
{
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/balance');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
$headers = array(
'Authorization: Bearer '.$sk.'',);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$stripe = curl_exec($ch);
$balance = trim(strip_tags(getStr($stripe,' "amount":',',')));
  $pbalance = trim(strip_tags(getStr($stripe,' "pending": [
    {
      "amount": ',',')));
$Currency = trim(strip_tags(getStr($stripe,'"currency": "','",')));
  $livmsg = urlencode("<b>
[↯] 𝗥𝗔𝗧𝗘 𝗟𝗜𝗠𝗜𝗧 𝗦𝗞 ⚠️

[↯] 𝗞𝗲𝘆 :  <code>$sk</code>

[↯] 𝗕𝗔𝗟𝗔𝗡𝗖𝗘 : $balance 
[↯] 𝗣𝗘𝗡𝗗𝗜𝗡𝗚 𝗕𝗔𝗟𝗔𝗡𝗖𝗘 : $pbalance
[↯] 𝗖𝗨𝗥𝗥𝗘𝗡𝗖𝗬 : $Currency 

[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank] </code>
[↯] 𝗕𝗢𝗧 𝗕𝗬 - @BADDOOR </b>
  ");
  sendMessage($chatId,$livmsg,$messageId);

exit;

}
elseif(strpos($stripe1, 'Your account cannot currently make live charges.'))
{
  $skmsg=urlencode("<b>
[↯] 𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

[↯] 𝗞𝗲𝘆:  <code>$sk</code>

[↯] 𝗠𝗲𝘀𝘀𝗮𝗴𝗲 : Your account cannot currently make live charges.

[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank] </code>
[↯] 𝗕𝗢𝗧 𝗕𝗬 - @BADDOOR </b>
");
}
elseif(strpos($stripe1, 'Expired API Key provided'))
{
   $skmsg=urlencode("<b>
[↯] 𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

[↯] 𝗞𝗲𝘆:  <code>$sk</code>

[↯] 𝗠𝗲𝘀𝘀𝗮𝗴𝗲 : Expired API Key provided.

[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank] </code>
[↯] 𝗕𝗢𝗧 𝗕𝗬 - @BADDOOR </b>
");
}
elseif(strpos($stripe1, 'The API key provided does not allow requests from your IP address.'))
{
   $skmsg=urlencode("<b>
[↯] 𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

[↯] 𝗞𝗲𝘆:  <code>$sk</code>

[↯] 𝗠𝗲𝘀𝘀𝗮𝗴𝗲 : The API key provided does not allow requests from your IP address.

[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank] </code>
[↯] 𝗕𝗢𝗧 𝗕𝗬 - @BADDOOR </b>
");
}
else
{
  $skmsg = Getstr($stripe1,'"message": "','"');
  $skmsg=urlencode("<b>
[↯] 𝗗𝗘𝗔𝗗 𝗞𝗘𝗬 ❌

[↯] 𝗞𝗲𝘆:  <code>$sk</code>

[↯] 𝗠𝗲𝘀𝘀𝗮𝗴𝗲 : $skmsg

[↯] 𝗖𝗵𝗲𝗰𝗸𝗲𝗱 𝗕𝘆 ↯ @$username <code>[$rank] </code>
[↯] 𝗕𝗢𝗧 𝗕𝗬 - @BADDOOR </b>
");
}
sendMessage($chatId,$skmsg,$messageId);
}

?>