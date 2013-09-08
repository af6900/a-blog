// JavaScript Document	

$(document).ready(function(e) {

		getStatus(0);
	
	
		function getStatus(count){
		$.ajax({
			 type:'GET',
			 url:base_url+"ajaxProcessor/status/index",
			 data:{'count' : count},
			 success: function(data){
				 $('#ulStatus').html(data)

				 }
			});		
		
		}
	
	$('.aCPage').click(function(){
		getStatus($(this).attr('page'));
		
		})

	$('#statusSubmit').click(function(){
		var status = $('#statusInput').val();
		var start = $('#startStatus').val();
		var end = $('#endStatus').val();
		$.ajax({
			 type:'GET',
			 url:base_url+"ajaxProcessor/status/save",
			 data:{'status' : status, 'start' : start, 'end' : end},
			 success: function(data){
				 getStatus(0);
				 $('#statusInput').val('');
				 $('#startStatus').val('');
				 $('#endStatus').val('');
				 }
			});
		})

});