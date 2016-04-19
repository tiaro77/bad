


 <? 
 require 'sp.php';
 require 'nb.inc';

include("random-user-agent.php");
$url = $_GET["q"];
$yan = 'https://yandex.com/search/xml?user=tiaro-jaro&key=03.375721299:0b8e853eb747768a752095a363485da1&query='.$url.'&l10n=en&sortby=tm.order%3Dascending&filter=none&groupby=attr%3D%22%22.mode%3Dflat.groups-on-page%3D10.docs-in-group%3D1';
$nurl =  $url; 
$dnurl = mb_convert_case($nurl, MB_CASE_TITLE, "UTF-8");


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <html itemscope itemtype="http://schema.org/Article">

<!-- Place this data between the <head> tags of your website -->
<title><? echo $dnurl; ?> - Badhub</title>
<meta name="description" content="About <? echo $dnurl; ?>. All info <? echo $nurl; ?>" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<? echo $dnurl; ?> Badhub">
<meta itemprop="description" content="About <? echo $dnurl; ?>. All info <? echo $nurl; ?>">
<meta itemprop="image" content="<? echo $img; ?>">

<!-- Twitter Card data -->
<meta name="twitter:card" content="<? echo $img; ?>">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="<? echo $dnurl; ?> Badhub">
<meta name="twitter:description" content="About <? echo $dnurl; ?>. All info <? echo $nurl; ?>">
<meta name="twitter:creator" content="@author_handle">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="<? echo $img; ?>">

<!-- Open Graph data -->
<meta property="og:title" content="<? echo $nurl; ?> information." />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://badhub.net/" />
<meta property="og:image" content="<? echo $img; ?>" />
<meta property="og:description" content="About <? echo $dnurl; ?>. All info <? echo $nurl; ?>" />
<meta property="og:site_name" content="BadHub.net" />
<meta property="article:published_time" content="<? echo date('l jS F Y h:i:s A'); ?>" />
<meta property="article:section" content="<? echo $nurl; ?>" />
<meta property="article:tag" content="<? echo $nurl; ?>" />
<meta property="fb:admins" content="Facebook numberic ID" /> 
    <!-- Bootstrap core CSS -->
    

    <!-- Custom styles for this template -->
    <link href="http://badhub.net/css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://badhub.net/css/goodshare.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
   

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


<div class="col-md-12 col-xs-12 col-sm-12 ">



<div class="row">
  <center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- bbsearch -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:250px"
     data-ad-client="ca-pub-7537772433559519"
     data-ad-slot="9506864401"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></center>
</div>




	
<script>
  (function() {
    var cx = '014629699669466504875:yu2ttszt3ms';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
        '//cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:searchresults-only></gcse:searchresults-only>
<div class="well well-sm">
<? 
echo 'Last search: <ul class="list-inline">';
$tablica = file("key.txt");


for ($i=0; $i<15; $i++)
{
$item = rand(0, sizeof($tablica)-1); 
  echo '<li><a href="http://badhub.net/s.php?q='.$tablica[$item].'"> '.$tablica[$item].'</a></li>';
}
echo '</ul>';
?>
</div>
<?php $tablica = file("link.txt");



$item = rand(0, sizeof($tablica)-1); 
 $tabit = $tablica[$item];

echo newsblocks::listi(array($tabit), array(
							
							'direction' => 'ltr',
							'items' => 10
						));

 ?>
<h1><? echo $nurl; ?></h1>
 </div>

 </div>


      <footer class="footer">
      <hr>
      <? 
 require 'foter.php';
 ?>
      
        
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    
    <script id="dsq-count-scr" src="//badhub.disqus.com/count.js" async></script>
    
    
  </body>
</html>
