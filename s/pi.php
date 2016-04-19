<?php
require '../sp.php';
 
echo '<ol>';
 
$feed = new SimplePie();
$feed->set_feed_url(array(
	'http://rss.cnn.com/rss/edition_world.rss',
	 'http://rss.cnn.com/rss/edition_us.rss',
'http://feeds.bbci.co.uk/news/world/rss.xml',
'http://feeds.bbci.co.uk/news/uk/rss.xml',
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
'http://feeds.abcnews.com/abcnews/usheadlines',
'http://www.latimes.com/local/rss2.0.xml',
'http://www.latimes.com/nation/rss2.0.xml',
'http://www.latimes.com/world/rss2.0.xml',
'http://www.cbsnews.com/latest/rss/us',
'http://www.cbsnews.com/latest/rss/world',
'http://feeds.feedburner.com/time/world?format=xml',
'http://feeds.feedburner.com/timeblogs/swampland?format=xml',
'http://nypost.com/news/feed/',
'http://www.cnbc.com/id/100727362/device/rss/rss.html',
'http://www.cnbc.com/id/15837362/device/rss/rss.html',
'http://www.chron.com/rss/feed/News-270.php',
	
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
 

 
// loop through items
foreach($feed->get_items($start,$length) as $key=>$item)
{
 
     
       
        // display item title and date    
        echo 'http://badhub.net/news/' . base64_encode( $item->get_permalink() ) ;
echo '<br>';
      
       
}

?>
