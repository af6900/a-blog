<?php  echo '<?xml version="1.0" encoding="' . $encoding . '"?>' . "\n"; ?> 

<rss xmlns:atom="http://www.w3.org/2005/Atom" version="2.0">
  <channel>
    <title><![CDATA[<?php echo $Site_Title?>]]></title>
    <link><![CDATA[<?php echo $Site_Url?>]]></link>
    <description><![CDATA[<?php echo $Site_Description?>]]></description>
	<? foreach($posts as $row):?>
    <item>
      <title><![CDATA[<?=$row->title?>]]></title>
      <link><![CDATA[<?=base_url().'site/summary/'.$row->id?>]]></link>
      <description>
        <![CDATA[<?=$row->summary?>]]></description>
      <pubDate><?=$row->date?></pubDate>
    </item>
    <? endforeach ?>
  </channel>
</rss>
