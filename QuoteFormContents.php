<div class="form_quote_contain" align="center">
<h1>Get a Quote</h1>
    <form id="quoteForm" method="post" action="QuoteResult.php">
    
    	<div class="light_line">
        <div class="row row-centered" style="padding:20px">
        <div class="col-xs-12">
        <h4>Select Package:</h4>
        </div>
        </div>
        <div class="row row-centered" style="padding-top:20px">
        <div class="col-xs-12 col-sm-6">
        <img src="images/Large-PackwOprice.jpg" width="350" height="247" alt=""/> 
        <div style="padding-top:20px">
        
            
            
        <label for="Small Package">Small Package </label>
        <input type="radio" name="package" id="Small Package" value="small" required>
      	
        
      </div>
      Best for smaller events
      </div>
      
      <div class="col-xs-12 col-sm-6">
      <img src="images/Large-PackwOprice.jpg" width="350" height="247" alt=""/> 
      <div style="padding-top:20px">
      
      	<label for="Large Package">Large Package </label>
        <input type="radio" name="package" id="Large Package" value="large" required>
        
      
      </div>
      Best for larger events
      </div>
      </div>
      </div>
      
       <div class="light_line">
       <div class="row row-centered" style="padding:20px">
       <div class="col-xs-12">
    	<h4>Select Item Addons:</h4>
       </div>
       </div>
       
       <div class="row row-centered" style="padding:20px">
       <div class="form-group">
       
    
            <?php
          //Update number of items below
          for ($row = 0; $row < $numberOfAddons; $row++) {
			  ?>
              <div class="col-xs-12 col-sm-6 col-md-3">
              <img src="images/iconbee.png" width="86" height="86" alt=""/>
              <div style="padding-top:20px">
              
              <?php
            echo "<label for=\"". $addonsArray[$row][0]."\" class=\"" . $addonsArray[$row][2]. "\">". $addonsArray[$row][0]. "<span class=\"".$addonsArray[$row][3]."\"> ($".$addonsArray[$row][1].") </span> 
            
            <span class=\"".$addonsArray[$row][3]."included\"></span>
            
            </label>";  
            echo "<input type=\"checkbox\" name=\"ItemAddons[]\" id=\"" . $addonsArray[$row][0]. "\" class=\"" . $addonsArray[$row][2]. "\" value=\"" . $addonsArray[$row][0]. "\"><br>";
    		?>
            </div>
            </div>
			<?php
            }
          ?>
      
      
      </div>
      </div>
      </div>
      
      
      
      
      <div class="light_line">
      <div class="row row-centered" style="padding:20px">
      <div class="col-xs-12">
    	<h4>Select Karaoke Addons:</h4>
      </div>
      </div>
        
      <div class="row row-centered" style="padding:20px">
      <div class="form-group">
      <div class="col-xs-12 col-sm-6 col-md-3">
      
      <img src="images/iconbee.png" width="86" height="86" alt=""/>
      <div style="padding-top:20px">
    		<?php
			  //Update number of items below
			  echo "<input type=\"radio\" name=\"KaraokeAddons[]\" value=\"\"> None <br>";?>
			  </div>
              </div>
              
			  
              <?php
			  for ($row = 0; $row < $numberOfKaraoke; $row++) { ?>
              <div class="col-xs-12 col-sm-6 col-md-3">
              <img src="images/iconbee.png" width="86" height="86" alt=""/>
              <div style="padding-top:20px">
				<?php  
				echo "<input type=\"radio\" name=\"KaraokeAddons[]\" value=\"" . $karaokeArray[$row][0]. "\"> ".$karaokeArray[$row][0]." ($".$karaokeArray[$row][1].") <br>";
		?> 
        </div>
        </div>
			<?php	}
			  ?>
    
      </div>
      </div>
      </div>
      
      <div class="light_line">
      <div class="row">
    
      <div class="col-xs-6 col-sm-6">
      <div class="form-group">
 
            <label for="req_start_time">Event Start Time:</label>
  			<select name='req_start_time' class="form-control" id="req_start_time" required>
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
       	 </div>
         
         <div class="col-xs-6 col-sm-6">
        
        <div class="form-group">
            <label for="req_end_time">Event End Time:</label>
  			<select name='req_end_time' class="form-control" id="req_end_time" required>
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

    
    </form>
    
    </div>