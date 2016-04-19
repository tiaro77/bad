<?php
require '../sp.php';
 echo '<?xml version="1.0" encoding="utf-8"?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

 
$feed = new SimplePie();
$feed->set_feed_url(array(
	'http://www.news-us.jp/index.rdf',
'http://rss.asahi.com/rss/asahi/newsheadlines.rdf',
'http://rss.asahi.com/rss/asahi/national.rdf',
'http://rss.asahi.com/rss/asahi/sports.rdf',
'http://rss.asahi.com/rss/asahi/international.rdf',
'http://rss.rssad.jp/rss/mainichi/flash.rss',
'http://rss.rssad.jp/rss/mainichi/sports.rss',
'http://rss.rssad.jp/rss/mainichi/enta.rss',
'http://mainichi.jp/rss/etc/opinion.rss',
'http://rss.rssad.jp/rss/iza/kiji/kiji-n.xml',
'http://www.jiji.com/rss/ranking.rdf',
'http://rss.rssad.jp/rss/zakzak/entertainment/entertainment.xml',
'http://rss.rssad.jp/rss/zakzak/all/zakzak-all.xml',
'http://www.huffingtonpost.jp/feeds/verticals/japan/index.xml',
'http://feed.rssad.jp/rss/jcast/index.xml'


	
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

        echo '<url>
    <loc>http://badhub.net/news/' . base64_encode( $item->get_permalink() ) . '</loc>
    <lastmod>' .date(' Y-m-d') . '</lastmod>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>';
        
      
    
}
   echo '</urlset>';
?>
