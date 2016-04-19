<?

echo '<?xml version="1.0" encoding="UTF-8"?>

<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"

         xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd"

         xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		 foreach(glob('*.xml', GLOB_BRACE) as $file)
  if($file != '.' && $file != '..') {
echo '
   <sitemap>

      <loc>http://badhub.net/s/s/';
    echo $file . '</loc>

      <lastmod>' .date(' Y-m-d') . '</lastmod>

   </sitemap>';
}
echo '</sitemapindex>';
?>
