<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CheckAvil</title>
<script src="jquery-2.1.0.min.js"></script>
<script src="checkApp.js"></script>
</head>
<?php 
session_start();
?>
<body>

<!-- BEGIN DJEVENTPLANNER CODE -->
<form method=post action=checkAvilProcess.php id="djep-checkAvil-form">
  <table align=center cellpadding=5 cellspacing=0 border=0 style='border-collapse:collapse;' width=410>
    <tr>
      <td align=center style='font-size:10pt;font-family:Verdana;color:#000000;background-color:#F1F571;'><b>Check Availability</td>
    </tr>
    <tr>
      <td align=center style='font-size:10pt;font-family:Verdana;color:#000000;background-color:#FFFFFF;'>Select the date of your event. Then click on the check availability button to instantly check for our availability.</td>
    </tr>
    <tr>
      <td align=center style='font-size:10pt;font-family:Verdana;color:#000000;background-color:#FFFFFF;'><select name=day id="day">
          <option value=-43>Day
          <option value=1>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
          <option value=7>7</option>
          <option value=8>8</option>
          <option value=9>9</option>
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
        <select name=month id="month">
          <option value=-43>Month</option>
          <option value=1>January</option>
          <option value=2>February</option>
          <option value=3>March</option>
          <option value=4>April</option>
          <option value=5>May</option>
          <option value=6>June</option>
          <option value=7>July</option>
          <option value=8>August</option>
          <option value=9>September</option>
          <option value=10>October</option>
          <option value=11>November</option>
          <option value=12>December</option>
        </select>
        <select name=year id="year">
          <option value=-43>Year</option>
          <option value=2015>2015</option>
          <option value=2016>2016</option>
          <option value=2017>2017</option>
          <option value=2018>2018</option>
          <option value=2019>2019</option>
          <option value=2020>2020</option>
          <option value=2021>2021</option>
        </select>
        <input type=hidden name=djidnumber value='6121'>
        
        <div id="submit">
        <input type=submit value="Check Availability">
        </div>
        <div id="message">
        Invalid Date Selection
        </div>
        </td>
    </tr>
  </table>
</form>
<!-- END DJEVENTPLANNER CODE -->

</body>
</html>
