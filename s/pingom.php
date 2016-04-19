<?php
require '../sp.php';
function blogPing($blogUrl,$blogName,$pingUrl) {
    //xml
    $xmlRequest ='<?xml version="1.0"?>'."n";
    $xmlRequest.='<methodCall>'."n";
    $xmlRequest.='<methodName>weblogUpdates.ping</methodName>'."n";
    $xmlRequest.='<params>'."n";
    $xmlRequest.='<param><value><string>'.htmlspecialchars($blogName).'</string></value></param>'."n";
    $xmlRequest.='<param><value><string>' . htmlspecialchars($blogUrl) . '</string></value></param>'."n";
    $xmlRequest.='</params>'."n";
    $xmlRequest.='</methodCall>';    
    //curl kald
    $cPing = curl_init(); //start curl
    //curl options
    curl_setopt($cPing,CURLOPT_URL,$pingUrl); 
    curl_setopt($cPing,CURLOPT_RETURNTRANSFER,1); 
    curl_setopt($cPing,CURLOPT_HTTPHEADER,array('Content-Type: text/xml'));
    curl_setopt($cPing, CURLOPT_POST,1);
    curl_setopt($cPing,CURLOPT_POSTFIELDS,$xmlRequest);
    curl_setopt($cPing, CURLOPT_TIMEOUT, 20);
    $responseContent =  curl_exec($cPing); //udfør kald
    $responseCode = curl_getinfo($cPing); //hent header info
    curl_close($cPing); //luk curl
    preg_match('#<name>message</name>s*<value>(s*<string>)?([^</]*)(</string>s*)?</value>#i', $responseContent, $msg);
    preg_match('#<name>flerror</name>s*<value>(s*<boolean>)?([^</]*)(</boolean>s*)?</value>#i', $responseContent, $msg2);
    if ($responseCode['http_code']!=200) {
        return '<span style="color:red"><strong>FEJL:</strong> kunne ikke kontaktes</span><br />';
    } elseif($msg2[2]==1) {
        return '<span style="color:red"><strong>Der opstod en fejl:</strong> '.$msg[2].'</span><br />'; 
    } else {
        return ' - PING OK<br/>';
    }

   
}
$feed = new SimplePie();
$feed->set_feed_url(array(
	'http://fakty.interia.pl/feed'
	
	
));
$feed->init();
 
// default starting item
$start = 0;
 
// default number of items to display. 0 = all
$length = 0; 
 
// if single item, set start to item number and length to 1
if(isset($_GET['item']))
{
        $start = $_GET['item'];
        $length = 1;
}
 include("../random-user-agent.php");
 $proxies = array(); // Declaring an array to store the proxy list
 
// Adding list of proxies to the $proxies array
$proxies[] = '160.16.219.35:8081';  
$proxies[] = '213.85.92.10:80'; 
$proxies[] = '213.217.99.111:3128'; 
$proxies[] = '89.31.83.98:80'; 
$proxies[] = '31.129.18.81:80'; 
$proxies[] = '77.163.213.195:80'; 
$proxies[] = '139.255.39.147:8080';
$proxies[] = '177.92.63.255:3128';
$proxies[] = '185.26.183.74:443';
$proxies[] = '138.201.0.109:3128';
$proxies[] = '158.69.217.163:3128';
$proxies[] = '107.167.111.36:80';
 
// loop through items
foreach($feed->get_items($start,$length) as $key=>$item)
{
 
   
      



if (isset($proxies)) {  // If the $proxies array contains items, then
    $proxy = $proxies[array_rand($proxies)];    // Select a random proxy from the array and assign to $proxy variable
}
$blogUrl='http://badhub.net/news/' .base64_encode($item->get_permalink());
$blogName=$item->get_title();
$pingUrl = 'http://rpc.pingomatic.com';
blogPing($blogUrl,$blogName,$pingUrl);

}
?>
