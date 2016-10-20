<link rel="stylesheet" href="styles/bootstrap.min.css">
<link rel="stylesheet" href="styles/bootstrap-theme.min.css">
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
<script type="text/JavaScript" src="js/formValidate.js"></script>

<style type="text/css">
    .form_quote_contain{
    	margin: 20px;
	}
	/* centered columns styles */
.row-centered {
    text-align:center;
}
.col-centered {
    display:inline-block;
    float:none;
    /* reset the text-align */
    text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
	
}
.light_line {
	border-radius: 11px 11px 11px 11px;
-moz-border-radius: 11px 11px 11px 11px;
-webkit-border-radius: 11px 11px 11px 11px;
border: 2px solid #d77733;
padding:5px;
margin-top:10px;
overflow:hidden;
	
}

table {
    width: 100%;
	
}

th {
    height: 50px;
	background-color: green;
    color: white;
}

td {
    padding: 15px;
}

table, th, td {
   border: 1px solid black;
}

</style>

<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');


// Quote Settings

include_once 'quoteGeneratorSettings.php';

date_default_timezone_set('Australia/Sydney');

$date=date('d/m/y H:i:s');

// END SETTINGS

//decelrations
$Glow_Sticks = 0;
$Strobe = 0;
$Uplights = 0;
$Lasers = 0;

$addonsString = NULL;


//Session

session_start();


//END DECELRATIONS
function manualQuote($manualReason) {

	echo ('Unfortunately we cannot provide you with an instant quote for your event because ' . $manualReason .'. However we are able to manually look at your event and email you an accruate quote! If you would like a quote for this event, please press the button below. We will get back to you with a quote shortly. ');
	exit;
}

//if ($Lasers == 1) echo ('SHOULD NOT BE TRUE BUT IS?');


$quoteOutput = array();
$itemAddons = array();

// BEGIN Get form data ///////////////////////////////////////////////////////////////

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and deal with whitespace.
	
        $suburb = strip_tags(trim($_POST["suburb"]));
		setcookie("suburb", $suburb);
		$suburb = str_replace(array("\r","\n", " "),array("+","+","+"),$suburb);
		
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		
		//Get times 
		
		
		$startTime = date_create($_POST["req_start_time"]);
		$endTime = date_create($_POST["req_end_time"]);
		
		
		//Get package selection
		if ($_POST["package"] === 'small') $package='Small';
		else if ($_POST["package"] === 'large') $package='Large';
		else {http_response_code(400);
            echo "Oops! There was a problem with your submission (package not equal to small or large).";
            exit;}
		
		//echo ('Package selected: ' . $package);
		
		//Get Addons
					
			$selectedAddOns = array();
			
			if ( !empty($_POST['ItemAddons'])) {		
			for ($row = 0; $row < $numberOfAddons; $row++) {
		    $key = array_search($addonsArray[$row][0], $_POST['ItemAddons']);
			if ($key !== false){
			$selectedAddOns[$_POST['ItemAddons'][$key]] = $addonsArray[$row][1];
			}		
		}
		};
		
		if ( !empty($_POST['KaraokeAddons'])) {		
			for ($row = 0; $row < $numberOfKaraoke; $row++) {
		    $key = array_search($karaokeArray[$row][0], $_POST['KaraokeAddons']);
			if ($key !== false){
			$selectedAddOns[$_POST['KaraokeAddons'][$key]] = $karaokeArray[$row][1];
			}		
			
		}
		};
		
		//Put addons in string for database
		
	if (!empty($selectedAddOns)){
		foreach($selectedAddOns as $name => $cost) {
    
			$addonsString = $addonsString . $name. " (" . $cost . "), ";
	
		}
		$addonsString = substr($addonsString, 0, -2);
		}
		
		
		
	/*	//DeBug^
		echo "<br><br><br>";
		echo "<h2>selectedAddOns</h2>";
		echo "<br>";
		foreach($selectedAddOns as $x => $x_value) {
		echo "Key= " . $x . ", Value= " . $x_value;
		echo "<br>";
	}
		echo "<br><br><br>";*/
			

		
		//if ($_POST["ItemAddons"] === 'Glow Sticks') $Glow_Sticks = 1;
		//if ($_POST["ItemAddons"] === 'Strobe') $Strobe = 1;
		//if ($_POST["ItemAddons"] === 'Uplights') $Uplights = 1;
		//if ($_POST["ItemAddons"] === 'Lasers') $Lasers = 1;
				
	/*	$ItemAddons = $_POST['ItemAddons'];
		
		  if(empty($ItemAddons)) 
		  {
			echo("You didn't select any addons.");
		  } 
		  else
		  {
			$N = count($ItemAddons);
		 
			echo("You selected $N addons(s): ");
			for($i=0; $i < $N; $i++)
			{
			  echo($ItemAddons[$i] . " ");
			}
		  }*/
		///// END GET DATA ///////////////////////////////////////////////
        // BEGIN Check data valid. ///////////////////////////////////////
        if ( empty($suburb) ) {
            // Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo "Oops! There was a problem with your submission (bad request). Please complete the form and try again.";
            exit;
        }
		
		
////END CHECK DATA VALID

//IF VALID:


//MainCode

// Begain Processing//////////////////

//Get travel distance & charge

$url = "http://maps.googleapis.com/maps/api/distancematrix/json?origins=Maroubra+NSW+Australia&destinations=$suburb+NSW+Australia&mode=driving&language=en-EN";
 
$data = @file_get_contents($url);
 
$result = json_decode($data, true);
 
foreach($result['rows'] as $distance) {
	$km = $distance['elements'][0]['distance']['text'];
	$km = trim($km," km");
}

if (empty($result['rows'])) {
	// Google server down
	
	
}

$quoteOutput['Travel KM'] = $km;


$quoteOutput['Suburb'] = str_replace("+"," ",$suburb);

//echo "Your Distance to ".$suburb." is: " . $km . " km. ";

if ($km <= $Charge1KM) {
	//echo "No Charge!";
	$travelFee = 0;
}
else if (($km > $Charge0KM) && ($km <= $Charge1KM )){
	//echo "Travel fee: $" . $Charge1 . ".";
	$travelFee = $Charge1;
}
else if (($km > $Charge1KM) && ($km <= $Charge2KM )){
	//echo "Travel fee: $" . $Charge2 . ".";
	$travelFee = $Charge2;
}
else if (($km > $Charge2KM) && ($km <= $Charge3KM )){
	//echo "Travel fee: $" . $Charge3 . ".";
	$travelFee = $Charge3;
}
else if (($km > $Charge3KM) && ($km <= $Charge4KM )){
	//echo "Travel fee: $" . $Charge4 . ".";
	$travelFee = $Charge4;
}
else if (($km > $Charge4KM) && ($km <= $Charge5KM )){
	//echo "Travel fee: $" . $Charge5 . ".";
	$travelFee = $Charge5;
}
else if (($km > $Charge5KM) && ($km <= $Charge6KM )){
	//echo "Travel fee: $" . $Charge6 . ".";
	$travelFee = $Charge6;
}
else if (($km > $Charge6KM) && ($km <= $Charge7KM )){
	//echo "Travel fee: $" . $Charge7 . ".";
	$travelFee = $Charge7;
}
else if ($km > $Charge7KM) {
	echo "Too Far!";
	manualQuote("the venue is too far away");
	
}

$quoteOutput['Travel Fee'] = $travelFee;


foreach($quoteOutput as $x => $x_value) {
    //echo "Key=" . $x . ", Value=" . $x_value;
    //echo "<br>";
}

// Caculate hours
		
		//echo 'start raw: ' . $startTime . ' End raw: ' . $endTime . ' <br>';
		
		//echo 'start raw: ' . date("l jS \of F Y h:i:s A",$startTime) . ' End raw: ' . date("l jS \of F Y h:i:s A",$endTime) . '<br> ';

		
		$quoteOutput['Event Start Time'] = date_format($startTime,"g:i a");
		$quoteOutput['Event End Time'] = date_format($endTime,"g:i a");
		
		//echo '<br>EndtimeafterFORMAT to ARRAY:'.$quoteOutput['Event End Time'];
	
		
		 $startTimeStr = strtotime(date_format($startTime,'c'));
		  $endTimeStr = strtotime(date_format($endTime,'c'));
		//  $current_time = time();
		
		//echo '<br>EndTimeStr' . $endTimeStr.'<br>';
		  
		 // echo "Difference in Hours: ". ($endTimeStr-$startTimeStr)/3600;
		  $eventTotalHours = ($endTimeStr-$startTimeStr)/3600;
	
		if ($endTime < $startTime) {
			
		 http_response_code(400);
            echo "Oops! There was a problem with your submission (end time before start time). Please complete the form and try again. <br>";
            exit;
			
		}
		
		//1am
		$oneAMCheckEnd = strtotime(date_format($endTime,'c'));
		
		//echo '<br>oneAMCheckEnd: ' .$oneAMCheckEnd. '<br>';
		
		$oneAMCheckEndhour = date_format($endTime,"H:i");
	
		$sunrise = "1:00";
		$sunset = "5:00";
		$date1 = DateTime::createFromFormat('H:i', $oneAMCheckEndhour);
		$date2 = DateTime::createFromFormat('H:i', $sunrise);
		$date3 = DateTime::createFromFormat('H:i', $sunset);
		if ($date1 > $date2 && $date1 < $date3)
		{
		   //echo 'here OVERTIME<br>';
		   $overOneAMHours = ($endTimeStr-946774800)/3600;
		  //echo 'here OVERTIME'.$overOneAMHours.'<br>';
		   $quoteOutput['Over 1am Hours'] =$overOneAMHours;
		   
		}
		else $overOneAMHours = 0;
		
		//echo '<br>oneAMCheckEndhour: ' .$oneAMCheckEndhour. '<br>';
		
		
		
		if ($eventTotalHours > 8) manualQuote("the event is over 8 hours long");

		$quoteOutput['Event Hours'] = $eventTotalHours;
	
// Package Caculations

if ($package === 'Large')
{
//echo 'PACKAGE IS LARGE';
if ($eventTotalHours > 3) {
$overtimeHours = (($eventTotalHours - $largeDefultLength)-$overOneAMHours);
$overtimeCharge = ($overtimeHours * $largePackageOvertimePrice);
$overOneAMCharge = ($overOneAMHours * $rateAfter1am);
}
else {$overtimeCharge = 0;
$overtimeHours = 0;
$overOneAMCharge = 0;
}

$totalPackageCharge = ($largePackagePrice + $overtimeCharge + $overOneAMCharge);

$quoteOutput['Overtime 1am Charge'] = $overOneAMCharge;
$quoteOutput['Overtime Cost'] = $overtimeCharge;
$quoteOutput['Hourly Overtime Rate'] = $largePackageOvertimePrice;
$quoteOutput['Overtime Hours'] = $overtimeHours;
$quoteOutput['Package Defult Length'] = $largeDefultLength;
$quoteOutput['Package Defult Price'] = $largePackagePrice;

$quoteOutput['Total Package Charge'] = number_format($totalPackageCharge);

	
}

else if ($package === 'Small')
{
//echo 'PACKAGE IS SMALL';
if ($eventTotalHours > 3) {
$overtimeHours = (($eventTotalHours - $smallDefultLength)-$overOneAMHours);
$overtimeCharge = ($overtimeHours * $smallPackageOvertimePrice);
$overOneAMCharge = ($overOneAMHours * $rateAfter1am);
}
else {$overtimeCharge = 0;
$overtimeHours = 0;
$overOneAMCharge = 0;
}

$totalPackageCharge = ($smallPackagePrice + $overtimeCharge + $overOneAMCharge);

$quoteOutput['Overtime 1am Charge'] = $overOneAMCharge;
$quoteOutput['Overtime Cost'] = $overtimeCharge;
$quoteOutput['Hourly Overtime Rate'] = $smallPackageOvertimePrice;
$quoteOutput['Overtime Hours'] = $overtimeHours;
$quoteOutput['Package Defult Length'] = $smallDefultLength;
$quoteOutput['Package Defult Price'] = $smallPackagePrice;
$quoteOutput['Total Package Charge'] = number_format($totalPackageCharge);

	
}

// Adons Caculations

$addonsTotalCharge = 0;

foreach($selectedAddOns as $name => $cost) {
    $addonsTotalCharge = $addonsTotalCharge + $cost;
}
	$quoteOutput['Addons Total Charge'] = $addonsTotalCharge;

//Master Caculations

$grandTotal = $totalPackageCharge + $addonsTotalCharge + $travelFee;


/////////////QUOTE VALID? BEGIN INSERT VALID QUOTE TO DATABASE 



// Insert the new quote into the database 
        if ($insert_stmt = $dbqdb->prepare("INSERT INTO QuoteRecord 
		(event_start,
		event_end, 
		total_package_cost,
		total_quote_amt, 
		event_length, 
		package_name, 
		overtime_hours, 
		overtime_cost, 
		over_oneam_hours, 
		over_oneam_cost, 
		add_ons_selected, 
		travel_suburb,
		travel_km, 
		travel_fee, 
		time_stamp,
		time_unix,
		client_email,
		usr_ip)
  											VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);"
											)){
            
			$insert_stmt->bind_param('ssssssssssssssssss', $quoteOutput['Event Start Time'], $quoteOutput['Event End Time'], $totalPackageCharge, $grandTotal, $quoteOutput['Event Hours'], $package, $quoteOutput['Overtime Hours'], $quoteOutput['Overtime Cost'], $overOneAMHours, $quoteOutput['Overtime 1am Charge'], $addonsString, $quoteOutput['Suburb'], $quoteOutput['Travel KM'], $quoteOutput['Travel Fee'], $date, time(), $email, $_SERVER['REMOTE_ADDR']);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
		    
			}

//// END INSERT VALID QUOTE TO DATABASE ///////////

//Get quote ID

$query = "SELECT LAST_INSERT_ID() FROM QuoteRecord LIMIT 1";

 if ($stmt = $dbqdb->prepare($query)) {
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();

        // get variables from result.
        $stmt->bind_result($quoteID);
         while ($stmt->fetch()) {
        //echo 'ID: '.$quoteID.'<br>';

   }
   $stmt->free_result();
   $stmt->close();
   $dbqdb->close();
   
		}

// Output

setcookie('QuoteID',$quoteID);

//echo $quoteID;

echo "<h4>Quote ID: $quoteID </h4>";


echo"<h4>$package package price breakdown:</h4>";

echo "<ul>";
echo "<li>".$quoteOutput['Package Defult Length']." hours minimum.</li>";
echo "<li>Base price of $".$quoteOutput['Package Defult Price']." for ".$quoteOutput['Package Defult Length']." hours.</li>";
echo "<li>$".$quoteOutput['Hourly Overtime Rate']." per hour of extra time. (Before 1am)</li>";
echo "<li>\$$rateAfter1am per hour extra time after 1am.</li>";
echo "<li>\$$depost deposit required.</li>";
echo "</ul><br>";


echo "Event Length: ".$quoteOutput['Event Hours']." hours (".$quoteOutput['Event Start Time']." - ".$quoteOutput['Event End Time'].")<br>";



echo "<table> ";

    echo "<tr>";
    	echo "<td>" .$package. " Package (".$quoteOutput['Package Defult Length']." hours of service) </td>";
        echo "<td> $" . $quoteOutput['Package Defult Price'] . ".00</td>";
    echo "</tr>";
	
	if ($overtimeHours !== 0){
	echo "<tr>";
    	echo "<td> Extra time (" .$quoteOutput['Overtime Hours']. " hours @ $".$quoteOutput['Hourly Overtime Rate'].".00 per hour)</td>";
        echo "<td> $" . $quoteOutput['Overtime Cost'] . ".00</td>";
    echo "</tr>";
	}
	
	if ($overOneAMHours !== 0){
	echo "<tr>";
    	echo "<td> Over 1am time (" .$overOneAMHours. " hours @ $".$rateAfter1am.".00 per hour after 1am)</td>";
        echo "<td> $" . $quoteOutput['Overtime 1am Charge'] . ".00</td>";
    echo "</tr>";
	}
	
	if (!empty($selectedAddOns)){
	foreach($selectedAddOns as $name => $cost) {
    
	echo "<tr>";
    	echo "<td> <b>Item Addon: </b>" .$name. " </td>";
        echo "<td> $" . $cost . ".00</td>";
    echo "</tr>";
	}
	}
	
	if ($quoteOutput['Travel Fee'] !== 0){
	 echo "<tr>";
    	echo "<td> Travel Fee (" . $quoteOutput['Suburb'] . ") </td>";
        echo "<td> $" . $quoteOutput['Travel Fee'] . ".00</td>";
    echo "</tr>";
	}
	
	 echo "<tr>";
    	echo "<td><b> Total Quote Amount: </b></td>";
        echo "<td><b> $" . $grandTotal . ".00 </b></td>";
    echo "</tr>";
	
	
echo "</table>";



//$link_address = 'DJEPForm.php?quoteID="' . $quoteID . '"';

//echo   "<button type=\"button\" onclick=\"location.href=\"DJEPForm.php?quoteID=" . $quoteID . "\" id='continue_to_booking'>Check avilability and book</button>";

//echo "<a href='$link_address'>Link</a>";

$_SESSION["quote_id"] = $quoteID;

//Set form data to cookies FOR FORM FILL


echo $date;
// RETURN VALID QUOTE TO USER /////////
// Set a 200 (okay) response code.
//http_response_code(200);
echo "All Good";


			
       
	//if not a post
    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission Not a POST request, please try again.";
    }
/////////////////////////////////////////////////////////////////////////////////////////////////////////
?>


<div class="form_quote_contain" align="center">

    
     

    <div class="row Row 1">
        <div class="col-sm-5 col-md-offset-1 col-lg-offset-2 col-lg-3">
        	<div class="light_line">
                <div class="row row-centered" style="padding:20px">
                    <h4><?php echo $package?> package price breakdown:</h4>
                </div> 
                	<div style="text-align: left;">  
        			<?php
					   echo "<ul>";
						echo "<li>".$quoteOutput['Package Defult Length']." hours minimum.</li>";
						echo "<li>Base price of $".$quoteOutput['Package Defult Price']." for ".$quoteOutput['Package Defult Length']." hours.</li>";
						echo "<li>$".$quoteOutput['Hourly Overtime Rate']." per hour of extra time. (Before 1am)</li>";
						echo "<li>\$$rateAfter1am per hour extra time after 1am.</li>";
						echo "<li>\$$depost deposit required.</li>";
						echo "</ul><br>";
						?>
        			</div>
        	</div>
        </div>
        <div class="col-sm-offset-0 col-sm-7 col-md-5">
        
        	<div class="light_line">
        		<div class="row row-centered" style="padding:20px">
					<?php echo "Event Length: ".$quoteOutput['Event Hours']." hours (".$quoteOutput['Event Start Time']." - ".$quoteOutput['Event End Time'].")<br>";?>
        		</div> 
        			<?php
						echo "<table>";
						
						echo "<tr>";
							echo "<td>" .$package. " Package (".$quoteOutput['Package Defult Length']." hours of service) </td>";
							echo "<td> $" . $quoteOutput['Package Defult Price'] . ".00</td>";
						echo "</tr>";
						
						if ($overtimeHours !== 0){
						echo "<tr>";
							echo "<td> Extra time (" .$quoteOutput['Overtime Hours']. " hours @ $".$quoteOutput['Hourly Overtime Rate'].".00 per hour)</td>";
							echo "<td> $" . $quoteOutput['Overtime Cost'] . ".00</td>";
						echo "</tr>";
						}
						
						if ($overOneAMHours !== 0){
						echo "<tr>";
							echo "<td> Over 1am time (" .$overOneAMHours. " hours @ $".$rateAfter1am.".00 per hour after 1am)</td>";
							echo "<td> $" . $quoteOutput['Overtime 1am Charge'] . ".00</td>";
						echo "</tr>";
						}
						
						if (!empty($selectedAddOns)){
						foreach($selectedAddOns as $name => $cost) {
						
						echo "<tr>";
							echo "<td> <b>Item Addon: </b>" .$name. " </td>";
							echo "<td> $" . $cost . ".00</td>";
						echo "</tr>";
						}
						}
						
						if ($quoteOutput['Travel Fee'] !== 0){
						 echo "<tr>";
							echo "<td> Travel Fee (" . $quoteOutput['Suburb'] . ") </td>";
							echo "<td> $" . $quoteOutput['Travel Fee'] . ".00</td>";
						echo "</tr>";
						}
						
						
					echo "</table>";
					
							?>
        
        	</div>    
        
        
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
            <div class="light_line">
            	<div class="row" style="padding-bottom:20px">
					<h3>
					<?php
                    echo "<tr>";
                        echo "Total Quote Amount: ";
                        echo "$" . $grandTotal . ".00";
                    echo "</tr>";
                    ?>
                    </h3>
                </div>
                <div class="row">
                	<?php echo "Quote ID: $quoteID"; ?>
                </div>
                <div class="row">
                <?php echo $date; ?>
                </div>
                <div class="row">
                	An email with these details has been sent to .
                </div>
            </div>
        </div>
    </div>
    
    <div class="row" style="padding-top:10px">  
    	<div class="col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8"> 

              <div class="alert alert-info" align="center">
                  <div class="glyphicon glyphicon-usd" style="font-size:300%">
                  </div>
                  <br>
                  <div style="padding:10px">
                      If you are happy with this quote, you have the option of <b>paying a deposit online now</b> to lock in your date.<br>
                      Otherwise you can <b>pay later</b>.
                  </div>
              </div>
         
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-6 col-md-offset-1 col-md-5 col-lg-offset-2 col-lg-4">
            <div class="light_line">
            	<h3>Pay Deposit Now</h3>
                You can pay your deposit online now via credit card or PayPal.<br>
                Or via bank deposit.
            </div>
        </div>
    
    
    
        <div class="col-sm-6 col-md-5 col-lg-4">
            <div class="light_line">
            	<h3>Pay Deposit Later</h3>
                An email has been sent to. This email contains the quote above, and instructions on how to pay your deposit.
            </div>
        </div>
    </div>
</div>


<? ///////////////////////////////////////////////////////////////////////////////////////////////////////// ?>



<div class="form_quote_contain" align="center">
<h1>Your Quote</h1>
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
    	<div class="col-xs-4">
    	<div class="light_line">
        <div class="row row-centered" style="padding:20px">
        
        <h4><?php echo $package?> package price breakdown:</h4>
        </div> 
        <div class="row row-centered" style="padding-top:20px">
        <div class="col-xs-12 col-sm-12" style="text-align: left;">     
       <?php
	   echo "<ul>";
		echo "<li>".$quoteOutput['Package Defult Length']." hours minimum.</li>";
		echo "<li>Base price of $".$quoteOutput['Package Defult Price']." for ".$quoteOutput['Package Defult Length']." hours.</li>";
		echo "<li>$".$quoteOutput['Hourly Overtime Rate']." per hour of extra time. (Before 1am)</li>";
		echo "<li>\$$rateAfter1am per hour extra time after 1am.</li>";
		echo "<li>\$$depost deposit required.</li>";
		echo "</ul><br>";
        ?>
      </div>
      </div>
      </div>
      </div>
      
       <div class="col-xs-8">
       <div class="light_line">
       <div class="row row-centered" style="padding:20px; text-align: left">
       <h4>
     <?php echo "Event Length: ".$quoteOutput['Event Hours']." hours (".$quoteOutput['Event Start Time']." - ".$quoteOutput['Event End Time'].")<br>";
     ?>
     </h4>
      </div>
      </div>
      
      
      
      
      <div class="light_line">
      <div class="row row-centered" style="padding:20px">
      <div class="col-xs-12">
    	
        
      
        <?php
	echo "<table>";
	
    echo "<tr>";
    	echo "<td>" .$package. " Package (".$quoteOutput['Package Defult Length']." hours of service) </td>";
        echo "<td> $" . $quoteOutput['Package Defult Price'] . ".00</td>";
    echo "</tr>";
	
	if ($overtimeHours !== 0){
	echo "<tr>";
    	echo "<td> Extra time (" .$quoteOutput['Overtime Hours']. " hours @ $".$quoteOutput['Hourly Overtime Rate'].".00 per hour)</td>";
        echo "<td> $" . $quoteOutput['Overtime Cost'] . ".00</td>";
    echo "</tr>";
	}
	
	if ($overOneAMHours !== 0){
	echo "<tr>";
    	echo "<td> Over 1am time (" .$overOneAMHours. " hours @ $".$rateAfter1am.".00 per hour after 1am)</td>";
        echo "<td> $" . $quoteOutput['Overtime 1am Charge'] . ".00</td>";
    echo "</tr>";
	}
	
	if (!empty($selectedAddOns)){
	foreach($selectedAddOns as $name => $cost) {
    
	echo "<tr>";
    	echo "<td> <b>Item Addon: </b>" .$name. " </td>";
        echo "<td> $" . $cost . ".00</td>";
    echo "</tr>";
	}
	}
	
	if ($quoteOutput['Travel Fee'] !== 0){
	 echo "<tr>";
    	echo "<td> Travel Fee (" . $quoteOutput['Suburb'] . ") </td>";
        echo "<td> $" . $quoteOutput['Travel Fee'] . ".00</td>";
    echo "</tr>";
	}
	
	 echo "<tr>";
    	echo "<td><b> Total Quote Amount: </b></td>";
        echo "<td><b> $" . $grandTotal . ".00 </b></td>";
    echo "</tr>";
	
	
echo "</table>";

		?>
      
            
      
      
      </div>
      </div>
      </div>
      
      <div class="light_line">
      <div class="row">
    
      <div class="col-xs-6 col-sm-6">
      <div class="form-group">
 
            <label for="req_start_time">Event Start Time:</label>
  	

        </div>
       	 </div>
         
         <div class="col-xs-6 col-sm-6">
        
        <div class="form-group">
            <label for="req_end_time">Event End Time:</label>
  			
 
        </div>
       	</div>
        </div>
        </div>
      
      <div class="light_line">
      <div class="row row-centered" style="padding:20px">
      <div class="col-xs-12 col-md-6">
      <div class="form-group">
      
      <label for="suburb"><h4>Venue Suburb:</h4></label>
      <input type="text" id="suburb" class="form-control" name="suburb" placeholder='Suburb in Sydney' required>
      
      </div>
      <div class="row row-centered" style="padding:20px">
      <div class="form-group suburberror">
      	 <div class="alert alert-warning" align="center">
        <div class="glyphicon glyphicon-exclamation-sign" style="font-size:100%" id="suburbError"></div>
        <p></p>
      </div>
      </div>
	</div>	
    </div>
      
      <div class="col-xs-12 col-md-6">
      <div class="form-group">
      
      <label for="email"><h4>Email:</h4></label>
      <input type="email" id="email" class="form-control" name="email" placeholder='so we can send you a copy of the quote' required>
      
      </div>
     
      
      
      <div class="row row-centered" style="padding:20px">
      <div class="form-group emailerror">
      	 <div class="alert alert-warning" align="center">
        <div class="glyphicon glyphicon-exclamation-sign" style="font-size:100%" id="emailError"></div>
        <p></p>
      </div>
      </div>
	</div>	
    
      
      
      </div>
      </div>
      
      </div>
     
      <div class="row row-centered" style="padding:20px">
      <div class="col-xs-12">
      <div class="form-group">
      
      
      <input type="submit" class="btn btn-info btn-lg btn-block">
      
      
      
      </div>
      </div>
      </div>
		</div>
    
    </form>
    
    </div>