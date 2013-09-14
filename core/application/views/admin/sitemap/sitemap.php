<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>' . "\n"; ?> 
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.0</priority>
    </url>

    <?php foreach($article as $url) { ?>
    <url>
        <loc><?php echo site_url('summary').'/'.$url->id?></loc>
        <priority>0.5</priority>
    </url>
    <?php } ?>
</urlset>