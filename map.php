<?php

/// Travel Fee Distances
$Charge0KM = 10;
$Charge1KM = 20;
$Charge2KM = 30;
$Charge3KM = 40;
$Charge4KM = 50;
$Charge5KM = 60;
$Charge6KM = 70;
$Charge7KM = 80;

/// Travel Fee Charges
$Charge1 = 10;
$Charge2 = 20;
$Charge3 = 30;
$Charge4 = 40;
$Charge5 = 50;
$Charge6 = 65;
$Charge7 = 85;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and + whitespace.
        $suburb = strip_tags(trim($_POST["suburb"]));
		$suburb = str_replace(array("\r","\n", " "),array("+","+","+"),$suburb);
 

        // Check that data was sent to the mailer.
        if ( empty($suburb) ) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission (bad request). Please complete the form and try again.";
            exit;
        }
		
		

       //MainCode
	   
	   

        // Send the email.
        
            // Set a 200 (okay) response code.
            http_response_code(200);
       

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission Not a POST request, please try again.";
    }



$url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=Maroubra+NSW+Australia&destinations=$suburb+NSW+Australia&mode=driving&language=en-EN";
 
$data = @file_get_contents($url);
 
$result = json_decode($data, true);
 
foreach($result['rows'] as $distance) {
	$km = $distance['elements'][0]['distance']['text'];
	$km = trim($km," km");
}

echo "Your Distance is: " . $km . " km";

if ($km <= $Charge0KM) {
	echo "No Charge!";
}
else if (($km > $Charge0KM) && ($km <= $Charge1KM )){
	echo "Travel fee: $" . $Charge1 . ".";
}
else if (($km > $Charge1KM) && ($km <= $Charge2KM )){
	echo "Travel fee: $" . $Charge2 . ".";
}
else if (($km > $Charge2KM) && ($km <= $Charge3KM )){
	echo "Travel fee: $" . $Charge3 . ".";
}
else if (($km > $Charge3KM) && ($km <= $Charge4KM )){
	echo "Travel fee: $" . $Charge4 . ".";
}
else if (($km > $Charge4KM) && ($km <= $Charge5KM )){
	echo "Travel fee: $" . $Charge5 . ".";
}
else if (($km > $Charge5KM) && ($km <= $Charge6KM )){
	echo "Travel fee: $" . $Charge6 . ".";
}
else if (($km > $Charge6KM) && ($km <= $Charge7KM )){
	echo "Travel fee: $" . $Charge7 . ".";
}
else if ($km > $Charge7KM) {
	echo "Too Far!";
}








?>