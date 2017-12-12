<? 
// connect to database 
include("include/conn.php");

$ordernumber=$_GET['MerchantReference'];


//get company info
$query_company = "SELECT * FROM Company";
@$result_company = mysql_query($query_company);
@$numRows_company = mysql_num_rows($result_company);
$company_row = mysql_fetch_array($result_company);
$company = $company_row['CompanyName'];
$companyurl = $company_row['CompanyURL'];
$companyemail = $company_row['CompanyEmail'];
$companynoreplyemail = $company_row['CompanyNoReplyEmail'];
$companysplit = $company_row['CompanySplit'];
$timezone = $company_row['CompanyTimeZone'];
$date = new DateTime("now", new DateTimeZone($company_row['CompanyTimeZone']) );
$now = $date->format('Y-m-d');
$time = $date->format('H');


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
        

 


        
       
        
        <div id="content_holder">
        <center>
                <div class="drop-shadow-content3 raised">
                <table width="900"><tr align="center"><td>
  
      <b><h2>Thank you for playing <? print $company ?>!!</h2></b><br><br>
      
      Here are your ticket numbers:<br><br>

                 <?php
	
		
	$query_order = "SELECT * FROM Ticket WHERE OrderNumber='$ordernumber'";
	$result_order = mysql_query($query_order);
	
	//We are sending mail to customer to give them ticket numbers.
	
$subject = 'Here are your ticket numbers!';
$message = "Thank you for joining GimmeMunny!  Here are your ticket numbers, and Good Luck!!\n";

	
//output each ticket
  while ($row = mysql_fetch_array($result_order)){
$message = $message . 'TicketNumber:  ' . ($row['TicketNumber']) . "\n";
echo ($row['TicketNumber']) . "<br>";
 	$email = ($row['Email']);
	$to      = $email;
  }
 
	mail($to, $subject, $message);


?>
</td></tr></table><br>
You will be receiving an email with these in a moment.  Please watch your emails for the winner's announcement!<br>

<br>

Gimmemunny.com is U.K. an E.U. based online wagering company and is the world's first and ONLY fully automated online 50/50 eRaffle draw. Gimmemunny.com GUARANTEES A SINGLE WINNING TICKET is randomly and electronically drawn from each draw every time. Gimmemunny.com is NOT a lottery. In certain circumstances lotteries might not have a winning ticket for weeks and winnings at times may have multiple ticket winners - with gimmemunny.com - we only ever have a single winning ticket each draw - GUARANTEED! <br><br>

Additionally, Gimmemunny.com donates a portion of our ticket sales to various children's healthcare charities; and as such, we provide an accurate and up to date window to present how much we have donated. This charity window is directly linked in real-time to each ticket purchase and we keep a running tab online. Upon written request we can provide which children's charity and how much we have donated. At Gimmemunny.com our mission is "To make people wealthy, while keeping children healthy". Whether you are in Real Estate, Pawn Shop, Jewellery, Automotive Restoration, Professional Sports, Amateur Sports or Charity Organization - click on the "Contact US" button and email our Franchisee Group or Charity Sales group to discuss acquiring your own software license. In some circumstances we can assist you with financing.


  </div>
  
  </center>
       
       
       
       

 <div class="separator"></div>
 

 
 
 <div class="content_prizes">
                <table><tr><td>
                
                <img src="images/car.png"><td>
 </td><td><img src="images/plane.png"></td>
 <td><img src="images/ring.png"></td>
  <td><img src="images/dinner.png"></td>
   <td><img src="images/sports.png"></td></tr></table></div>

<?php
// connect to database 
require("footer.php"); 

?>








	


	
        
  </body>
</HTML>