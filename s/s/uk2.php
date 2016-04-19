<?php
require '../../sp.php';
$wynik .= '<?xml version="1.0" encoding="utf-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

 
$feed = new SimplePie();
$feed->set_feed_url(array(
'http://www.thetimes.co.uk/tto/news/world/middleeast/rss',
'http://www.thetimes.co.uk/tto/news/world/americas/rss',
'http://www.thetimes.co.uk/tto/environment/rss',
'http://www.thetimes.co.uk/tto/faith/rss',
'http://www.thetimes.co.uk/tto/faith/articles-of-faith/rss',
'http://www.thetimes.co.uk/tto/news/politics/rss',
'http://www.thetimes.co.uk/tto/news/politics/sketch/rss',
'http://www.thetimes.co.uk/tto/education/rss',
'http://www.thetimes.co.uk/tto/science/rss',
'http://www.thetimes.co.uk/tto/health/rss',
'http://www.thetimes.co.uk/tto/technology/rss',
'http://www.thetimes.co.uk/tto/technology/gadgets/rss',
'http://www.thetimes.co.uk/tto/technology/games/rss',
'http://www.thetimes.co.uk/tto/technology/internet/rss',
'http://www.thetimes.co.uk/tto/sport/rss',
'http://www.thetimes.co.uk/tto/sport/football/rss',
'http://www.thetimes.co.uk/tto/sport/football/premierleague/rss',
'http://www.thetimes.co.uk/tto/sport/football/scotland/rss',
'http://www.thetimes.co.uk/tto/sport/olympics/rss',
'http://www.thetimes.co.uk/tto/sport/rugbyleague/rss',
'http://www.thetimes.co.uk/tto/sport/rugbyunion/rss',
'http://www.thetimes.co.uk/tto/sport/cricket/rss'
	
	
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
$nazwa = date('dmh') .'uk2.xml';
file_put_contents($nazwa, $wynik);
echo ' <iframe src="http://pingsitemap.com/?action=submit&url=http://badhub.net/s/s/'.$nazwa.'" border="0" width="1" height="1"></iframe>';
?>
