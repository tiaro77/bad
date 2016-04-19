 <? 
 require '../sp.php';
 require '../nb.inc';

include("../random-user-agent.php");
$url = $_GET["name"];

$nurl ='https://www.reddit.com/r/'. $url  ; 
$rurl = 'https://www.reddit.com/r/'. $url .'/.rss' ; 
function file_get_content($nurl) 
{ 
//inicjujemy curl 
$ch = curl_init(); 

//dodajemy opcje 
curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_URL, $nurl); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
curl_setopt($ch, CURLOPT_USERAGENT,random_user_agent());

$data = curl_exec($ch); 

curl_close($ch); 

return $data; 
} 

//pobieramy zawarto�� ca�ej strony 
$html = file_get_content($nurl); 

//zmienna $html b�dzie zawiera� wczytan� zawarto�� strony 
//niekt�re strony s� zabezpieczone przed takim wczytaniem stron 
//wi�c nie wsz�dzie CURL b�dzie dzia�a� 


$doc = new DOMDocument('1.0', 'utf-8');
@$doc->loadHTML (mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8')); 
$nodes = $doc->getElementsByTagName('title'); 



//pobieramy zawarto�� tag�w 
$title = $nodes->item(0)->nodeValue; 

$metas = $doc->getElementsByTagName('meta'); 

for ($i = 0; $i < $metas->length; $i++) 
{ 
    $meta = $metas->item($i); 
if($meta->getAttribute('property') == 'og:title') 
        $title = $meta->getAttribute('content'); 
    if($meta->getAttribute('name') == 'description') 
        $description = $meta->getAttribute('content'); 
    if($meta->getAttribute('name') == 'keywords') 
        $keywords = $meta->getAttribute('content'); 
if($meta->getAttribute('name') == 'news_keywords') 
        $keywords = $meta->getAttribute('content'); 
 if($meta->getAttribute('property') == 'og:description') 
        $description = $meta->getAttribute('content'); 
     if($meta->getAttribute('property') == 'og:image') 
        $img = $meta->getAttribute('content'); 
} 

//ma�a poprawka kodowania do utf-8 
function convertEncoding($str, $from = 'auto', $to = "UTF-8") { 
    if($from == 'auto') $from = mb_detect_encoding($str); 
    return mb_convert_encoding ($str , $to, $from); 
} 

//celowo wyd�u�am kod aby go �atwiej by�o zrozumie� 
//mo�na zastosowa� echo convert_encoding($title)."<br/>"; 

$title = ($title); 
$description = ($description); ; 
$keywords = ($keywords); ; 



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <html itemscope itemtype="http://schema.org/Article">

<!-- Place this data between the <head> tags of your website -->
<title><? echo $title; ?></title>
<meta name="description" content="<? echo $description; ?>" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<? echo $title; ?>">
<meta itemprop="description" content="<? echo $description; ?>">
<meta itemprop="image" content="<? echo $img; ?>">

<!-- Twitter Card data -->
<meta name="twitter:card" content="<? echo $img; ?>">
<meta name="twitter:site" content="@publisher_handle">
<meta name="twitter:title" content="<? echo $title; ?>">
<meta name="twitter:description" content="<? echo $description; ?>">
<meta name="twitter:creator" content="@author_handle">
<!-- Twitter summary card with large image must be at least 280x150px -->
<meta name="twitter:image:src" content="<? echo $img; ?>">

<!-- Open Graph data -->
<meta property="og:title" content="<? echo $title; ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="http://badhub.net/" />
<meta property="og:image" content="<? echo $img; ?>" />
<meta property="og:description" content="<? echo $description; ?>" />
<meta property="og:site_name" content="BadHub.net" />
<meta property="article:published_time" content="<? echo date('l jS F Y h:i:s A'); ?>" />
<meta property="article:section" content="<? echo $keywords; ?>" />
<meta property="article:tag" content="<? echo $keywords; ?>" />
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
<?php include_once("../analyticstracking.php") ?>
    <div class="container">
      
<? 
 require '../nav.php';
 ?>
<div class="row">


<div class="col-md-8 col-xs-12 col-sm-8 ">

	
<br />
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- badhubramk -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7537772433559519"
     data-ad-slot="9140926806"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script><br />
<div class="well well-sm"><h1><? echo $title; ?></h1>
<? echo $description; ?></div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- badhublink -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7537772433559519"
     data-ad-slot="1805692800"
     data-ad-format="link"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

<!-- /class="col-md-6" -->
<?php echo newsblocks::listi(array($rurl),
array(
							'items' => 20
						)); ?>



 </div>

<div class="col-md-4 mobile-tab hidden-xs hidden-sm mobile-hide">

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- badhubsidee -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-7537772433559519"
     data-ad-slot="9008851207"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php echo newsblocks::vtablingimg(array('https://www.youtube.com/feeds/videos.xml?playlist_id=PLr1-FC1l_JLFcq9r9Y3uFLkH8G37WmMRQ'

), array(
							'items' => 10
						)); ?>
<!-- /class="col-md-4 --></div>


<!-- /row --></div>
      <footer class="footer">
      <hr>
      <? 
 require '../foter.php';
 ?>
      
        
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    
    
    <script id="dsq-count-scr" src="//badhub.disqus.com/count.js" async></script>
    
    
  </body>
</html>
