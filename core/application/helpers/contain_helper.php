<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function open_article(){
	echo "foreach($article as $row):";
	}
	
function close_article(){
	echo "endforeach";
	}
		
function article()
{
     $CI =& get_instance();
	 $article = $CI->model_article->IndexArticleList();
 foreach($article as $row){
	echo "<div class='ContainTitle'><a href='". base_url()."' site/summary/ $row->id'> $row->title</a></div>";
    
    	echo '<div class="ContainTools">';
        echo "<a target='new' href='". base_url()."pdf/output/$row->id' > چاپ </a>|";
 		echo "<a target='new' href='".base_url()."email/send/$row->id' >ارسال</a>";
        echo "<label class='date'>".$row->date."</label>";
        echo "</div>";
        echo "<div class='article'>";
        echo $row->summary ;
        echo "</div>";
        echo "<div style='clear:both;'></div>";
 }
		
}
