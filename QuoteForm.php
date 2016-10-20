<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Quote Form</title>
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
</style>
<?php include_once "quoteGeneratorSettings.php";
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');
?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>


<div id="masterContainer">
<div class="row">
<div class="
col-xs-8 col-xs-offset-2
col-sm-8 col-sm-offset-2
col-md-8 col-md-offset-2
col-lg-6 col-lg-offset-3" >


<div class="row" style="margin-bottom:20px">
<div class="
col-xs-1 
col-sm-1 
col-md-1 
col-lg-1 
clearfix" >
<a href="http://www.discobuzz.com.au/wp-discobuzz/" type="button" class="btn btn-info pull-left">
<span class="glyphicon glyphicon-arrow-left"></span> Back to Disco Buzz SIte
</a>
</div>
<div class=
"col-xs-3 col-xs-offset-8
col-sm-3 col-sm-offset-8
col-md-3 col-md-offset-8
col-lg-3  col-lg-offset-8
clearfix  col-sm-offset-7" >

<a href="QuoteAllInOnePage.php" class="btn btn-info pull-right" role="button">
<span class="glyphicon glyphicon-calendar"></span> Select a new date
</a>
</div>
</div>

<?php 
  		if(isset($_SESSION['day'], $_SESSION['month'], $_SESSION['year']))
	{
		$day = ($_SESSION["day"]);
		$month = ($_SESSION["month"]);
		$year = ($_SESSION["year"]);
		
	if (isset($_GET["avil"]) and (trim($_GET["avil"]) == '1')){
		$_SESSION["status"] = "1";
	?>
<div class="row">    
<div class="alert alert-success" align="center">
<div class="glyphicon glyphicon glyphicon-ok" style="font-size:300%"></div>
<h4>Good news! we are avilable for your date: <?php echo $day.'/'.$month.'/'.$year ?>. <br> Proceed with an instant quote below.</h4>

</div>
</div>

</div>
</div>
</div>


    <?php
	}//End is avil
	
	else if (isset($_GET["avil"]) and (trim($_GET["avil"]) == '0')){
		$_SESSION["status"] = "0";
		?>
  		
        
        <div class="alert alert-info" align="center">
        <div class="glyphicon glyphicon-remove" style="font-size:300%"></div><br>
        <strong>Sorry,</strong> It seems we already have an event booked for <?php echo $day.'/'.$month.'/'.$year ?>.
       <br> <a href="QuoteAllInOnePage.php" style="margin:10px" class="btn btn-info" role="button"><span class="glyphicon glyphicon-calendar"></span>Select a new date</a><br>
         <strong>However</strong> we are willing to attend two events per day, timing permitting. </h3><br>
        This system is automatic, so please fill out a booking inquiry and we will manually check times and see if we can fit your event in!<br>
        </div>
</div>
</div>
        <?php
	}
	
	 
	
	require_once "QuoteFormContents.php";
	
	
	
	
	//End is not avil 
}//End is date set


	else {?>
	<div class="alert alert-warning" align="center" style="font-size:large">
        <div class="glyphicon glyphicon-exclamation-sign"></div>
        <strong>Oops!</strong> Please check availability first.
       <br> <a href="QuoteAllInOnePage.php" style="margin:10px" class="btn btn-warning" role="button">Check availability</a>
        </div>
	<?php
	}
	?>
    

</div>
</body>
</html>                                		