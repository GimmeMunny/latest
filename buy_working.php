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
$number1 = mt_rand(0, 10);
$number2 = mt_rand(0, 10);
echo $number1;
echo $number2;



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
        

                 <form method="post" action="https://sale.alliedwallet.com/custompay.aspx" class="smart-green">
        <input name="MerchantID" type="hidden" value="b5418e23-f5a7-4e0b-8834-c81c235af6b1">
<input name="SiteID" type="hidden" value="93648a0f-6504-44ab-ad33-767cc6d78d1a">
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
       
   <label>
        <span><? echo $number1 ?> + <? echo $number2 ?> :</span>
        <input id="add" type="add" name="add" placeholder="Valid Email Address" />
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
<input name="ReturnURL" type="hidden" value="http://www.gimmemunny.com/return.php">
<input name="ConfirmURL" type="hidden" value="http://www.gimmemunny.com/confirm.php">
<input name="DeclineURL" type="hidden" value="http://www.gimmemunny.com/decline.php">
<input type="submit" value="Buy Now"></form>
    
    
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