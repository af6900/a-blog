$(document).ready(function(e) {
    	   $.ajax({
		   type:'GET',
			url:base_url+"ajax/salavat",
			dataType:"json",
			 success: function(data){
				 $('.divSalavat').html(data);
				 
				 }
		 });
		 
		 
		$('#salavat').click(function(){
		 alert('اللَّهُمَّ صَلِّ عَلَى مُحَمَّدٍ وآلِ مُحَمَّدٍ وعَجِّلْ فَرَجَهُمْ');
		 var salavat = 1;
		 $.ajax({
			   type:'GET',
			 	url:base_url+"ajax/salavat",
				data:{'salavat' : salavat},
				dataType:"json",
				 success: function(data){
					 $('.divSalavat').html(data);
					 }
			 });
		 });
});
