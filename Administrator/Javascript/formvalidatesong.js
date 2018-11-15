// JavaScript Document
$(document).ready(function(){
	$('.success').hide();
	$('.error').hide();
	$('#button1').click(function(){
		var error = false;
		
		var audio = /^.*(([^\.][\.][wW][mM][aA])|([^\.][\.][mM][pP][3]))$/;
		$('.errors').remove();
		
		if($('#txtdesc').val()==""){
			$('#txtdesc').after('<span class="errors">This field is required</span>');	
			error = true
		}
		if($('#txtsong').val()==""){
			$('#txtsong').after('<span class="errors">This field is required</span>');	
			error = true
		}else if(!audio.test($('#txtsong').val())){
			$('#txtsong').after('<span class="errors">Invalid audio format</span>');	
			error = true
		}
			if(error == false){
				$('.success').slideDown('normal').html('Record added').delay(2000).slideUp('normal');
				return true;
			}else{
				return false;	
			}
	});
});