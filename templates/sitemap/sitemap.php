<?php  echo '<?xml version="1.0" encoding="UTF-8" ?>' . "\n"; ?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
    </url>

    <?php foreach($article as $url) { ?>
    <url>
        <loc><![CDATA[<?php echo site_url('summary'.'/'.str_replace(' ','-',urldecode($url->title)));?>]]></loc>
        <lastmod>2013-09-25</lastmod>
		<changefreq>daily</changefreq>
		<priority>0.5</priority>
    </url>
    <?php } ?>
</urlset>
