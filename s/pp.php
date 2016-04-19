<?php
require '../sp.php';

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
$length = 1; 
 
// if single item, set start to item number and length to 1
if(isset($_GET['item']))
{
        $start = $_GET['item'];
        $length = 1;
}
// loop through items
foreach($feed->get_items($start,$length) as $key=>$item)
{
 
$myBlogName =$blog_title = $item->get_title() ;
$myBlogUrl = 'http://badhub.net/news/' .base64_encode( $item->get_permalink() );
$myBlogUpdateUrl =  'http://badhub.net/news/' .base64_encode( $item->get_permalink() );
$myBlogRSSFeedUrl = 'http://badhub.net/rss.xml';

// Just and example so you need to put your own list here
// I haven't used many of these for years
// List of Servers to Ping
$xmlRpcPingUrls[] = 'http://rpc.pingomatic.com';
$xmlRpcPingUrls[] = 'http://rpc.weblogs.com/RPC2';
$xmlRpcPingUrls[] = 'http://www.blogpeople.net/servlet/weblogUpdates';
$xmlRpcPingUrls[] = 'http://xping.pubsub.com/ping/';
$xmlRpcPingUrls[] = 'http://ping.blo.gs/';
$xmlRpcPingUrls[] = 'http://blogsearch.google.com/ping/RPC2';
$xmlRpcPingUrls[] = 'http://blog.goo.ne.jp/XMLRPC';


require_once( 'IXR_Library.php' );

function xmlRpcPing( $url ) {
    global $myBlogName, $myBlogUrl, $myBlogUpdateUrl, $myBlogRSSFeedUrl;
    $client = new IXR_Client( $url );
    $client->timeout = 3;
    $client->useragent .= ' -- PingTool/1.0.0';
    $client->debug = false;

    if( $client->query( 'weblogUpdates.extendedPing', $myBlogName, $myBlogUrl, $myBlogUpdateUrl, $myBlogRSSFeedUrl ) )
    {
        return $client->getResponse();
    }

    echo 'Failed extended XML-RPC ping for "' . $url . '": ' . $client->getErrorCode() . '->' . $client->getErrorMessage() . '<br />';

    if( $client->query( 'weblogUpdates.ping', $myBlogName, $myBlogUrl ) )
    {
        return $client->getResponse();
    }

    echo 'Failed basic XML-RPC ping for "' . $url . '": ' . $client->getErrorCode() . '->' . $client->getErrorMessage() . '<br />';

    return false;
}

foreach( $xmlRpcPingUrls as $url )
{
    echo '<h1>XML-RPC pinging ' . $url . '</h1>';
    echo '<pre>';
    print_r( xmlRpcPing( $url ) );
    echo '</pre>';
    ob_flush();
    flush();
}
}
?>
