<? 
// connect to database 
include("include/conn.php"); 

//my SQL query strings
	$query_timezone = "SELECT * FROM TimeZone";
	@$result_time = mysql_query($query_timezone);
	@$numRows_time = mysql_num_rows($result_time);
$time_row = mysql_fetch_array($result_time);

$timezone = $time_row['TimeZone'];


$contest=$_GET['contestID'];
$cost=$_GET['cost'];
$tickets=$_GET['ticket'];
$date=date("m-d-Y"); 
$prefix=$contest.'-'.$date;
$error=$_GET['error'];
//echo $prefix;

$date = new DateTime("now", new DateTimeZone($time_row['TimeZone']) );
$now = $date->format('Y-m-d H:i:s');
$number1 = mt_rand(0, 10);
$number2 = mt_rand(0, 10);
//echo $number1;
//echo $number2;
//echo $now;

  //echo "Remote addr: " . $_SERVER['REMOTE_ADDR']."<br/>";



//my SQL query strings
	
	$query_selectAllItems = 'SELECT * FROM Ticket ORDER BY OrderNumber DESC LIMIT 1';
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$c_row = mysql_fetch_array($result_all);
	$orderNumber = $c_row['OrderNumber'] + 1;
	//echo ($orderNumber. "<br>");
	
	$query_ticket = 'SELECT * FROM Ticket ORDER BY TicketID DESC LIMIT 1';
	@$result_ticket = mysql_query($query_ticket);
	@$numRows_ticket = mysql_num_rows($result_ticket);
	$d_row = mysql_fetch_array($result_ticket);
	$ticketNumber = $d_row['TicketID'] + 1;
	$ticketNumber=$prefix.$ticketNumber;
	//echo $ticketNumber;
	
	$i = 1;
	while ($i <= $tickets) {
    $i++; 
	$ticketNumber++;
	//
	$query_insertItem = "INSERT INTO Ticket (TicketNumber, PurchasedTime, ContestID, OrderNumber) VALUES ('$ticketNumber', '$now', '$contest', '$orderNumber')";
	$dberror = "";
	$ret = mysql_query($query_insertItem);
	//echo $ticketNumber;
	


}





if ($contest == 1) {
    $text = "Daily Big Draw";
} elseif ($contest == 2) {
    $text = "Jumbo Weekly Draw";
} else {
    $text = "Monster Monthly Draw";
}

	

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
  <HEAD>
  
		<script src="js/modernizr.custom.63321.js"></script>
  <script language="Javascript">
<!--
//Slide Show script (this notice must stay intact)
//For this and more scripts
//visit java-scripts.net or http://wsabstract.com

if (document.images) {
     button1 = new Image
     button2 = new Image

     button1.src = 'images/home.png'
     button2.src = 'images/althome.png'
	 
	 button3 = new Image
     button4 = new Image

     button3.src = 'images/about.png'
     button4.src = 'images/altabout.png'
	 
	
	 
	 button7 = new Image
     button8 = new Image

     button7.src = 'images/contact.png'
     button8.src = 'images/altcontact.png'
	 
	 button9 = new Image
     button10 = new Image

     button9.src = 'images/tell.png'
     button10.src = 'images/alttell.png'
	
 }
//-->
</script>
<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>

        
  </HEAD>
<body>

<div id="menuheader"> 
<a href="index.php" onmouseover="document.rollover.src=button2.src" onmouseout="document.rollover.src=button1.src"><img src="images/home.png" border=0 name="rollover"></a>
<a href="about.php" onmouseover="document.rollover2.src=button4.src" onmouseout="document.rollover2.src=button3.src"><img src="images/about.png" border=0 name="rollover2"></a>
<a href="contact.php" onmouseover="document.rollover4.src=button8.src" onmouseout="document.rollover4.src=button7.src"><img src="images/contact.png" border=0 name="rollover4"></a><br>
 <a href="contact.php" onmouseover="document.rollover5.src=button10.src" onmouseout="document.rollover5.src=button9.src"><img src="images/tell.png" border=0 name="rollover4"></a><br>



</div>

                            


        <div id="logo">
<a href="index.php"><img src="images/logos.png" border="0"/></a>
        </div><br><br><br>
        
         <div class="content_images"><img src="images/images.png"></div>
        

 

<br><br>
        
       
        
        <div id="content_holder">
        

                 <form method="post" action="validatesale.php" class="smart-green">
                     <input name="number1" type="hidden" value="<? echo $number1 ?>">
                     <input name="number2" type="hidden" value="<? echo $number2 ?>">
                     <input name="desc" type="hidden" value="<? echo $text ?>">
                    <input name="orderAmount" type="hidden" value="<? echo $cost ?>">
                     <input name="orderNo" type="hidden" value="<? echo $orderNumber ?>">
    <h1>Buy  <? echo $text ?> Tickets - Total Cost <? echo $cost ?>
        <span>Please fill all the texts in the fields.</span>
    </h1>
  
        <input id="name" type="text" width="40px" name="firstName" placeholder="Your First Name"/><input id="name" type="text" name="lastName" placeholder="Your Last Name" />
   
        
        <input id="email" type="email" name="email" placeholder="Valid Email Address" />
        
        <input id="phone" type="text" name="phone" placeholder="Valid Phone" />

        <input id="street" type="text" name="address" placeholder="Your Street Address"/>

        <input id="City" type="text" name="city" placeholder="Your City" />
 
        <input id="state" type="text" name="state" placeholder="Your State" />
  
        <select name="country">
	<option value=''>Select Country</option>
	<option value="ALA">Åland Islands</option>
	<option value="ALB">Albania</option>
	<option value="DZA">Algeria</option>
	<option value="ASM">American Samoa</option>
	<option value="AND">Andorra</option>
	<option value="AGO">Angola</option>
	<option value="AIA">Anguilla</option>
	<option value="ATA">Antarctica</option>
	<option value="ATG">Antigua and Barbuda</option>
	<option value="ARG">Argentina</option>
	<option value="ARM">Armenia</option>
	<option value="ABW">Aruba</option>
	<option value="AUS">Australia</option>
	<option value="AUT">Austria</option>
	<option value="AZE">Azerbaijan</option>
	<option value="BHS">Bahamas</option>
	<option value="BHR">Bahrain</option>
	<option value="BGD">Bangladesh</option>
	<option value="BRB">Barbados</option>
	<option value="BLR">Belarus</option>
	<option value="BEL">Belgium</option>
	<option value="BLZ">Belize</option>
	<option value="BEN">Benin</option>
	<option value="BMU">Bermuda</option>
	<option value="BTN">Bhutan</option>
	<option value="BOL">Bolivia, Plurinational State of</option>
	<option value="BES">Bonaire, Sint Eustatius and Saba</option>
	<option value="BIH">Bosnia and Herzegovina</option>
	<option value="BWA">Botswana</option>
	<option value="BVT">Bouvet Island</option>
	<option value="BRA">Brazil</option>
	<option value="IOT">British Indian Ocean Territory</option>
	<option value="BRN">Brunei Darussalam</option>
	<option value="BGR">Bulgaria</option>
	<option value="BFA">Burkina Faso</option>
	<option value="BDI">Burundi</option>
	<option value="KHM">Cambodia</option>
	<option value="CMR">Cameroon</option>
	<option value="CAN">Canada</option>
	<option value="CPV">Cape Verde</option>
	<option value="CYM">Cayman Islands</option>
	<option value="CAF">Central African Republic</option>
	<option value="TCD">Chad</option>
	<option value="CHL">Chile</option>
	<option value="CHN">China</option>
	<option value="CXR">Christmas Island</option>
	<option value="CCK">Cocos (Keeling) Islands</option>
	<option value="COL">Colombia</option>
	<option value="COM">Comoros</option>
	<option value="COG">Congo</option>
	<option value="COD">Congo, the Democratic Republic of the</option>
	<option value="COK">Cook Islands</option>
	<option value="CRI">Costa Rica</option>
	<option value="CIV">Côte d'Ivoire</option>
	<option value="HRV">Croatia</option>
	<option value="CUB">Cuba</option>
	<option value="CUW">Curaçao</option>
	<option value="CYP">Cyprus</option>
	<option value="CZE">Czech Republic</option>
	<option value="DNK">Denmark</option>
	<option value="DJI">Djibouti</option>
	<option value="DMA">Dominica</option>
	<option value="DOM">Dominican Republic</option>
	<option value="ECU">Ecuador</option>
	<option value="EGY">Egypt</option>
	<option value="SLV">El Salvador</option>
	<option value="GNQ">Equatorial Guinea</option>
	<option value="ERI">Eritrea</option>
	<option value="EST">Estonia</option>
	<option value="ETH">Ethiopia</option>
	<option value="FLK">Falkland Islands (Malvinas)</option>
	<option value="FRO">Faroe Islands</option>
	<option value="FJI">Fiji</option>
	<option value="FIN">Finland</option>
	<option value="FRA">France</option>
	<option value="GUF">French Guiana</option>
	<option value="PYF">French Polynesia</option>
	<option value="ATF">French Southern Territories</option>
	<option value="GAB">Gabon</option>
	<option value="GMB">Gambia</option>
	<option value="GEO">Georgia</option>
	<option value="DEU">Germany</option>
	<option value="GHA">Ghana</option>
	<option value="GIB">Gibraltar</option>
	<option value="GRC">Greece</option>
	<option value="GRL">Greenland</option>
	<option value="GRD">Grenada</option>
	<option value="GLP">Guadeloupe</option>
	<option value="GUM">Guam</option>
	<option value="GTM">Guatemala</option>
	<option value="GGY">Guernsey</option>
	<option value="GIN">Guinea</option>
	<option value="GNB">Guinea-Bissau</option>
	<option value="GUY">Guyana</option>
	<option value="HTI">Haiti</option>
	<option value="HMD">Heard Island and McDonald Islands</option>
	<option value="VAT">Holy See (Vatican City State)</option>
	<option value="HND">Honduras</option>
	<option value="HKG">Hong Kong</option>
	<option value="HUN">Hungary</option>
	<option value="ISL">Iceland</option>
	<option value="IND">India</option>
	<option value="IDN">Indonesia</option>
	<option value="IRN">Iran, Islamic Republic of</option>
	<option value="IRQ">Iraq</option>
	<option value="IRL">Ireland</option>
	<option value="IMN">Isle of Man</option>
	<option value="ISR">Israel</option>
	<option value="ITA">Italy</option>
	<option value="JAM">Jamaica</option>
	<option value="JPN">Japan</option>
	<option value="JEY">Jersey</option>
	<option value="JOR">Jordan</option>
	<option value="KAZ">Kazakhstan</option>
	<option value="KEN">Kenya</option>
	<option value="KIR">Kiribati</option>
	<option value="PRK">Korea, Democratic People's Republic of</option>
	<option value="KOR">Korea, Republic of</option>
	<option value="KWT">Kuwait</option>
	<option value="KGZ">Kyrgyzstan</option>
	<option value="LAO">Lao People's Democratic Republic</option>
	<option value="LVA">Latvia</option>
	<option value="LBN">Lebanon</option>
	<option value="LSO">Lesotho</option>
	<option value="LBR">Liberia</option>
	<option value="LBY">Libya</option>
	<option value="LIE">Liechtenstein</option>
	<option value="LTU">Lithuania</option>
	<option value="LUX">Luxembourg</option>
	<option value="MAC">Macao</option>
	<option value="MKD">Macedonia, the former Yugoslav Republic of</option>
	<option value="MDG">Madagascar</option>
	<option value="MWI">Malawi</option>
	<option value="MYS">Malaysia</option>
	<option value="MDV">Maldives</option>
	<option value="MLI">Mali</option>
	<option value="MLT">Malta</option>
	<option value="MHL">Marshall Islands</option>
	<option value="MTQ">Martinique</option>
	<option value="MRT">Mauritania</option>
	<option value="MUS">Mauritius</option>
	<option value="MYT">Mayotte</option>
	<option value="MEX">Mexico</option>
	<option value="FSM">Micronesia, Federated States of</option>
	<option value="MDA">Moldova, Republic of</option>
	<option value="MCO">Monaco</option>
	<option value="MNG">Mongolia</option>
	<option value="MNE">Montenegro</option>
	<option value="MSR">Montserrat</option>
	<option value="MAR">Morocco</option>
	<option value="MOZ">Mozambique</option>
	<option value="MMR">Myanmar</option>
	<option value="NAM">Namibia</option>
	<option value="NRU">Nauru</option>
	<option value="NPL">Nepal</option>
	<option value="NLD">Netherlands</option>
	<option value="NCL">New Caledonia</option>
	<option value="NZL">New Zealand</option>
	<option value="NIC">Nicaragua</option>
	<option value="NER">Niger</option>
	<option value="NGA">Nigeria</option>
	<option value="NIU">Niue</option>
	<option value="NFK">Norfolk Island</option>
	<option value="MNP">Northern Mariana Islands</option>
	<option value="NOR">Norway</option>
	<option value="OMN">Oman</option>
	<option value="PAK">Pakistan</option>
	<option value="PLW">Palau</option>
	<option value="PSE">Palestinian Territory, Occupied</option>
	<option value="PAN">Panama</option>
	<option value="PNG">Papua New Guinea</option>
	<option value="PRY">Paraguay</option>
	<option value="PER">Peru</option>
	<option value="PHL">Philippines</option>
	<option value="PCN">Pitcairn</option>
	<option value="POL">Poland</option>
	<option value="PRT">Portugal</option>
	<option value="PRI">Puerto Rico</option>
	<option value="QAT">Qatar</option>
	<option value="REU">Réunion</option>
	<option value="ROU">Romania</option>
	<option value="RUS">Russian Federation</option>
	<option value="RWA">Rwanda</option>
	<option value="BLM">Saint Barthélemy</option>
	<option value="SHN">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="KNA">Saint Kitts and Nevis</option>
	<option value="LCA">Saint Lucia</option>
	<option value="MAF">Saint Martin (French part)</option>
	<option value="SPM">Saint Pierre and Miquelon</option>
	<option value="VCT">Saint Vincent and the Grenadines</option>
	<option value="WSM">Samoa</option>
	<option value="SMR">San Marino</option>
	<option value="STP">Sao Tome and Principe</option>
	<option value="SAU">Saudi Arabia</option>
	<option value="SEN">Senegal</option>
	<option value="SRB">Serbia</option>
	<option value="SYC">Seychelles</option>
	<option value="SLE">Sierra Leone</option>
	<option value="SGP">Singapore</option>
	<option value="SXM">Sint Maarten (Dutch part)</option>
	<option value="SVK">Slovakia</option>
	<option value="SVN">Slovenia</option>
	<option value="SLB">Solomon Islands</option>
	<option value="SOM">Somalia</option>
	<option value="ZAF">South Africa</option>
	<option value="SGS">South Georgia and the South Sandwich Islands</option>
	<option value="SSD">South Sudan</option>
	<option value="ESP">Spain</option>
	<option value="LKA">Sri Lanka</option>
	<option value="SDN">Sudan</option>
	<option value="SUR">Suriname</option>
	<option value="SJM">Svalbard and Jan Mayen</option>
	<option value="SWZ">Swaziland</option>
	<option value="SWE">Sweden</option>
	<option value="CHE">Switzerland</option>
	<option value="SYR">Syrian Arab Republic</option>
	<option value="TWN">Taiwan, Province of China</option>
	<option value="TJK">Tajikistan</option>
	<option value="TZA">Tanzania, United Republic of</option>
	<option value="THA">Thailand</option>
	<option value="TLS">Timor-Leste</option>
	<option value="TGO">Togo</option>
	<option value="TKL">Tokelau</option>
	<option value="TON">Tonga</option>
	<option value="TTO">Trinidad and Tobago</option>
	<option value="TUN">Tunisia</option>
	<option value="TUR">Turkey</option>
	<option value="TKM">Turkmenistan</option>
	<option value="TCA">Turks and Caicos Islands</option>
	<option value="TUV">Tuvalu</option>
	<option value="UGA">Uganda</option>
	<option value="UKR">Ukraine</option>
	<option value="ARE">United Arab Emirates</option>
	<option value="GBR">United Kingdom</option>
	<option value="USA">United States</option>
	<option value="UMI">United States Minor Outlying Islands</option>
	<option value="URY">Uruguay</option>
	<option value="UZB">Uzbekistan</option>
	<option value="VUT">Vanuatu</option>
	<option value="VEN">Venezuela, Bolivarian Republic of</option>
	<option value="VNM">Viet Nam</option>
	<option value="VGB">Virgin Islands, British</option>
	<option value="VIR">Virgin Islands, U.S.</option>
	<option value="WLF">Wallis and Futuna</option>
	<option value="ESH">Western Sahara</option>
	<option value="YEM">Yemen</option>
	<option value="ZMB">Zambia</option>
	<option value="ZWE">Zimbabwe</option>
</select>

        <input id="zip" type="text" name="zip" placeholder="Your postal" />

        <input id="card" type="text" name="cardNo" placeholder="Card Number" />

        <select name='cardExpireMonth' id='expireMM'>
    <option value=''>Month</option>
    <option value='01'>January</option>
    <option value='02'>February</option>
    <option value='03'>March</option>
    <option value='04'>April</option>
    <option value='05'>May</option>
    <option value='06'>June</option>
    <option value='07'>July</option>
    <option value='08'>August</option>
    <option value='09'>September</option>
    <option value='10'>October</option>
    <option value='11'>November</option>
    <option value='12'>December</option>
</select> 

        <select name='cardExpireYear' id='expireYY'>
    <option value=''>Year</option>
    <option value='2016'>2016</option>
    <option value='2017'>2017</option>
    <option value='2018'>2018</option>
    <option value='2019'>2019</option>
    <option value='2020'>2020</option>
    <option value='2021'>2021</option>
</select> 

        <input id="cvv" type="password" name="cardSecurityCode" placeholder="CVV" />
                    
<input type="submit" value="Buy Now">
    
    
</form>
            

  </div>
       
       
       
      <br><br> 
 

 
 
 <div class="content_prizes"><center>
                <table><tr><td>
                
                <img src="images/car.png"><td>
 </td><td><img src="images/plane.png"></td>
 <td><img src="images/ring.png"></td>
  <td><img src="images/dinner.png"></td>
   <td><img src="images/sports.png"></td></tr></table></center></div>

<?php
// connect to database 
require("footer.php"); 

?>








	


	
        
  </body>
</HTML>