<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>' . "\n"; ?> 

<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
  <channel>
    <title><![CDATA[<?php echo $Site_Title?>]]></title>
    <link><![CDATA[<?php echo $Site_Url?>]]></link>
    <description><![CDATA[<?php echo $Site_Description?>]]></description>
	<?php foreach($posts as $row){?>
    <item>
      <title><![CDATA[<?php echo strip_tags($row->title);?>]]></title>
      <link><![CDATA[<?php echo site_url('summary'.'/'.$row->id)?>]]></link>
      <description>
        <![CDATA[<?php echo strip_tags($row->summary);?>]]></description>
      <pubDate><?php echo $row->date?></pubDate>
    </item>
    <?php } ?>
  </channel>
</rss>
