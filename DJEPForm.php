
<script src="jquery-2.1.0.min.js"></script>



<?php include_once "quoteGeneratorSettings.php";

session_start();

//if (isset($_GET['quoteID'])) {

$quoteID = $_SESSION["quote_id"];

$day = ($_SESSION["day"]);
$month = ($_SESSION["month"]);
$year = ($_SESSION["year"]);

//$sqlLookup = $dbqdb->real_escape_string($_GET['quoteID']);



if ($dbqdb->connect_error){
	$message = $dbqdb->connect_error;	
	exit;
} else {
	$sql = 'SELECT * FROM QuoteRecord WHERE quote_id=' .$quoteID ;
	echo $sql;
	$result = $dbqdb->query($sql);
	
	$message = $dbqdb->error;

	
	} if($result->num_rows < 1) {
		$message = "No Rows Found";	
		printf("Result trig 0.");
	}
	else {
		$row = $result->fetch_assoc();	
	}



echo $row['quote_id'];
echo $row['event_start'];
echo $row['event_end'];

if ($row['package_name'] === 'Large') $packageCode = '12837';
else if ($row['package_name'] === 'Small') $packageCode = '12836';



?>
<link rel="stylesheet" href="style.css">
</head>

<body>
<html>
<body>
<div id="title">
  <h1>Disco Buzz Booking Form</h1>
</div>
<div id="master-container">
  <div id="form-messages"></div>
  <div id="form-container"> 
    <!-- BEGIN DJEVENTPLANNER CODE --> 
    <SCRIPT SRC='http://discobuzzeventplanner.com.au/check_req_info_form.js' LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'></SCRIPT>
    <form method=post action=http://discobuzzeventplanner.com.au/request_information.asp onSubmit='return submitIt(this);' name=reqinfoform style="margin:10px 20px;">
      <link rel="stylesheet" href="http://discobuzzeventplanner.com.au/includes/style-responsivetools-min.css">
      <div class="djepcode">
        <div class="form-group">
          <label class="col-sm-2 control-label">Date Of Event</label>
          <div class="col-sm-10"><span class="metro-table" id="date_select">
            <select name=day class=dayselect>
              <option value=<?php echo $day?> disabled><?php echo $day?></option>
            </select>
            <select name=month class=monthselect>
              <option value=<?php echo $month?> disabled><?php echo $month?></option>
            </select>
            <select name=year class=yearselect>             
              <option value=<?php echo $year?> disabled><?php echo $year?></option>
            </select>
            </span></div>
          <div class="clearfix"></div>
        </div>
        <script>$('#date_select select').addClass('form-control');</script> 
        <script>$('#date_select select').css('float', 'left');</script> 
        <script>$('#date_select select').css('width', '31%');</script> 
        <script>$('#date_select select').css('margin', '2px');</script>
        <div class="form-group">
          <label class="col-sm-2 control-label">First Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control width90hack" id="first_name" name="first_name">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Last Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control width90hack" id="last_name" name="last_name">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Email Address</label>
          <div class="col-sm-10">
            <input type="text" disabled class="form-control width90hack" id="email" name="email" value="<?php echo $row['client_email']?>">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Your Phone Number</label>
          <div class="col-sm-10">
            <input type="tel" class="form-control width90hack" id="telephone" name="telephone">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Best Time / Method To Reach You (Phone, Email, SMS)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control width90hack" id="best_time" name="best_time">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Number of guests expected</label>
          <div class="col-sm-10">
            <input type="text" class="form-control width90hack" id="req_guest_count" name="req_guest_count" maxlength=30>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Start Time</label>
          <div class="col-sm-10">
            <select class="form-control width90hack"  name='req_start_time'>

              <option disabled value='<?php echo $row['event_start']?>'><?php echo $row['event_start']?></option>
            
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">End Time</label>
          <div class="col-sm-10">
            <select class="form-control width90hack"  name='req_end_time'>
       <option disabled value='<?php echo $row['event_end']?>'><?php echo $row['event_end']?></option>
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Type Of Event</label>
          <div class="col-sm-10">
            <select name=event_type class="form-control width90hack" >
              <option value=''>please select...</option>
              <option ><5th Birthday Party</option>
              <option >5th Birthday Party</option>
              <option >6th Birthday Party</option>
              <option >7th Birthday Party</option>
              <option >8th Birthday Party</option>
              <option >9th Birthday Party</option>
              <option >10th Birthday Party</option>
              <option >11th Birthday Party</option>
              <option >12th Birthday Party</option>
              <option >13th Birthday Party</option>
              <option >14th Birthday Party</option>
              <option >15th Birthday Party</option>
              <option >16th Birthday Party</option>
              <option >17th Birthday Party</option>
              <option >18th Birthday Party</option>
              <option >21st Birthday Party</option>
              <option >30th Birthday Party</option>
              <option >40th Birthday Party</option>
              <option >50th Birthday Party</option>
              <option >Birthday Party - Other</option>
              <option >Bar Mitzvah</option>
              <option >Bat Mitzvah</option>
              <option >Christmas Party</option>
              <option >Class Reunion</option>
              <option >Community Celebration</option>
              <option >Company Party</option>
              <option >Family Reunion</option>
              <option >Farewell Dinner</option>
              <option >Fundraiser</option>
              <option >Graduation Celebration</option>
              <option >PA / Sound Reinforcement</option>
              <option >Picnic</option>
              <option >Presentation Night</option>
              <option >Private Party</option>
              <option >School Disco / Event - High</option>
              <option >School Disco / Event - Primary</option>
              <option >Singles Dance</option>
              <option >Vacation Care Party</option>
              <option >Wedding</option>
              <option >Other / Not Listed</option>
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Package Desired</label>
          <div class="col-sm-10">
            <select class="form-control width90hack"  name=packageid>
              <option disabled value=<?php echo $packageCode ?>><?php echo $row['package_name']?> Package
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Additional Questions Or Event Details</label>
          <div class="col-sm-10">
            <textarea name=additional_information rows=5 cols=25 class="form-control width90hack"></textarea>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">How did you hear about us?</label>
          <div class="col-sm-10">
            <input type=text name=req_source class="form-control width90hack" maxlength=50>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Optional Karaoke & music videos Addons</label>
          <div class="col-sm-10">
            <select class="form-control width90hack" name=question_1>
              <option value=''>please select...</option>
              <option>Music Videos Only $50</option>
              <option> Karaoke Only $70</option>
              <option> Karaoke & Music Videos Deal $100</option>
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Optional Effect Addons</label>
          <div class="col-sm-10">
            <input type=checkbox name='question_2' value='100 Glow Sticks $15' >
            100 Glow Sticks $15<br>
            <input type=checkbox name='question_2' value='Uplighting $30' >
            Uplighting $30<br>
            <input type=checkbox name='question_2' value=' Large Strobe Light $25' >
            Large Strobe Light $25<br>
            <input type=checkbox name='question_2' value=' Professional Laser Show System $40' >
            Professional Laser Show System $40<br>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">In which suburb is the venue?*
            <input type=hidden id=q3_required name=q3_required value=TRUE>
          </label>
          <div class="col-sm-10">
            <input class="form-control width90hack" type=text name=question_3 size=30 maxlength=50>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Name and/or Address of venue (eg. House, RSL Club, Hall)</label>
          <div class="col-sm-10">
            <input class="form-control width90hack" type=text name=question_4 size=30 maxlength=50>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">For what age group is the event?</label>
          <div class="col-sm-10">
            <input class="form-control width90hack" type=text name=question_5 size=30 maxlength=50>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Staff Attire</label>
          <div class="col-sm-10">
            <input type=hidden name=q6_mapto value=attire>
            <select class="form-control width90hack" name=question_6>
              <option value=''>please select...</option>
              <option>Casual</option>
              <option> Smart Casual</option>
              <option> Formal</option>
              <option> Other</option>
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <input type=hidden name=checkdate value=''>
        <input type=hidden name=djidnumber value=6121>
        <input type=hidden name=action value=add_information_request>
        <input type=hidden name=source value=''>
        <br>
        <p align="center">
          <input type=submit name=submit value=Submit class="btn btn-lg btn-customcolor">
        </p>
        <br>
      </div>
    </form>
    
    <!-- END DJEVENTPLANNER CODE --> 
  </div>
  <button onclick="bookingFormDisplay()" type="button" id='continue_to_booking'>Check avilability and book</button>
  <div id="blank"></div>
  
  <!--DJEP FORM-->
  
  <div id="DJEP"> </div>
</div>

<?php 
//}

//else {
	//echo "Session not set";
//}
?>
</body>
</html>
</body>
</html>
