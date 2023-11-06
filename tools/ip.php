<?php
if (preg_match('/^(\/ip|\.ip|!ip)/', $text)) {


    $iplist = preg_replace("/[^0-9.]/", "",$message);
    if(empty($iplist)){
      sendMessage($chatId, 'Send IP address',$mes_id);
      exit();
    }
    $array = explode("\n", $iplist);
   

  $gip = file_get_contents('https://scamalytics.com/ip/'.$array[0].'');
      

  
  $msg = trim(strip_tags(getStr($gip,'   <div style="border-bottom: 1px solid #CCCCCC"><b>IP Fraud Risk API</b></div>
        <pre style="margin: 0; text-transform: lowercase;">','</pre>
        <div style="border-top: 1px solid #CCCCCC"><a href="/ip/api/pricing">Click here</a> for details of our <a href="/ip/api/pricing">free usage tier</a>, <a href="/ip/api/pricing">free trial</a>, and <a href="/ip/api/pricing">pricing information</a>.</div>')));

$score = trim(strip_tags(getStr($gip,'"ip":"'.$array[0].'",
  "score":"','",')));
  
  $risk = $country = trim(strip_tags(getStr($gip,'"ip":"'.$array[0].'",
  "score":"'.$score.'",
  "risk":"','"
}')));
  
$country = trim(strip_tags(getStr($gip,'   </tr>
        <tr>
            <th>Country Name</th>','   </tr>
        <tr>')));
  $isp = trim(strip_tags(getStr($gip,'   </tr>
        <tr>
            <th>ISP Name</th>','   </tr>
        <tr>')));

$message = "<b>
[火] IP FraudRisk 🌩
━━━━━━━━━━━━━━
•├IP : <code>$array[0]</code>
•├Score : <code>$score</code>
•├Risk : <code>$risk</code>
•├ISP : <code>$isp</code>
•├Country : <code>$country</code>

•├Req: @$username/<code>[$rank]</code>
━━━━━━━━━━━━━━
•├Dev: <code>@BADDOOR</code>
</b>";

$urlEncodedMessage = urlencode($message);

sendMessage($chatId, $urlEncodedMessage, $mes_id);
}
?>


