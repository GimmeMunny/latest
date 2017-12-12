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
//echo $prefix;

$date = new DateTime("now", new DateTimeZone($time_row['TimeZone']) );
$now = $date->format('Y-m-d H:i:s');



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
<!DOCTYPE html> 
<html> 
<!--  Noir HTML5 mobile template  www.QRdvark.com  10jun11  -->
<!-- 'Noir' by Azalea Software, Inc. is licensed under the Creative Commons Attribution 3.0 Unported License (CC BY 3.0) -->

<head>
<!--  the title tag is extremely important in search engine optimization (SEO)  -->
<title>gimmemnunny.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>
<link href="style.css" rel="stylesheet" type="text/css"/>
<!-- you can apply different style sheets for mobile vs. computer browsers -->
<!--  <link href="style-mobile.css" rel="stylesheet" type="text/css" media="handheld" > -->
<!--  <link href="style-computer.css" rel="stylesheet" type="text/css" media="screen" > -->
<!--  the favicon & iOS home screen icon are both 57x57 PNG's. Use a full URL file path for Android devices.  -->
<!--  <link rel="apple-touch-icon-precomposed" href="http://yoursite.com/apple-touch-icon.png"/>  -->
<!--  <link rel="icon" type="image/vnd.microsoft.icon" href="http://yoursite.com/favicon.png" />  -->
<!--  always make a site map for your mobile site  www.xml-sitemaps.com  -->
<!--  <link rel="alternate" type="application/rss+xml" title="ROR" href="ror.xml" /> -->
</head>

<body>
<div class="header">
	<div id="navButtons"><br>
		<ul>
        
			<li><a href="index.html">&nbsp;&nbsp;home</a></li>
			<li><a href="page.php">about</a></li>
            <li><a href="page.php">contact</a></li>
		</ul>
	</div>
   

	<center><img src="images/logo.png" alt="logo" /></center>


<br><br><hr>

        
  
      <center>
      
      
<form method="post" action="https://sale.alliedwallet.com/custompay.aspx" class="smart-green">
        <input name="MerchantID" type="hidden" value="b5418e23-f5a7-4e0b-8834-c81c235af6b1">
<input name="SiteID" type="hidden" value="360a1986-f2bd-4dd5-8dfe-a10e64eda060">
    <h1>Buy  <? echo $text ?> Tickets - Total Cost <? echo $cost ?>
        <span>Please fill all the texts in the fields.</span>
    </h1>
    <label>
  
        <span>Your First Name :</span>
        <input id="name" type="text" name="FirstName" placeholder="Your First Name"/>
    </label>
     <label>
        <span>Your Last Name :</span>
        <input id="name" type="text" name="LastName" placeholder="Your Last Name" />
    </label>
    <label>
        <span>Your Email :</span>
        <input id="email" type="email" name="Email" placeholder="Valid Email Address" />
    </label>
       
   
    

<input name="AmountTotal" type="hidden" value="<? echo $cost ?>">
<input name="CurrencyID" type="hidden" value="USD">
<input name="AmountShipping" type="hidden" value="0"> 
<input name="ShippingRequired" type="hidden" value="1">
<input name="NoMembership" type="hidden" value="1">  
<input name="ItemName[0]" type="hidden" value="Tickets">
<input name="ItemQuantity[0]" type="hidden" value="1">
<input name="ItemDesc[0]" type="hidden" value="<? echo $text ?>">
<input name="ItemAmount[0]" type="hidden" value="<? echo $cost ?>">
<input name="MerchantReference" type="hidden" value="<? echo $orderNumber ?>">
<input name="ReturnURL" type="hidden" value="http://www.gimmemunny.com/mobile/return.php">
<input name="ConfirmURL" type="hidden" value="http://www.gimmemunny.com/confirm.php">
<input name="DeclineURL" type="hidden" value="http://www.gimmemunny.com/decline.php">
<input type="submit" value="Buy Now"></form>
    
    
</form>
                
                
                
                </center><br><br>
<!--  don't forget to borrow the Facebook, Twitter, RSS, and Creative Commons icons  -->
<?php
// connect to database 
require("footer.php"); 

 

?>

  
</body>
</html>