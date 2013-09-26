$(document).ready(function(e) {$('.like .glyphicon-plus-sign').click(function(){var id = $('.articleId').val(); $.ajax({type:'GET',url:base_url+"ajax/like",data:{'id' : id , 'action' : 'plus'},dataType:"json",success: function(data){$('.count').html(data);}});});$('.like .glyphicon-minus-sign').click(function(){var id = $('.articleId').val(); $.ajax({type:'GET',url:base_url+"ajax/like",data:{'id' : id , 'action' : 'minus'},dataType:"json",success: function(data){$('.count').html(data);}});})});
		
		 
		
			   
			 	
				
				
				 
					 
					 
			 
	
	
	
	
	
	
