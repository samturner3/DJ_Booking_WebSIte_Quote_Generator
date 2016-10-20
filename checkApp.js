$(function() {
	
// djep-checkAvil-form - DATE VALAIDATION /////////////////////////////////////
	$("#message").hide();
	$('input[type="submit"]').prop('disabled', true);
	
	$("#djep-checkAvil-form").change(function() {
		if(($("#day").val() === '-43')||($("#month").val() === '-43')||($("#year").val() === '-43')){
				
		}
		else {
			$('input[type="submit"]').prop('disabled', false);
			}	
		}
);

		
// djep-checkAvil-form SUBMIT  /////////////////////////////////////

	// Get the djep-checkAvil-form.
	var djep-checkAvil-form = $('#djep-checkAvil-form');
	//Hide button
	$("#continue_to_booking").hide();
	$("#DJEP").hide();

	// Get the messages div.
	var quoteoutput = $('#quoteoutput');
	var formMessages = $('#form-messages');
	var blank = $('#blank');
	

	// Set up an event listener for the djep-checkAvil-form.
	$(djep-checkAvil-form).submit(function(e) {
		
		
		// Stop the browser from submitting the djep-checkAvil-form.
		e.preventDefault();
		
			// Serialize / valadate the djep-checkAvil-form data.
		if (djep-checkAvil-formError !== true) {

		// Serialize the djep-checkAvil-form data.
		var djep-checkAvil-formData = $(djep-checkAvil-form).serialize();
		
		//alert(djep-checkAvil-formData);

		// Submit the djep-checkAvil-form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(djep-checkAvil-form).attr('action'),
			data: djep-checkAvil-formData
		})
			// djep-checkAvil-form RESPONCE  /////////////////////////////////////
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');

			// Set the message text.
			//$(formMessages).add("Thank you for using our quote system. Below is your quote.");
			$(quoteoutput).html(response);
			
			//alert(response);
			$('#form-messages').empty();
			// Clear the djep-checkAvil-form.
			$('#name').val('');
			$('#email').val('');
			$('#message').val('');
			
			// Hide the djep-checkAvil-form.
			$("#djep-checkAvil-form").slideUp();
			//
			$("#continue_to_booking").slideDown();
			$("#DJEP").slideDown();
		})
		.fail(function(data) {
			// Make sure that the formMessages div has the 'error' class.
			$(formMessages).removeClass('success');
			$(formMessages).addClass('error');

			// Set the message text.
			if (data.responseText !== '') {
				$(formMessages).html(data.responseText);
			} else {
				$(formMessages).text('Oops! An error occured and your message could not be sent.');
			}
		});
		
		}
		
		else {
			//
			$( '#submitError' ).show().html("Errors In Form");
			
		}

	});
	
// QUOTE-form SUBMIT VALAIDATION /////////////////////////////////////

$(form).keyup(function() {
 	if(formError !== true){
         //Remove error
		 $( '#submitError' ).slideUp()  
    }
	});
	
	
	
	
	
});