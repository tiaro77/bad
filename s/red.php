<?php
require '../sp.php';
 echo '<?xml version="1.0" encoding="utf-8"?>

<urlset>';

 
$feed = new SimplePie();
$feed->set_feed_url(array(
	'https://www.reddit.com/r/The_Donald/.rss',
	'https://www.reddit.com/r/AskReddit/.rss',
	'https://www.reddit.com/r/politics/.rss',
	'https://www.reddit.com/r/funny/.rss',
	'https://www.reddit.com/r/videos/.rss',
	'https://www.reddit.com/r/todayilearned/.rss',
	'https://www.reddit.com/r/AdviceAnimals/.rss',
	'https://www.reddit.com/r/nba/.rss',
	'https://www.reddit.com/r/worldnews/.rss',
	'https://www.reddit.com/r/leagueoflegends/.rss',
	'https://www.reddit.com/r/soccer/.rss',
	'https://www.reddit.com/r/gaming/.rss',
	'https://www.reddit.com/r/news/.rss',
	'https://www.reddit.com/r/nfl/.rss',
	'https://www.reddit.com/r/SandersForPresident/.rss',
	'https://www.reddit.com/r/BlackPeopleTwitter/.rss',
	'https://www.reddit.com/r/movies/.rss',
	'https://www.reddit.com/r/television/.rss',
	'https://www.reddit.com/r/sports/.rss',
	
	 
	
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
