$(document).ready(function(){
	//Hide Error and Succes div					   
	$('.error').hide();	
	$('.success').hide();
	$('#button1').click(function(){							
		var error = false;
		$('.errors').remove();
		//Set variable to store all the data in form using serialize
		//var insert = $('#form').serialize();
		
		//Filter valid image extension
		var image1 =/(\.jpg|\.gif|\.png|\.JPG|\.GIF|\.PNG|\.jpeg|\.JPEG)$/;
		
		if($("#txtcat").val() == "CATEGORY"){
			$("#txtcat").after('<span class="errors">Please select a category</span>');	
			error = true;
		}
		if($("#txtdesc").val() == ""){
			$("#txtdesc").after('<span class="errors">This field is required</span>');	
			error = true;
		}
		if($('#txtsinger').val() == ""){
			$("#txtsinger").after('<span class="errors">This field is required</span>');	
			error = true;	
		}
		if($('#txtalbum').val() == ""){
			$("#txtalbum").after('<span class="errors">This field is required</span>');	
			error = true;	
		}
		if($('#txtwriter').val() == ""){
			$("#txtwriter").after('<span class="errors">This field is required</span>');	
			error = true;	
		}
		if($('#txtimage').val() == ""){
			$('#txtimage').after('<span class="errors">This field is required</span>');	
			error = true;
		}else if(!image1.test($('#txtimage').val())){
			$('#txtimage').after('<span class="errors">Invalid image format</span>');	
			error = true;
		}
			if(error == false){	
				$('.success').slideDown('normal').html('Record added').delay(2000).slideUp('normal');
				return true;
			}else{		
				return false;
			}		
	});
});