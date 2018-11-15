// JavaScript Document
$(document).ready(function(){
	$('.sucess').hide();
	$('.error').hide();
	$('#sub').click(function(){
	
	var error = false;
	$('.errors')  = remove();
	var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
	 
		var insert  = $('#feedback').serialize();
		
		if($('#fname').val() == ""){
			$('#fname').after('<span class="errors">Required</span>');
			error = true;
		}
		
		if(error == false){
			$.ajax({
					type: 'POST',
					url:  'Feedback.php',
					data: insert,
					cache: false,
					success:function(){
						$('.success').show(600).html('<p>Success</p>');	
					}
				})
		}else{
			return false;
		}
	});
});