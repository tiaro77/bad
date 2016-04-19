<?php
require '../sp.php';
 
	

echo '<?xml version="1.0" encoding="UTF-8"?><?xml-stylesheet href="http://rssa.at/rssa.xsl" type="text/xsl" media="screen"?>	<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:rssa="http://rssa.at/namespaces/rssa">
	<channel>
	  <title>badhub</title>
		<rssa:link href="http://badhub.net/rss.xml" type="application/rss+xml" />
			  <description></description>
		<language>en-gb</language>
	  <pubDate>'.date(DATE_RFC822).'</pubDate>
		<lastBuildDate>Thu, 01 Jan 1970 00:00:00 GMT</lastBuildDate>';
 
$feed = new SimplePie();
$feed->set_feed_url(array(
	'http://rss.cnn.com/rss/edition_world.rss',
'http://feeds.bbci.co.uk/news/world/rss.xml',
'http://feeds.reuters.com/Reuters/worldNews',
'http://www.theguardian.com/world/rss',
'http://feeds.foxnews.com/foxnews/latest?format=xml',
'http://www.wsj.com/xml/rss/3_7085.xml',
'http://feeds.nbcnews.com/feeds/topstories',
'http://www.latimes.com/world/rss2.0.xml',


	
));
$feed->init();
 
// default starting item
$start = 0;
 
// default number of items to display. 0 = all
$length = 10; 
 
// if single item, set start to item number and length to 1
if(isset($_GET['item']))
{
        $start = $_GET['item'];
        $length = 1;
}
 

 
// loop through items
foreach($feed->get_items($start,$length) as $key=>$item)
{
$result_title = preg_replace('#[^a-zA-Z]+Site Title#', '', $result_title);

echo ' <item><title>' . htmlentities($item->get_title(), ENT_QUOTES) . '</title>
 <link>http://badhub.net/news/' . base64_encode( $item->get_permalink() ) . '</link>
<guid>http://badhub.net/news/' . base64_encode( $item->get_permalink() ) . '</guid>
 <pubDate>'.date(DATE_RFC822).'</pubDate>
<description></description>
 </item>';
   
  
}
  echo '</channel>
	</rss>';
?>
