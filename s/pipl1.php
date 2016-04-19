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
 
     $blog_title = $item->get_title() ;
$blog_url =  'http://badhub.net/news/' .base64_encode( $item->get_permalink() ) ;
       
      



if (isset($proxies)) {  // If the $proxies array contains items, then
    $proxy = $proxies[array_rand($proxies)];    // Select a random proxy from the array and assign to $proxy variable
}

       
}

?>
