<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');

date_default_timezone_set('Australia/Sydney');

session_start();

if (($_SERVER["REQUEST_METHOD"] == "POST") and isset($_POST["day"]) and isset($_POST["month"]) and isset($_POST["year"]) and !isset($_GET['1']) and !isset($_GET['0']))  { 


$_SESSION["day"] = ($_POST["day"]);
$_SESSION["month"]  = ($_POST["month"]);
$_SESSION["year"] = ($_POST["year"]);

$day = ($_POST["day"]);
$month = ($_POST["month"]);
$year = ($_POST["year"]);
?>
<div class="center">
<?php
//echo ("<h2>Checking availability for $day/$month/$year ...</h2>");

$date=date_create_from_format("j-n-Y","$day-$month-$year");
$now = new DateTime();





//<!-- BEGIN DJEVENTPLANNER CODE -->


if($date < $now) {?>
		<div class="row">
		<div class="col-xs-10 col-xs-offset-1
col-md-8 col-md-offset-2
col-lg-6 col-lg-offset-3" >
       <div class="alert alert-warning" align="center" style="font-size:large">
       <div class="glyphicon glyphicon-exclamation-sign" ></div>
       <strong>Oops!</strong> The date you selected is in the past.
      <br> <a href="QuoteAllInOnePage.php" style="margin:10px" class="btn btn-warning" role="button">Try again</a>
      </div>
      </div>
      </div>
      <img src="http://sites.onefusion.com.au/disco/wp-content/uploads/2015/07/logo.png" width="300" height="268" alt=""/>
      </div>
      
	
    <?php exit;
}

?>
<div class="col-xs-10 col-xs-offset-1
col-md-8 col-md-offset-2
col-lg-6 col-lg-offset-3" >
<div class="row">
<h2>Checking availability...</h2>
</div>
<div class="row">
<img src="http://sites.onefusion.com.au/disco/wp-content/uploads/2015/07/logo.png" width="300" height="268" alt=""/>
</div>
</div>

<form hidden method=post action=http://discobuzzeventplanner.com.au/check_availability.asp id="djepForm">
  <table align=center cellpadding=5 cellspacing=0 border=0 style='border-collapse:collapse;' width=410>
    <tr>
      <td align=center style='font-size:10pt;font-family:Verdana;color:#000000;background-color:#F1F571;'><b>Check Availability</td>
    </tr>
    <tr>
      <td align=center style='font-size:10pt;font-family:Verdana;color:#000000;background-color:#FFFFFF;'>Select the date of your event. Then click on the check availability button to instantly check for our availability.</td>
    </tr>
    <tr>
      <td align=center style='font-size:10pt;font-family:Verdana;color:#000000;background-color:#FFFFFF;'><select name=day>
          <option selected value=<?php echo $day ?>><?php echo $day?></option>
        </select>
        <select name=month>
          
          <option selected value=<?php echo $month ?>><?php echo $month ?></option>
        </select>
        <select name=year>
          <option selected value=<?php echo $year ?>><?php echo $year ?></option>
        </select>
        <input type=hidden name=djidnumber value='6121'>
          
        <input type=submit value="Check Availability"></td>
    </tr>
    <tr>
      <td align=center style='font-size:10pt;font-family:Verdana;color:#000000;background-color: #F1F571;'><font size=1>powered by discobuzzeventplanner.com.au</td>
    </tr>
  </table>
</form>
<!-- END DJEVENTPLANNER CODE -->


<script>document.getElementById('djepForm').submit();</script>  



<?php
}

else{
	 echo 'Lets try that again...';
	 //http_response_code(400);
	 //header('Location: checkAvil.php');
	 exit;
}
?>
</div>
</body>
</html>