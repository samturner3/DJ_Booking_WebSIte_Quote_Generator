

$(function() {


	// Get the form.
	var form = $('#quoteForm');
	//Hide button
	$("#continue_to_booking").hide();
	$("#DJEP").hide();

	// Get the messages div.
	var quoteoutput = $('#quoteoutput');
	var formMessages = $('#form-messages');
	var blank = $('#blank');
	

	// Set up an event listener for the contact form.
	$(form).submit(function(e) {
		
		
		// Stop the browser from submitting the form.
		e.preventDefault();
		
			// Serialize / valadate the form data.
		if (formError !== true) {

		// Serialize the form data.
		var formData = $(form).serialize();
		
		//alert(formData);

		// Submit the form using AJAX.
		$.ajax({
			type: 'POST',
			url: $(form).attr('action'),
			data: formData
		})
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			
			$(formMessages).removeClass('error');
			$(formMessages).addClass('success');

			// Set the message text.
			//$(formMessages).add("Thank you for using our quote system. Below is your quote.");
			$(quoteoutput).html(response);
			
			//alert(response);
			//$('#form-messages').empty();
			// Clear the form.
			$('#name').val('');
			$('#email').val('');
			$('#message').val('');
			
			
			
			// Hide the form.
			$("#form-quote").slideUp();
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
	
	$(form).keyup(function() {
 	if(formError !== true){
         //Remove error
		 $( '#submitError' ).slideUp()
		 
         
    }
	});
	
	
$('#check_availability').click(function(){
 alert("Button Clicked");
 $( '#dateCheck' ).slideDown()
            $.ajax({
                type: 'POST',
                url: 'DJEPForm.php',
				
                success: function(data) {
                    //alert(data);
                    $("#DJEP").html(data);

                }
            });
   });



 $('#continue_to_booking').click(function(){
 alert("Button Clicked");
            $.ajax({
                type: 'POST',
                url: 'DJEPForm.php',
				
                success: function(data) {
                    //alert(data);
                    $("#DJEP").html(data);

                }
            });
   });

	
	
});