<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>CheckAvil</title>
 <!-- Bootstrap -->
<link href="styles/bootstrap.min.css" rel="stylesheet">
<script src="js/jquery-2.1.0.min.js"></script>
<script src="js/QuoteAllInOnePage.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="jQueryAssets/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="jQueryAssets/jquery.ui-1.10.4.datepicker.min.js" type="text/javascript"></script>
<style type="text/css">
    #checkAvilFormContain{
    	margin: 20px;
    }
	#masterContainer{
    	margin: 20px;
		text-align:center;
	}
	
	h2, h1, h4 {
    font-family: "Verdana", Arial, sans-serif;
	
	
}
	

</style>
<link href="jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<?php 
session_start();

?>
<body>

<div id="masterContainer">
<div class="row">
<div class="col-xs-10 col-xs-offset-1
col-md-8 col-md-offset-2
col-lg-6 col-lg-offset-3" >


<div class="row" style="margin-bottom:20px">
<div class="col-xs-1 
col-md-1 
col-lg-1 " >
<a href="http://www.discobuzz.com.au/wp-discobuzz/" type="button" class="btn btn-info">
<span class="glyphicon glyphicon-arrow-left"></span> Back to Disco Buzz SIte
</a>
</div>
</div>


<div id="page1" align=center>
<img src="http://www.discobuzz.com.au/wp-discobuzz3/wp-content/uploads/2015/11/DiscoBuzzrecLogoNoSite1.png" class="img-responsive" width="350" height="136" alt=""/>
<div class="alert alert-success" align="center" style="padding-top:0px">
  <h2>Instant Quote System </h2>


Check Availability, Get an Instant Quote & Book your event online.<br> To get started, enter your event date below:

</div>

<div class="row">

<div class="col-lg-12" id="checkAvilFormCal" align=center> 
<!--Calender Here-->
<div id="selectedDatepicker"></div>
</div>
   
<div class="col-lg-12" id="checkAvilFormContain" align=center> 

 
<form method=post id="checkAvilForm" class="form-inline" action="checkAvilProcess.php">
      
        <div id ="dayDiv" class="form-group">
       
       
            <label class="sr-only" for="Day">Day</label>
            <select class="form-control" name="day" id="Day" placeholder="Day">
              <option value=-43>Day </option>
              <option value=01>1</option>
              <option value=02>2</option>
              <option value=03>3</option>
              <option value=04>4</option>
              <option value=05>5</option>
              <option value=06>6</option>
              <option value=07>7</option>
              <option value=08>8</option>
              <option value=09>9</option>
              <option value=10>10</option>
              <option value=11>11</option>
              <option value=12>12</option>
              <option value=13>13</option>
              <option value=14>14</option>
              <option value=15>15</option>
              <option value=16>16</option>
              <option value=17>17</option>
              <option value=18>18</option>
              <option value=19>19</option>
              <option value=20>20</option>
              <option value=21>21</option>
              <option value=22>22</option>
              <option value=23>23</option>
              <option value=24>24</option>
              <option value=25>25</option>
              <option value=26>26</option>
              <option value=27>27</option>
              <option value=28>28</option>
              <option value=29>29</option>
              <option value=30>30</option>
              <option value=31>31</option>
		 </select>
           	<span id="dayError1"></span>
            
        
      
        
        </div>
        <div id ="monthDiv" class="form-group">
       
      
            <label class="sr-only" for="Month">Month</label>
            <select class="form-control" name="month" id="Month" placeholder="Month">
              <option value=-43>Month</option>
              <option value=01>January</option>
              <option value=02>February</option>
              <option value=03>March</option>
              <option value=04>April</option>
              <option value=05>May</option>
              <option value=06>June</option>
              <option value=07>July</option>
              <option value=08>August</option>
              <option value=09>September</option>
              <option value=10>October</option>
              <option value=11>November</option>
              <option value=12>December</option>
        	</select>
        	<span id="monthError1"></span>
            
        
        </div>
         <div id ="yearDiv" class="form-group">
        
            <label class="sr-only" for="Year">Year</label>
            <select class="form-control" name="year" id="Year" placeholder="Year">
              <option value=-43 selected="selected">Year</option>
          	  <option id="d0"></option>
              <option id="d1"></option>
              
            
            </select>
            <span id="yearError1"></span>
            
       </div>
       
       
       <button type="submit" class="btn btn-primary" >Check</button>
    </form>
     <span id="dayError2">Please select a day</span>
     <span id="monthError2" class='help-block'>Please select a month</span>
     <span id="yearError2">Please select a year</span>
       </div>
    
        
    </div> 
  </div>
    
    <div id="formMessages">
    
    </div>
    
    <div id="quoteoutput">
    
    </div>   
 
    </div>
<script type="text/javascript">

var d = new Date(); 
			var d0 = (d.getFullYear() ); 
			var d1 = (d.getFullYear() + 1 ); 
			//var d2 = (d.getFullYear() + 2 ); 
			
			document.getElementById("d0").innerHTML = d0; 
			document.getElementById("d1").innerHTML = d1; 



$(function() {
        $('#selectedDatepicker').datepicker({
			dateFormat: "dd/mm/yy",
    beforeShow: readSelected, onSelect: updateSelected,
    minDate: new Date(d0, 1 - 1, 1), maxDate: new Date(d1, 12 - 1, 31),
    showOn: 'both'});
     
// Prepare to show a date picker linked to three select controls
function readSelected() {
    $('#selectedDatepicker').val($('#Day').val() + '/' +
        $('#Month').val() + '/' + $('#Year').val());
    return {};
}
 
// Update three select controls to match a date picker selection
function updateSelected() {
    var date1 = $(this).val();
    console.log(date1.substring(0, 2));
    console.log(date1.substring(3, 5));
    console.log(date1.substring(6, 10));
    $('#Day').val(date1.substring(0, 2));
	$('#Month').val(date1.substring(3, 5));
    $('#Year').val(date1.substring(6, 10));
}
    
    $('select').change(readSelected);
    
    });


</script>
</body>
</html>
