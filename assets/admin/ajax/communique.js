// JavaScript Document	

$(document).ready(function(e) {

	commu();

	$('#communiqueSubmit').click(function(){
		var communique = $('#inputCommunique').val();
		var startPublic = $('#startPublic').val();
		var endPublic = $('#endPublic').val();
		$.ajax({
			 type:'GET',
			 url:base_url+"ajaxProcessor/communique/save",
			 data:{'communique' : communique, 'start' : startPublic, 'end' : endPublic},
			 success: function(data){
				 if(data == 1){
					commu();	 
					 }
				 
				 }
			});
		})
	

		
	function commu(){
		$.ajax({
			 type:'GET',
			 url:base_url+"ajaxProcessor/communique/index",
			 success: function(data){
				 $('#ulCommunique').html(data)

				 }
			});		
		
		}

});