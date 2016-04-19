<?php
require '../sp.php';
// 'http://www.spiegel.de/schlagzeilen/index.rss',
// 'http://www.spiegel.de/index.rss',
//'http://rss2.focus.de/c/32191/f/443312/index.rss'
$feed = new SimplePie();
$feed->set_feed_url(array(
	'http://www.bild.de/rssfeeds/vw-home/vw-home-16725562,sort=1,view=rss2.bild.xml'

	
	
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
$proxies[] = 'https://www.filterbypass.me/s.php?k=';  
$proxies[] = 'http://proxy-free-web.net/index.php?q='; 
$proxies[] = 'http://web-proxy.party/index.php?q='; 
$proxies[] = 'http://bestfreeproxy.gq/browse.php?u='; 
$proxies[] = 'http://freedoomart.com/index.php?q='; 
$proxies[] = 'http://gowebsurf.gq/index.php?q='; 
$proxies[] = 'http://2015-2015.net/index.php?q=';
$proxies[] = 'http://x-proxy.gq/index.php?q=';
$proxies[] = 'http://unblockit.webcam/index.php?q=';
$proxies[] = 'http://fast-proxy-server.gq/index.php?q=';
$proxies[] = 'http://proxyfree.space/b.php?u=';
$proxies[] = 'http://b2bproxy.cf/browse.php?u=';
 
// loop through items
foreach($feed->get_items($start,$length) as $key=>$item)
{
 
    $proxy = $proxies[array_rand($proxies)]; 
     
$url='http://badhub.net/news/' .base64_encode($item->get_permalink());
$title=$item->get_title();
file_get_contents("http://pingomatic.com/ping/?title='.str_replace(' ', '+',$title).'&blogurl='.$url.'&rssurl=http://badhub.net/rss.xml&chk_weblogscom=on&chk_blogs=on&chk_feedburner=on&chk_newsgator=on&chk_myyahoo=on&chk_pubsubcom=on&chk_blogdigger=on&chk_weblogalot=on&chk_newsisfree=on&chk_topicexchange=on&chk_google=on&chk_tailrank=on&chk_skygrid=on&chk_collecta=on&chk_superfeedr=on&chk_audioweblogs=on&chk_rubhub=on&chk_a2b=on&chk_blogshares=on");
echo 'ok<br>';
}
?>
