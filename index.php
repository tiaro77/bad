<? 
 require 'sp.php';
 require 'nb.inc';?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <html itemscope itemtype="http://schema.org/Article">

<!-- Place this data between the <head> tags of your website -->
<title>Badhub</title>
<meta name="description" content="Big portal. All in one!" />
<meta name="propeller" content="02ae26af5415d0eac03f58af6f4e43b2" />
<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="Badhub">
<meta itemprop="description" content="Big portal. All in one!">
<meta itemprop="image" content="http://badhub.net/evil.png">

<!-- Twitter Card data -->
<meta name="twitter:card" content="http://badhub.net/evil.png">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="Badhub">
<meta name="twitter:description" content="Big portal. All in one!">
<meta name="twitter:creator" content="@author_handle">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="http://badhub.net/evil.png">

<!-- Open Graph data -->
<meta property="og:title" content="Badhub" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://badhub.net/" />
<meta property="og:image" content="http://badhub.net/evil.png" />
<meta property="og:description" content="Big portal. All in one!" />
<meta property="og:site_name" content="BadHub.net" />
<meta property="article:published_time" content="<? echo date('l jS F Y h:i:s A'); ?>" />
<meta property="article:section" content="news, video" />
<meta property="article:tag" content="news, video" />
<meta property="fb:admins" content="Facebook numberic ID" /> 
    <!-- Bootstrap core CSS -->
    

    <!-- Custom styles for this template -->
    <link href="http://badhub.net/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://badhub.net/css/goodshare.js"></script>
  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>
<?php include_once("analyticstracking.php") ?>
    <div class="container">
 <? 
 require 'nav.php';
 ?>


<div class="row">
        <div class="col-md-8">
 <?php echo newsblocks::slider(array(
							'http://www.latimes.com/world/rss2.0.xml'
						), array(
							
							'direction' => 'ltr',
							'items' => 1
						)); ?>

<?php echo newsblocks::breaking(array(
							'https://api.breakingnews.com/api/v1/item/?format=rss'
						), array(
							
							'direction' => 'ltr',
							'items' => 1
						)); ?>

<div class="row">
            <div class="col-md-6"><?php echo newsblocks::tablingimg(array(
'http://rss.cnn.com/rss/edition.rss',
'http://rss.cnn.com/rss/edition_world.rss',
'http://www.huffingtonpost.com/feeds/verticals/world/index.xml'

), array(
							'items' => 5
						)); ?></div>
            <div class="col-md-6"><?php echo newsblocks::lis(array(
							'http://rss.cnn.com/rss/edition_world.rss',
	 'http://rss.cnn.com/rss/edition_us.rss',
'http://feeds.bbci.co.uk/news/world/rss.xml',
'http://feeds.nbcnews.com/feeds/topstories',
'http://feeds.abcnews.com/abcnews/internationalheadlines'
						), array(
							
							'direction' => 'ltr',
							'items' => 8
						)); ?></div>
          </div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title"><a href="http://badhub.net/video">Video</a></h3>
  </div>
  <div class="panel-body">
         
<?php echo newsblocks::vlistimg(array('https://www.youtube.com/feeds/videos.xml?playlist_id=PL3ZQ5CpNulQldOL3T8g8k1mgWWysJfE9w'),
array(
							'items' => 9
						)); ?>
</div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><a href="http://badhub.net/r/worldnews/">Reddit WorldNews</a></h3> 
  </div>
  <div class="panel-body">
         
<?php echo newsblocks::lis(array('https://www.reddit.com/r/worldnews/.rss'),
array(
							'items' => 5
						)); ?>
<ul class="list-inline">
<li><a href="http://badhub.net/r/AskReddit/">AskReddit</a> </li>
<li><a href="http://badhub.net/r/funny/">funny</a> </li>
<li> <a href="http://badhub.net/r/todayilearned/">todayilearned</a>  </li>
<li><a href="http://badhub.net/r/pics/">pics</a>  </li>
<li> <a href="http://badhub.net/r/science/">science</a></li>
<li><a href="http://badhub.net/r/IAmA/">IAmA</a> </li>
<li><a href="http://badhub.net/r/videos/">videos</a> </li>
<li><a href="http://badhub.net/r/gaming/">gaming</a> </li>
<li> <a href="http://badhub.net/r/movies/">movies</a>  </li>
<li><a href="http://badhub.net/r/Music/">Music</a>  </li>
<li> <a href="http://badhub.net/r/aww/">aww</a></li>
<li><a href="http://badhub.net/r/news/">news</a> </li>
</ul>

</div>

</div>

          
        </div>
        <div class="col-md-4">

  <div class="panel-body"><?php echo newsblocks::listi(array('http://rss.cnn.com/rss/edition.rss',
							'http://www.cbsnews.com/latest/rss/main',
							'http://feeds.abcnews.com/abcnews/topstories'), array(
							'items' => 5
						)); ?>


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Sports</h3>
  </div>
  <div class="panel-body">
<?php echo newsblocks::lis(array(
							'http://www.topix.com/rss/sports'
						), array(
							
							'direction' => 'ltr',
							'items' => 5
						)); ?>
       </div> </div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entertainment</h3>
  </div>
  <div class="panel-body">
<?php echo newsblocks::lis(array(
							'http://rssfeeds.topix.com/topix-entertainment?format=xml'
						), array(
							
							'direction' => 'ltr',
							'items' => 5
						)); ?>
       </div> </div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Business</h3>
  </div>
  <div class="panel-body">
<?php echo newsblocks::lis(array(
							'http://www.topix.com/rss/business'
						), array(
							
							'direction' => 'ltr',
							'items' => 5
						)); ?>
       </div> </div>


</div>
      </div>
</div>
 <div class="row">
<div class="col-md-4">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Technology</h3>
  </div>
  <div class="panel-body">
<?php echo newsblocks::lis(array(
							'http://www.topix.com/rss/tech'
						), array(
							
							'direction' => 'ltr',
							'items' => 5
						)); ?>
       </div> </div>


 </div>

<div class="col-md-4">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Game</h3>
  </div>
  <div class="panel-body">
<?php echo newsblocks::lis(array(
							'http://www.gamespot.com/feeds/news/',
'https://www.gameinformer.com/b/mainfeed.aspx?Tags=news',
'http://www.gamesradar.com/all-platforms/news/rss/'
						), array(
							
							'direction' => 'ltr',
							'items' => 5
						)); ?>
       </div> </div>


 </div>
<div class="col-md-4">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Weird</h3>
  </div>
  <div class="panel-body">
<?php echo newsblocks::lis(array(
							'http://rss.cnn.com/rss/edition.rss',
							'http://www.cbsnews.com/latest/rss/main',
							'http://feeds.abcnews.com/abcnews/topstories'
							
						), array(
							
							'direction' => 'ltr',
							'items' => 5
						)); ?>
       </div> </div>


 </div>


</div>








      <footer class="footer">
      <hr>
   <? 
 require 'foter.php';
 ?>
      
        
      </footer>

    </div> <!-- /container -->




  </body>
</html>
