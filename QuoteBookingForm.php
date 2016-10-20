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

label {
	text-align:right
}
</style>
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
	//echo $sql;
	$result = $dbqdb->query($sql);
	
	$message = $dbqdb->error;

	
	} if($result->num_rows < 1) {
		$message = "No Rows Found";	
		printf("Result trig 0.");
	}
	else {
		$row = $result->fetch_assoc();	
	}



/*echo $row['quote_id'];
echo $row['event_start'];
echo $row['event_end'];*/

if ($row['package_name'] === 'Large') $packageCode = '12837';
else if ($row['package_name'] === 'Small') $packageCode = '12836';

$AddonsArray = explode(',', $row['add_ons_selected']);

print_r ($AddonsArray);

?>

</head>

<body>
<html>
<body>

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
     
    <h1> Book your Event </h1>

    
    <div class="row">
        <div class="col-sm-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
            <div class="light_line">
            	<div class="row" style="padding-bottom:20px">
					
                    
                    <div id="form-container"> 
    <!-- BEGIN DJEVENTPLANNER CODE --> 
    <SCRIPT SRC='http://discobuzzeventplanner.com.au/check_req_info_form.js' LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'></SCRIPT>
    <form method=post action=http://discobuzzeventplanner.com.au/request_information.asp onSubmit='return submitIt(this);' name=reqinfoform style="margin:10px 20px;">
      <link rel="stylesheet" href="http://discobuzzeventplanner.com.au/includes/style-responsivetools-min.css">
      <div class="djepcode">
        <div class="form-group">
        
        
        
        
          <label class="col-sm-4 control-label">Date Of Event</label>
         
          
          <div class="col-sm-8">
          <span class="metro-table" id="date_select">
            <select name=day class=dayselect>
              <option value=<?php echo $day?> ><?php echo $day?></option>
            </select>
            <select name=month class=monthselect>
              <option value=<?php echo $month?> ><?php echo $month?></option>
            </select>
            <select name=year class=yearselect>             
              <option value=<?php echo $year?> ><?php echo $year?></option>
            </select>
            </span></div>
          <div class="clearfix"></div>
      
        <script>$('#date_select select').addClass('form-control');</script> 
        <script>$('#date_select select').css('float', 'left');</script> 
        <script>$('#date_select select').css('width', '31%');</script> 
        <script>$('#date_select select').css('margin', '2px');</script>
      
     
        
        
        <div class="form-group">
          <label class="col-sm-4 control-label">First Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control width90hack" id="first_name" name="first_name" required>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Last Name</label>
          <div class="col-sm-8">
            <input type="text" class="form-control width90hack" id="last_name" name="last_name" required>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Email Address</label>
          <div class="col-sm-8">
            <input type="text" readonly class="form-control width90hack" id="email" name="email" value="<?php echo $row['client_email']?>">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Your Phone Number</label>
          <div class="col-sm-8">
            <input type="tel" class="form-control width90hack" id="telephone" name="telephone" required>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Best Time / Method To Reach You (Phone, Email, SMS)</label>
          <div class="col-sm-8">
            <input type="text" class="form-control width90hack" id="best_time" name="best_time">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Number of guests expected</label>
          <div class="col-sm-8">
            <input type="text" class="form-control width90hack" id="req_guest_count" name="req_guest_count" maxlength=30>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Start Time</label>
          <div class="col-sm-8">
            <select class="form-control width90hack"  name='req_start_time'>

              <option value='<?php echo $row['event_start']?>'><?php echo $row['event_start']?></option>
            
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">End Time</label>
          <div class="col-sm-8">
            <select class="form-control width90hack"  name='req_end_time'>
       <option value='<?php echo $row['event_end']?>'><?php echo $row['event_end']?></option>
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Type Of Event</label>
          <div class="col-sm-8">
            <select name=event_type class="form-control width90hack" required>
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
          <label class="col-sm-4 control-label">Package Desired</label>
          <div class="col-sm-8">
            <select class="form-control width90hack"  name=packageid>
              <option value=<?php echo $packageCode ?>><?php echo $row['package_name']?> Package
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Additional Questions Or Event Details</label>
          <div class="col-sm-8">
            <textarea name=additional_information rows=5 cols=25 class="form-control width90hack"></textarea>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">How did you hear about us?</label>
          <div class="col-sm-8">
            <input type=text name=req_source class="form-control width90hack" maxlength=50>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Optional Karaoke & music videos Addons</label>
          <div class="col-sm-8">
            <select class="form-control width90hack" name=question_1>
            <?
            if (preg_grep("/Music Videos \(..\)/", $AddonsArray)){
			
            echo '<option selected="selected"> Music Videos Only</option>';
			}

			else if (preg_grep("/Karaoke \(..\)/", $AddonsArray)){
			echo '<option selected="selected"> Karaoke Only</option>';
			}
			elseif (preg_grep("/Karaoke & Music /", $AddonsArray)){
			echo '<option selected="selected"> Karaoke & Music Videos Deal</option>';
			}
			else {
				echo '<option selected="selected"> None </option>';
				}
    ?>
            </select>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Optional Effect Addons</label>
          <div class="col-sm-8">
            <input type=checkbox name='question_2' value='100 Glow Sticks $15' disabled <?php echo (preg_grep("/100 Glow Sticks*/", $AddonsArray) ? 'checked' : '');?>>
            <input type=checkbox name='question_2' value='100 Glow Sticks $15' hidden <?php echo (preg_grep("/100 Glow Sticks*/", $AddonsArray) ? 'checked' : '');?>>
            100 Glow Sticks<br>
            
            <input type=checkbox name='question_2' value='Uplighting $30' disabled <?php echo (preg_grep("/Uplights*/", $AddonsArray) ? 'checked' : '');?>>
            <input type=checkbox name='question_2' value='Uplighting $30' hidden <?php echo (preg_grep("/Uplights*/", $AddonsArray) ? 'checked' : '');?>>
            Uplighting<br>
            
            
            <input type=checkbox <? if ($packageCode == '12837') echo 'hidden';?> name='question_2' value=' Large Strobe Light $25' disabled <?php echo (preg_grep("/Strobe*/", $AddonsArray) ? 'checked' : '');?>>
            
            <input type=checkbox hidden name='question_2' value=' Large Strobe Light $25' <?php echo (preg_grep("/Strobe*/", $AddonsArray) ? 'checked' : '');?>>
            
            
            <? if ($packageCode != '12837') echo 'Large Strobe Light<br>';?>
            
            <input type=checkbox <? if ($packageCode == '12837') echo 'hidden';?> name='question_2' value=' Professional Laser Show System $40' disabled <?php echo (preg_grep("/Professional Laser Show System*/", $AddonsArray) ? 'checked' : '');?>>
            
            <input type=checkbox hidden name='question_2' value=' Professional Laser Show System $40' <?php echo (preg_grep("/Professional Laser Show System*/", $AddonsArray) ? 'checked' : '');?>>
            
            
            <? if ($packageCode != '12837') echo 'Professional Laser Show System<br>';?>
            
            
          </div>
          <div class="clearfix"></div>
        </div>
        
        <div class="form-group">
          <label class="col-sm-4 control-label">Address of venue</label>
          <div class="col-sm-8">
            <input class="form-control width90hack" type=text name=question_4 size=30 maxlength=50 required>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Suburb
          </label>
          <div class="col-sm-8">
            <input class="form-control width90hack" type=text name=question_3 size=30 maxlength=50 readonly value="<?php echo $row['travel_suburb']?>">
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">For what age group is the event?</label>
          <div class="col-sm-8">
            <input class="form-control width90hack" type=text name=question_5 size=30 maxlength=50>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="form-group">
          <label class="col-sm-4 control-label">Staff Attire</label>
          <div class="col-sm-8">
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
        <div class="form-group"> 
        <label hidden class="col-sm-4 control-label">QuoteID</label>
        <div hidden class="col-sm-8"><input class="form-control width90hack" type=text readonly name=question_7 size=30 maxlength=50 value="<?php echo $row['quote_id']?>"></div>
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
                    
                    
            </div>
        </div>
    </div>
</div>
<?php 
//}

//else {
	//echo "Session not set";
//}
?>
</body>
</html>
