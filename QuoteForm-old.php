<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>InstantQuote</title>
<link href="styles/bootstrap.min.css" rel="stylesheet">
<script type="text/JavaScript" src="jquery-2.1.0.min.js"></script>
<script type="text/JavaScript" src="js/formValidate.js"></script>
<script type="text/JavaScript" src="js/jquery.validate.min.js"></script>
<script type="text/JavaScript" src="app.js"></script>
<script type="text/JavaScript" src="js/forms.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/style.css">
<?php include_once "quoteGeneratorSettings.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');
?>

</head>

<body>
<div id="master-container">
      <?php 
	

  //<?php
  		if(isset($_SESSION['day'], $_SESSION['month'], $_SESSION['year']))
	{
		$day = ($_SESSION["day"]);
		$month = ($_SESSION["month"]);
		$year = ($_SESSION["year"]);
		
	if (isset($_GET["avil"]) and (trim($_GET["avil"]) == '1')){
		
		
		
?>
<div id="title">
  <h1>Disco Buzz Instant Quote</h1>
</div>


  <div id="form-messages" class="success">
	
	<h4>Good news! we are avilable for your date: <?php echo $day.'/'.$month.'/'.$year ?>. <br> Proceed with an instant quote below.</h4><a href="QuoteAllInOnePage.php">Select a new date</a>

  </div>
  <div id="form-quote">
    <form id="quoteForm" method="post" action="quoteGenerator.php">
      
      <div class="form-group">
        <label for="req_start_time">Event Start Time:</label>
        <select name='req_start_time' required>
          <option value='' selected></option>
          <option value='2000-01-01T12:00:00+00:00'>12:00 PM</option>
          <option value='2000-01-01T12:30:00+00:00'>12:30 PM</option>
          <option value='2000-01-01T13:00:00+00:00'>1:00 PM</option>
          <option value='2000-01-01T13:30:00+00:00'>1:30 PM</option>
          <option value='2000-01-01T14:00:00+00:00'>2:00 PM</option>
          <option value='2000-01-01T14:30:00+00:00'>2:30 PM</option>
          <option value='2000-01-01T15:00:00+00:00'>3:00 PM</option>
          <option value='2000-01-01T15:30:00+00:00'>3:30 PM</option>
          <option value='2000-01-01T16:00:00+00:00'>4:00 PM</option>
          <option value='2000-01-01T16:30:00+00:00'>4:30 PM</option>
          <option value='2000-01-01T17:00:00+00:00'>5:00 PM</option>
          <option value='2000-01-01T17:30:00+00:00'>5:30 PM</option>
          <option value='2000-01-01T18:00:00+00:00'>6:00 PM</option>
          <option value='2000-01-01T18:30:00+00:00'>6:30 PM</option>
          <option value='2000-01-01T19:00:00+00:00'>7:00 PM</option>
          <option value='2000-01-01T19:30:00+00:00'>7:30 PM</option>
          <option value='2000-01-01T20:00:00+00:00'>8:00 PM</option>
          <option value='2000-01-01T20:30:00+00:00'>8:30 PM</option>
          <option value='2000-01-01T21:00:00+00:00'>9:00 PM</option>
          <option value='2000-01-01T21:30:00+00:00'>9:30 PM</option>
          <option value='2000-01-01T22:00:00+00:00'>10:00 PM</option>
          <option value='2000-01-01T22:30:00+00:00'>10:30 PM</option>
          <option value='2000-01-01T23:00:00+00:00'>11:00 PM</option>
          <option value='2000-01-01T23:30:00+00:00'>11:30 PM</option>
          <option value='2000-01-02T00:00:00+00:00'>12:00 AM</option>
          <option value='2000-01-02T00:30:00+00:00'>12:30 AM</option>
          <option value='2000-01-02T01:00:00+00:00'>1:00 AM</option>
          <option value='2000-01-02T01:30:00+00:00'>1:30 AM</option>
          <option value='2000-01-02T02:00:00+00:00'>2:00 AM</option>
          <option value='2000-01-02T02:30:00+00:00'>2:30 AM</option>
          <option value='2000-01-02T03:00:00+00:00'>3:00 AM</option>
          <option value='2000-01-01T06:00:00+00:00'>6:00 AM</option>
          <option value='2000-01-01T06:30:00+00:00'>6:30 AM</option>
          <option value='2000-01-01T07:00:00+00:00'>7:00 AM</option>
          <option value='2000-01-01T07:30:00+00:00'>7:30 AM</option>
          <option value='2000-01-01T08:00:00+00:00'>8:00 AM</option>
          <option value='2000-01-01T08:30:00+00:00'>8:30 AM</option>
          <option value='2000-01-01T09:00:00+00:00'>9:00 AM</option>
          <option value='2000-01-01T09:30:00+00:00'>9:30 AM</option>
          <option value='2000-01-01T10:00:00+00:00'>10:00 AM</option>
          <option value='2000-01-01T10:30:00+00:00'>10:30 AM</option>
          <option value='2000-01-01T11:00:00+00:00'>11:00 AM</option>
          <option value='2000-01-01T11:30:00+00:00'>11:30 AM</option>
        </select>
      </div>
      <div class="form-group">
        <label for="end_time">Event End Time:</label>
        <select name='req_end_time' required>
          <option value='' selected></option>
          <option value='2000-01-01T12:00:00+00:00'>12:00 PM</option>
          <option value='2000-01-01T12:30:00+00:00'>12:30 PM</option>
          <option value='2000-01-01T13:00:00+00:00'>1:00 PM</option>
          <option value='2000-01-01T13:30:00+00:00'>1:30 PM</option>
          <option value='2000-01-01T14:00:00+00:00'>2:00 PM</option>
          <option value='2000-01-01T14:30:00+00:00'>2:30 PM</option>
          <option value='2000-01-01T15:00:00+00:00'>3:00 PM</option>
          <option value='2000-01-01T15:30:00+00:00'>3:30 PM</option>
          <option value='2000-01-01T16:00:00+00:00'>4:00 PM</option>
          <option value='2000-01-01T16:30:00+00:00'>4:30 PM</option>
          <option value='2000-01-01T17:00:00+00:00'>5:00 PM</option>
          <option value='2000-01-01T17:30:00+00:00'>5:30 PM</option>
          <option value='2000-01-01T18:00:00+00:00'>6:00 PM</option>
          <option value='2000-01-01T18:30:00+00:00'>6:30 PM</option>
          <option value='2000-01-01T19:00:00+00:00'>7:00 PM</option>
          <option value='2000-01-01T19:30:00+00:00'>7:30 PM</option>
          <option value='2000-01-01T20:00:00+00:00'>8:00 PM</option>
          <option value='2000-01-01T20:30:00+00:00'>8:30 PM</option>
          <option value='2000-01-01T21:00:00+00:00'>9:00 PM</option>
          <option value='2000-01-01T21:30:00+00:00'>9:30 PM</option>
          <option value='2000-01-01T22:00:00+00:00'>10:00 PM</option>
          <option value='2000-01-01T22:30:00+00:00'>10:30 PM</option>
          <option value='2000-01-01T23:00:00+00:00'>11:00 PM</option>
          <option value='2000-01-01T23:30:00+00:00'>11:30 PM</option>
          <option value='2000-01-02T00:00:00+00:00'>12:00 AM</option>
          <option value='2000-01-02T00:30:00+00:00'>12:30 AM</option>
          <option value='2000-01-02T01:00:00+00:00'>1:00 AM</option>
          <option value='2000-01-02T01:30:00+00:00'>1:30 AM</option>
          <option value='2000-01-02T02:00:00+00:00'>2:00 AM</option>
          <option value='2000-01-02T02:30:00+00:00'>2:30 AM</option>
          <option value='2000-01-02T03:00:00+00:00'>3:00 AM</option>
          <option value='2000-01-02T03:30:00+00:00'>3:30 AM</option>
          <option value='2000-01-02T04:00:00+00:00'>4:00 AM</option>
          <option value='2000-01-01T06:00:00+00:00'>6:00 AM</option>
          <option value='2000-01-01T06:30:00+00:00'>6:30 AM</option>
          <option value='2000-01-01T07:00:00+00:00'>7:00 AM</option>
          <option value='2000-01-01T07:30:00+00:00'>7:30 AM</option>
          <option value='2000-01-01T08:00:00+00:00'>8:00 AM</option>
          <option value='2000-01-01T08:30:00+00:00'>8:30 AM</option>
          <option value='2000-01-01T09:00:00+00:00'>9:00 AM</option>
          <option value='2000-01-01T09:30:00+00:00'>9:30 AM</option>
          <option value='2000-01-01T10:00:00+00:00'>10:00 AM</option>
          <option value='2000-01-01T10:30:00+00:00'>10:30 AM</option>
          <option value='2000-01-01T11:00:00+00:00'>11:00 AM</option>
          <option value='2000-01-01T11:30:00+00:00'>11:30 AM</option>
        </select>
        </div>
      
      <label for="package"><strong>Package:</strong></label>
		<div class="form-group">
      <label for="Small Package">Small Package
        <input type="radio" name="package" id="Small Package" value="small" required>
      </label>
      </div>
		<div class="form-group">
      <label for="Large Package">
      Large Package
      <input type="radio" name="package" id="Large Package" value="large" required>
      
      </div>
     	<div class="form-group">
      <div class="field">
        <label for="ItemAddons"><strong>Item Addons:</strong></label>
        <?php
	  //Update number of items below
	  for ($row = 0; $row < $numberOfAddons; $row++) {
		echo "<label for=\"". $addonsArray[$row][0]."\" class=\"" . $addonsArray[$row][2]. "\">". $addonsArray[$row][0]. "<span class=\"".$addonsArray[$row][3]."\"> ($".$addonsArray[$row][1].") </span> 
		
		<span class=\"".$addonsArray[$row][3]."included\"></span>
		
		</label>";  
		echo "<input type=\"checkbox\" name=\"ItemAddons[]\" id=\"" . $addonsArray[$row][0]. "\" class=\"" . $addonsArray[$row][2]. "\" value=\"" . $addonsArray[$row][0]. "\"><br>";

		}
	  ?>
      </div>
      </div>
      <div class="form-group">
      <div class="field">
        <label for="KaraokeAddons"><strong>Karaoke Addons:</strong></label>
        <?php
	  //Update number of items below
	  echo "<input type=\"radio\" name=\"KaraokeAddons[]\" value=\"\"> None <br>";
	  for ($row = 0; $row < $numberOfKaraoke; $row++) {
		echo "<input type=\"radio\" name=\"KaraokeAddons[]\" value=\"" . $karaokeArray[$row][0]. "\"> ".$karaokeArray[$row][0]." ($".$karaokeArray[$row][1].") <br>";

		}
	  ?>
      </div>
      </div>
      <div class="form-group">
      <div class="field">
        <label for="suburb">Venue Suburb:</label>
        <input type="text" id="suburb" name="suburb" placeholder='Suburb in Sydney' required>
        <div class="error" id="suburbError"></div>
        <br>
      </div>
      </div>
      <div class="form-group">
      <div class="field">
        <label for="email">Email so we can send you a copy of the quote</label>
        <input type="email" id="email" name="email" placeholder='Your email address' required>
        <div class="error" id="suburbError"></div>
        <br>
      </div>
      </div>
      <div class="form-group">
      <div class="field">
        <button type="submit">Send</button>
        <div class="error" id="submitError">Here</div>
      </div>
      </div>
    </form>
  </div>
  <div id="blank"></div>

 
 
  <div id="quoteoutput"> </div>
  
  <div id="DJEP"> 
  </div>
  <button id="continue_to_booking" type="button">Continue to booking</button>
  
  
  

<?php
	}//End is avil 
	
	else if (isset($_GET["avil"]) and (trim($_GET["avil"]) == '0')){
		?>
  
        <div id="form-messages" class="error">
        <h3>Bad news! we are not avilable for your date: <?php echo $day.'/'.$month.'/'.$year ?> <br> </h3>
        <a href='QuoteAllInOnePage.php'>Select a new date</a>
        </div>
        <?php
	
	}//End is not avil 

	else {
	echo 'Please check availability first';	
	?>
    <a href="QuoteAllInOnePage.php">Check availability</a>
	<?php
	}
	
	}//End is date set
else {
	echo 'Please check availability first';	
	?>
    <a href="QuoteAllInOnePage.php">Check availability</a>
	<?php
}
?>
</div>
</body>
</html>
</body>
</html>