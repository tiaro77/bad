<?php
require '../sp.php';

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
$url='http://badhub.net/news/' .base64_encode($item->get_permalink());
$title=$item->get_title();
$pingUrl = 'http://pingomatic.com/ping/?title='.str_replace(' ', '+',$title).'&blogurl='.$url.'&rssurl=http://badhub.net/rss.xml&chk_weblogscom=on&chk_blogs=on&chk_feedburner=on&chk_newsgator=on&chk_myyahoo=on&chk_pubsubcom=on&chk_blogdigger=on&chk_weblogalot=on&chk_newsisfree=on&chk_topicexchange=on&chk_google=on&chk_tailrank=on&chk_skygrid=on&chk_collecta=on&chk_superfeedr=on&chk_audioweblogs=on&chk_rubhub=on&chk_a2b=on&chk_blogshares=on';




$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $pingUrl); 
curl_setopt($ch, CURLOPT_HEADER, 1); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, 1); 
curl_setopt($ch, CURLOPT_PROXY, $proxy); 
$data = curl_exec(); 
curl_close($ch); 

echo 'ok';
}
?>
