<?php
require '../../sp.php';
$wynik .= '<?xml version="1.0" encoding="utf-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

 
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

       $wynik .= '<url>';
   $wynik .= '<loc>http://badhub.net/news/' . base64_encode( $item->get_permalink() ) . '</loc>';
     $wynik .= '<lastmod>' .date(' Y-m-d') . '</lastmod>';
     $wynik .= '<changefreq>daily</changefreq>';
     $wynik .= '<priority>1.0</priority>';
  $wynik .= '</url>';
        
      
    
}
   $wynik .= '</urlset>';
$nazwa = date('dmh') .'us.xml';
file_put_contents($nazwa, $wynik);
echo ' <iframe src="http://pingsitemap.com/?action=submit&url=http://badhub.net/s/s/'.$nazwa.'" border="0" width="1" height="1"></iframe>';
?>
