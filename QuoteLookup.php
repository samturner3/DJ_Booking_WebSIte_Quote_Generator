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

$quoteIDlookup = $_GET["id"];

$quoteOutput = array();
$itemAddons = array();

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
?>

<div class="form_quote_contain" align="center">

    <div class="row" style="margin-bottom:20px">
        <div class="col-xs-6 col-sm-2 col-md-offset-1 col-lg-offset-2">
            <a href="http://www.discobuzz.com.au/wp-discobuzz/" type="button" class="btn btn-info pull-left">
            <span class="glyphicon glyphicon-arrow-left"></span> Back to Disco Buzz SIte
            </a>
        </div>
      <div class="col-xs-6 col-sm-offset-8 col-sm-2 col-md-offset-6 col-lg-offset-4">
        <a href="QuoteAllInOnePage.php" class="btn btn-info pull-right" role="button">
        <span class="glyphicon glyphicon-calendar"></span> Select a new date
        </a>
        </div>
    </div>

    <img src="http://www.discobuzz.com.au/wp-discobuzz3/wp-content/uploads/2015/11/DiscoBuzzrecLogoNoSite1.png" class="img-responsive" width="350" height="136" alt=""/>
     
    <h1> Your Quote </h1>

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
        		<a href="/QuoteGen/QuoteBookingForm.php">
				<button type="button" class="btn btn-primary btn-block">
                <div class="glyphicon glyphicon-pencil" style="font-size:300%">
                  </div><br>
                  <div style="padding:15px; font-size:150%"">
                 Click here to book your event
                 </div>
                 </button>
                 </a>

        </div>
    </div>
    
</div>

<?php
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
/////////////////////////////////////////////////////////////////////////////////////////////////////////
?>

