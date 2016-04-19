<?php
require '../sp.php';

$feed = new SimplePie();
$feed->set_feed_url(array(
'http://rss.cnn.com/rss/edition_world.rss',
	 'http://rss.cnn.com/rss/edition_us.rss',
'http://feeds.bbci.co.uk/news/world/rss.xml',
'http://feeds.bbci.co.uk/news/uk/rss.xml',
'http://feeds.bbci.co.uk/news/rss.xml',
'http://feeds.reuters.com/reuters/topNews',
'http://feeds.reuters.com/Reuters/domesticNews',
'http://feeds.reuters.com/Reuters/worldNews',
'http://www.theguardian.com/uk-news/rss',
'http://www.theguardian.com/world/rss',
'http://feeds.foxnews.com/foxnews/latest?format=xml',
'http://www.forbes.com/real-time/feed2/',
'http://timesofindia.feedsportal.com/c/33039/f/533916/index.rss',
'http://timesofindia.indiatimes.com/rssfeeds/296589292.cms',
'http://www.wsj.com/xml/rss/3_7085.xml',
'http://feeds.nbcnews.com/feeds/topstories',
'http://feeds.abcnews.com/abcnews/internationalheadlines',
'http://feeds.abcnews.com/abcnews/usheadlines'
	
	
));
$feed->init();
 
// default starting item
$start = 0;
 
// default number of items to display. 0 = all
$length =10; 
 
// if single item, set start to item number and length to 1
if(isset($_GET['item']))
{
        $start = $_GET['item'];
        $length = 1;
}
 include("../random-user-agent.php");
 $proxies = array(); // Declaring an array to store the proxy list
 
// Adding list of proxies to the $proxies array
$proxies[] = 'http://www.nullrefer.com/?';  
$proxies[] = 'https://anon.to/?'; 
$proxies[] = 'http://www.redirect.am/?'; 
$proxies[] = 'http://hideref.org/?'; 
$proxies[] = 'http://www.dereferer.com/?'; 
$proxies[] = 'http://www.lolinez.com/?'; 
$proxies[] = 'https://anon.click/';

 
// loop through items
foreach($feed->get_items($start,$length) as $key=>$item)
{
 
    $proxy = $proxies[array_rand($proxies)]; 
     
$url='http://badhub.net/news/' .base64_encode($item->get_permalink());
$title=$item->get_title();
echo ' <iframe src="'.$proxy.'http://pingomatic.com/ping/?title='.str_replace(' ', '+',$title).'&blogurl='.$url.'&rssurl=http://badhub.net/rss.xml&chk_weblogscom=on&chk_blogs=on&chk_feedburner=on&chk_newsgator=on&chk_myyahoo=on&chk_pubsubcom=on&chk_blogdigger=on&chk_weblogalot=on&chk_newsisfree=on&chk_topicexchange=on&chk_google=on&chk_tailrank=on&chk_skygrid=on&chk_collecta=on&chk_superfeedr=on&chk_audioweblogs=on&chk_rubhub=on&chk_a2b=on&chk_blogshares=on" border="0" width="1" height="1"></iframe>';
echo 'ok<br>';
}
?>
