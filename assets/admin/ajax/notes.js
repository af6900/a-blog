// JavaScript Document	
$(document).ready(function(e) {

		getStatus();
	
		function getStatus(){
		$.ajax({
			 type:'GET',
			 url:base_url+"ajaxProcessor/notes/index",
			 success: function(data){
				 $('#adminNotes').html(data)

				 }
			});		
		
		}

		function save(text){	
			$.ajax({
				 type:'GET',
				 url:base_url+"ajaxProcessor/notes/save",
				 data:{'text' : text},
				 success: function(data){
					 getStatus();
					 }
				});
			
			}
	$('#adminNotes').change(function(){
			var text = $('#adminNotes').val();
			save(text);
		})
//
//	$('#adminNotes').focus(function(){
//			var text = $('#adminNotes').val();
//			save(text);
//		})
//	$('#adminNotes').focusout(function(){
//			var text = $('#adminNotes').val();
//			save(text);
//		})		

});