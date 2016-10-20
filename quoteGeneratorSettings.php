<?php
// Quote Settings

/// Travel Fee Distances km
$Charge0KM = 20;
$Charge1KM = 20;
$Charge2KM = 30;
$Charge3KM = 40;
$Charge4KM = 50;
$Charge5KM = 60;
$Charge6KM = 70;
$Charge7KM = 75;

/// Travel Fee Charges $
$Charge1 = 0;
$Charge2 = 10;
$Charge3 = 15;
$Charge4 = 15;
$Charge5 = 20;
$Charge6 = 25;
$Charge7 = 25;

//Deposit
$depost = 100;

//Overtime Rate after 1am
$rateAfter1am = 110;

// Small Package
$smallDefultLength = 3;
$smallPackagePrice = 310;
$smallPackageOvertimePrice = 90;

// Large Package
$largeDefultLength = 3;
$largePackagePrice = 380;
$largePackageOvertimePrice = 90;

//Addons
// Update name and price here
// Also update number of elements on form to display.

$addonsArray = array
  (
  
  array("100 Glow Sticks",15, "notIncludedInLarge", "NotincludedInLargePrice"),
  array("Large Strobe",25, "includedInLarge", "includedInLargePrice"),
  array("Uplights",30, "notIncludedInLarge", "NotincludedInLargePrice"),
  array("Professional Laser Show System",40, "includedInLarge", "includedInLargePrice")
  );
  
  $numberOfAddons = 4;
  
  $karaokeArray = array
  (
  
  array("Karaoke",70),
  array("Music Videos",50),
  array("Karaoke & Music Videos Deal",90),
  
  );
  
  $numberOfKaraoke = 3;
  
  /**
 * These are the database login details
 */
 $db_in_use = 'DiscoBuzzServer';
 
 if ($db_in_use == 'DiscoBuzzServer'){
define("HOST", "localhost");     // The host you want to connect to.
define("USER", "discobuz_quote");    // The database username.
define("PASSWORD", "discobuzz01");    // The database password.
define("DATABASE", "discobuz_quote");    // The database name.

define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!

 }
 
 else if ($db_in_use == 'local'){
	 echo 'LOCAL';
	 
define("HOST", "localhost");     // The host you want to connect to.
define("USER", "dbQuote");    // The database username.
define("PASSWORD", "discobuzz01");    // The database password.
define("DATABASE", "DiscoBuzzQuote");    // The database name.

define("CAN_REGISTER", "any");
define("DEFAULT_ROLE", "member");

define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
 
 }
$dbqdb = new mysqli(HOST, USER, PASSWORD, DATABASE);


//$addonsArray = array("100 Glow Sticks"=>"15", "Large Strobe"=>"25", "Uplights"=>"30", "Professional Laser Show System"=>"40");


//End Settings

//echo 'QUOTE GEN FILE CALLED';
?>