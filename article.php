 <? 

 require 'sp.php';
 require 'nb.inc';
include("random-user-agent.php");
$url = $_GET["name"];
$nurl = $url; 

function file_get_content($nurl) 
{ 
//inicjujemy curl 
$ch = curl_init(); 

//dodajemy opcje 
curl_setopt($ch, CURLOPT_HEADER, 0); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_ENCODING, 'UTF-8');
curl_setopt($ch, CURLOPT_URL, $nurl); 
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); 
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


$doc = new DOMDocument(); 
@$doc->loadHTML($html); 
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

$title = utf8_decode($title); 
$description = ($description); ; 
$keywords = ($keywords); ; 


 
?>

<!DOCTYPE html>
<html>
  <head>
<? header('Content-Type: text/html; charset=utf-8'); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <html itemscope itemtype="http://schema.org/Article">

<!-- Place this data between the <head> tags of your website -->
<title><? echo $title; ?></title>
<meta name="description" content="<? echo $description; ?>" />

<!-- Schema.org markup for Google+ -->
<meta itemprop="name" content="<? echo$title; ?>">
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
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="css/goodshare.js"></script>
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
#theblogservicesflotads {
height:auto;
width:auto;
background: #333333 url('..');
background-repeat:repeat-x;
text-align:left;
padding-top:4px;
}


</style>



  </head>

  <body>
<?php include_once("analyticstracking.php") ?>

    <div class="container">
      
<? 
 require 'nav.php';
 ?>
<div class="row">
<div class="col-md-2 mobile-tab hidden-xs mobile-hide">

<div id="theblogservicesadsbase">



<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- badhubarticle -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:600px"
     data-ad-client="ca-pub-7537772433559519"
     data-ad-slot="9328959601"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br/>
</div>


<!-- /col-md-2 -->
</div>

<div class="col-md-6 col-xs-8">
<h1><? echo $title; ?></h1>
	<img src="<? echo $img; ?>" width="100%">
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
<? echo $description; ?><br />
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
<center><a href="<? echo $url; ?>" class="btn btn-default btn-xs" role="button">Read more</a></center>
     <small><? echo $keywords; ?></small><br /><br />
<center><div class="goodshare-color">
<ul class="list-inline">
 <li> <a href="#" class="goodshare" data-type="vk">VK</a> </li>
     <li> <a href="#" class="goodshare" data-type="fb">Facebook</a> </li>
     <li> <a href="#" class="goodshare" data-type="tw">Twitter</a> </li>
     <li> <a href="#" class="goodshare" data-type="lj">LiveJournal</a> </li>
      <li><a href="#" class="goodshare" data-type="ok">OK</a> </li>
     <li> <a href="#" class="goodshare" data-type="mr">MR</a> </li>
    <li>  <a href="#" class="goodshare" data-type="gp">Google+</a> </li>
</ul>
<ul class="list-inline">
    <li> <a href="#" class="goodshare" data-type="li">LinkedIn</a> </li>
     <li> <a href="#" class="goodshare" data-type="tm">tumblr</a> </li>
     <li> <a href="#" class="goodshare" data-type="pt">Pinterest</a> </li>
     <li> <a href="#" class="goodshare" data-type="bl">Blogger</a> </li>
      <li><a href="#" class="goodshare" data-type="di">Digg</a> </li>
     <li> <a href="#" class="goodshare" data-type="en">Evernote</a> </li>
     <li> <a href="#" class="goodshare" data-type="yz">YZ</a></li>
</ul>
    </div></center>



	<?php echo newsblocks::listi(array(
							'http://rss.wn.com/English/keyword/photown'
						), array(
							
							'direction' => 'ltr',
							'items' => 10
						)); ?>


<!-- /class="col-md-6" --> </div>

<div class="col-md-4 mobile-tab hidden-xs mobile-hide">

<?php echo newsblocks::breaking(array(
							'https://api.breakingnews.com/api/v1/item/?format=rss'
						), array(
							
							'direction' => 'ltr',
							'items' => 1
						)); ?>

<?php echo newsblocks::tabling('http://www.topix.com/rss/wire/topstories', array(
							'items' => 5
						)); ?>
<!-- /class="col-md-4 --></div>
<!-- /row --></div>
      <footer class="footer">
      <hr>
   <? 
 require 'foter.php';
 ?>
      
        
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
