<?php

# Use the Curl extension to query Google and get back a page of results
$url = "http://redditmetrics.com/top/offset/6000";
$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$html = curl_exec($ch);
curl_close($ch);

# Create a DOM parser object
$dom = new DOMDocument();

# Parse the HTML from Google.
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
@$dom->loadHTML($html);

# Iterate over all the <a> tags
foreach($dom->getElementsByTagName('a') as $link) {
        # Show the <a href>
        echo"<url>
    <loc>http://badhub.net";
        echo $link->getAttribute('href');
        echo "</loc>
    <lastmod>2016-03-15</lastmod>
    <changefreq>hourly</changefreq>
    <priority>1.0</priority>
  </url>";
        
}
?>
