$( document ).ready(function() {
	
	/////////testing
	
	
    // Optimalisation: Store the references outside the event handler:
    var $window = $(window);
    //var $pane = $('#pane1');

    function checkWidth() {
        var windowsize = $window.width();
        //if (windowsize > 440) {
            //if the window is greater than 440px wide then turn on jScrollPane..
           // $pane.jScrollPane({
           //    scrollbarWidth:15, 
           //    scrollbarMargin:52
          //  });
       // }
	   $("#topMessage").text(windowsize);
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);

	
/// GLOBAL SETUP ////////////////////////////////////////////

//Hide button
	//$("#continue_to_booking").hide();
	$("#checkAvilForm_Invalid").hide();	
	//$("#topMessage").hide();
	//$('#formMessages').hide();
	//$('#quoteoutput').hide();
	
	
	
	// Get the checkAvilForm.
	var checkAvilForm = $('#checkAvilForm');
	

	// Get the messages div.
	var quoteoutput = $('#quoteoutput');
	var formMessages = $('#formMessages');
	var blank = $('#blank');
	
	/////checkAvilForm - DATE YEAR SETUP /////////////////////////////////////

			var d = new Date(); 
			var d0 = (d.getFullYear() ); 
			var d1 = (d.getFullYear() + 1 ); 
			//var d2 = (d.getFullYear() + 2 ); 
			
			document.getElementById("d0").innerHTML = d0; 
			document.getElementById("d1").innerHTML = d1; 
			
			// checkAvilForm - reset VALAIDATION /////////////////////////////////////
			$("#dayError2, #monthError2, #yearError2").hide();
			$( "#Day, #Month, #Year" ).change(function() {
				//window.alert("Changed");
			 $("#dayDiv, #dayError1, #dayError2, #monthDiv, #monthError1, #monthError2, #yearDiv, #yearError1, #yearError2").removeClass("has-error has-feedback glyphicon glyphicon-exclamation-sign form-control-feedback help-block");
			 $("#dayError2, #monthError2, #yearError2").hide();
			});
			
// checkAvilForm - DATE VALAIDATION /////////////////////////////////////
	//$("#checkAvilForm").change(function() {
	$("#checkAvilForm").submit(function(event) {
	//window.alert("sometext");
	event.stopImmediatePropagation();
	event.preventDefault();
	
	// Stop the browser from submitting the checkAvilForm.
		
	
			if(($("#Day").val() === '-43')){
				
				$("#dayDiv").addClass( "has-error has-feedback" );
				
				$("#dayError2").slideDown();
				
			}
			
			else if($("#Month").val() === '-43'){
				
				$("#monthDiv").addClass( "has-error has-feedback" );
				
				$("#monthError2").slideDown();
			}
			
			else if($("#Year").val() === '-43'){
				
				$("#yearDiv").addClass( "has-error has-feedback" );
				
				$("#yearError2").slideDown();
			}
	
			else {
				//hee
	


		
// checkAvilForm SUBMIT  /////////////////////////////////////

	// Set up an event listener for the checkAvilForm.
	
		
		

		// Serialize the checkAvilForm data.
		var checkAvilFormData = $(checkAvilForm).serialize();
		
		//alert(checkAvilFormData);
		//window.alert("submitting");

		// Submit the checkAvilForm using AJAX.
		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: checkAvilFormData
		})
	
	
			// checkAvilForm RESPONCE  /////////////////////////////////////
		.done(function(response) {
			// Make sure that the formMessages div has the 'success' class.
			

			// Set the message text.
			//$(formMessages).add("Thank you for using our quote system. Below is your quote.");
			$(quoteoutput).html(response);
			
			//alert(response);
			//$('#formMessages').empty();
			// Clear the checkAvilForm.
			//$('#name').val('');
			//$('#email').val('');
			//$('#message').val('');
			
			// Hide the checkAvilForm.
			$("#page1").slideUp();
			//
			//$("#continue_to_booking").slideDown();
			//$("#DJEP").slideDown();
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
		
	

	});
	
// QUOTE-form SUBMIT VALAIDATION /////////////////////////////////////

/*$(form).keyup(function() {
 	if(formError !== true){
         //Remove error
		 $( '#submitError' ).slideUp()  
    }
	});*/
	
	
});