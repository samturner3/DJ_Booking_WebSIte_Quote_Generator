
$(document).ready(function() {
	//SUBURB ERROR
	var formError = false;
	var re = /^([a-zA-Z.-\s])+$/;
	$( ".suburberror" ).hide();
    $('#suburb').on('blur',function () {
	 
    if( this.value === ''){
         //alert('Blur Event - Text box Empty');
		 $( ".suburberror" ).show();
		 $( '#suburbError' ).show().html("Suburb box Empty");
		 formError = true;
		 //Empty error
		 //this.focus();
	}
	
	else if(!re.test(this.value)) { 
	  	//alert('Blur Event - May only contain text');
		$( ".suburberror" ).show();
		$( '#suburbError' ).show().html("Suburb May only contain text");
		formError = true;
		// error
		//this.focus();
   
    }	 
	
	else {
		//Remove error
		$( ".suburberror" ).slideUp();
		$( '#suburbError' ).slideUp();
		formError = false;
	}
         
  
});
$( "#suburb" ).keyup(function() {
 	if( (this.value !== '') && (re.test(this.value))){
         //Remove error
		 formError = false;
		 $( ".suburberror" ).slideUp();
		 $( '#suburbError' ).slideUp();
		 
         
    }
});

	//emial ERROR
	
	var emailreg = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	$( ".emailerror" ).hide();
    $('#email').on('blur',function () {
	 
    if( this.value === ''){
         //alert('Blur Event - Text box Empty');
		 $( ".emailerror" ).show();
		 $( '#emailError' ).show().text(" Email box Empty");
		 //formError = true;
		 //Empty error
		 //this.focus();
	}
	
	else if(!emailreg.test(this.value)) { 
	  	//alert('Blur Event - May only contain text');
		$( ".emailerror" ).show();
		$( '#emailError' ).show().text(" Incorrect email format");
		//formError = true;
		// error
		//this.focus();
   
    }	 
	
	else {
		//Remove error
		$( ".emailerror" ).slideUp();
		$( '#emailError' ).slideUp();
		formError = false;
	}
         
  
});
$( "#email" ).keyup(function() {
 	if( (this.value !== '') && (emailreg.test(this.value))){
         //Remove error
		 formError = false;
		 $( ".emailerror" ).slideUp();
		 $( '#emailError' ).slideUp();
		 
         
    }
});


// Already inclided checkboxes 



$('input[type=radio][name=package]').change(function() {
        if (this.value === 'small') {
            //alert("Small Selected");
			$("input.includedInLarge").removeAttr("disabled");		
			$("input.includedInLarge").prop('checked', false);
			$(".includedInLargePrice").show();
			$(".includedInLargePriceincluded").empty();
        }
        else if (this.value === 'large') {
            //alert("Large selected");
			$("input.includedInLarge").attr("disabled", true);
			$("input.includedInLarge").prop('checked', true);
			$(".includedInLargePrice").hide();
			$(".includedInLargePriceincluded").append('($0) - Included in Package');
        }
		
    });


});