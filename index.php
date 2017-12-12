<?php
// connect to database 
include("include/conn.php"); 


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
$now = $date->format('Y-m-d H:i');

$today = $date->format('Y-m-d');

$time = $date->format('H');

	//get current contest amounts
	$query_selectAllItems = "SELECT * FROM ContestAmount WHERE '$now' between DrawingStart and DrawingEnd";
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);

	setlocale(LC_MONETARY, 'en_US');

	
	
//output each row for contest amounts
  while ($contest_row = mysql_fetch_array($result_all)){

      $cid = $contest_row['ContestID'];
	  if ($cid == '1')
	  {	  	
	  	$daily = $contest_row['Amount'];
		$dailystatus = $contest_row['Status'];
          $dailydrawingdate = $contest_row['Date'];
		}

	    if ($cid == '2')
	{
		  
		  $weekly = $contest_row['Amount'];
		  $weeklystatus = $contest_row['Status'];
            $weeklydrawingdate = $contest_row['Date'];

	  }
	    if ($cid == '3')
	  {
		  $monthly = $contest_row['Amount'];
		  $monthlystatus = $contest_row['Status'];
            $monthlydrawingdate = $contest_row['Date'];
	}
	  
	 }
  
  

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
  <HEAD>
  <title>Gimmemunny.com</title>
  
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
     
     button11 = new Image
     button12 = new Image

     button11.src = 'images/message.png'
     button12.src = 'images/altmessage.png'
	
 }
//-->
</script>
<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>

        
  </HEAD>
<body>

<div id="menuheader"> 
<a href="index.php" onmouseover="document.rollover.src=button2.src" onmouseout="document.rollover.src=button1.src"><img src="images/home.png" border=0 name="rollover"></a>
<a href="page.php?id=49" onmouseover="document.rollover2.src=button4.src" onmouseout="document.rollover2.src=button3.src"><img src="images/about.png" border=0 name="rollover2"></a>
<a href="contact.php" onmouseover="document.rollover4.src=button8.src" onmouseout="document.rollover4.src=button7.src"><img src="images/contact.png" border=0 name="rollover4"></a>
    <br>
 <a href="contact.php"><img src="images/tell.png" border=0></a><br>



</div>

                            


        <div id="logo">
<a href="index.php"><img src="images/logos.png" border="0"/></a>
        </div><br><br><br>
        
         <div class="content_images"><center>
             <table><tr><td>
             
                 <img src="images/images.png">&nbsp;&nbsp;</td><td valign="top"><a href="page.php?id=52"><img src="images/pres.jpg" border="0"></a><br><a href="page.php?id=46" onmouseover="document.rollover5.src=button12.src" onmouseout="document.rollover5.src=button11.src"><img src="images/message.png" border=0 name="rollover5"></a></td></div></tr></table></center>
            
        

 


        
       
        
        <div id="content_holder">
        
                <div class="ticket raised">
  
      <center>
      
      

                <table align="center" width="410"><tr><td><img src="images/daily_stack.png"></td>
                <?
				if ($dailystatus=='disabled')
				{
					?><tr><td>
				UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>This drawing is coming soon!  Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	
				<?
                
                }
				if (($time=='20')&&($dailydrawingdate==$today))
				{
					?><tr><td>
				UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>Drawing will resume in an hour.  Please check back!</b> <br><br><br><br><br><br><br><br>
</td>
				<?
				}
				else
				
				{
					
					//contest stuff
	$query_selectcontest = "SELECT * FROM Contest";
	@$result_contest = mysql_query($query_selectcontest);
	@$numRows_contest = mysql_num_rows($result_contest);
//output each row 
  while ($contest = mysql_fetch_array($result_contest)){
$cid = $contest['ContestID'];
	  if ($cid == '1')
	  {	 
	  $price=$contest['Price'];
	  $price2=$contest['Bundle1Price'];
	  $price3=$contest['Bundle2Price'];
          $number = $contest['NumberTickets'];
          
	  }
	  if ($cid == '2')
	  {	 
	  $price_weekly=$contest['Price'];
	  $price2_weekly=$contest['Bundle1Price'];
	  $price3_weekly=$contest['Bundle2Price'];
          $weekly_number = $contest['NumberTickets'];
	  }
	    if ($cid == '3')
	  {	 
	  $price_monthly=$contest['Price'];
	  $price2_monthly=$contest['Bundle1Price'];
	  $price3_monthly=$contest['Bundle2Price'];
            $monthly_number = $contest['NumberTickets'];
	  }
  }		
					
					?>
<td align="center"><br><br><b><h3>Current Jackpot:  <br><? print money_format('%(#10n', $daily) ?></b></h3> <br><br>
<a href="buy.php?contestID=1&ticket=1&cost=<? print $price ?>" class="button orange">1 Ticket for <? print money_format('%n', $price) ?></a><br>
<a href="buy.php?contestID=1&ticket=3&cost=<? print $price2 ?>" class="button blue">3 Tickets for <? print money_format('%n', $price2) ?></a><br>
<a href="buy.php?contestID=1&ticket=5&cost=<? print $price3 ?>" class="button green">5 Tickets for <? print money_format('%n', $price3) ?></a><br><br></td></tr>
<tr><td colspan="2" align="center">
<h3><b><? echo $number; ?> </b></h3>
</td>


<?
	 
				}
				
				
				?>
    </tr></table>             
<div>
	 
	
</div>
        </div></center>

     
        
                        <div class="ticket raised"><center>
               <table align="center" width="412"><tr><td><img src="images/weekly_stack.png"></td>
                
                <?
				if ($weeklystatus=='disabled')
				{
					?>
				<tr><td>UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>This drawing is coming soon!   Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
                
                }
				if (($time=='20')&&($weeklydrawingdate==$today))
				{
					?>
				<tr><td>UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>Drawing will resume in an hour.  Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
				}
				else
				{
					
					
					
					?>
                    
                    
                   <td align="center"><br><br><b><h3>Current Jackpot:  <br><? print money_format('%(#10n', $weekly) ?></b></h3> <br><br>
<a href="buy.php?contestID=2&ticket=1&cost=<? print $price_weekly ?>" class="button orange">1 Ticket for <? print money_format('%n', $price_weekly) ?></a><br>
<a href="buy.php?contestID=2&ticket=3&cost=<? print $price2_weekly ?>" class="button blue">3 Tickets for <? print money_format('%n', $price2_weekly) ?></a><br>
<a href="buy.php?contestID=2&ticket=5&cost=<? print $price3_weekly ?>" class="button green">5 Tickets for <? print money_format('%n', $price3_weekly) ?></a><br><br></td></tr>
<tr><td colspan="2" align="center">
<h3><b><? echo $weekly_number; ?></b></h3>
</td>


<?

				}
				
				?>
</tr></table> </center></div>
        
                        <div class="ticket raised"><center><table align="center" width="415"><tr><td><img src="images/monthly_stack.png"></td>
                <?
				if ($monthlystatus=='disabled')
				{
					?><tr><td>
				UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>This drawing is coming soon!   Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
                
                }
				if (($time=='20')&&($monthlydrawingdate==$today))
				{
					?><tr><td>
				UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>Drawing will resume in an hour.  Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
				}
				else
				{
					?>
                    
                   <td align="center"><br><br><b><h3>Current Jackpot: <br> <? print money_format('%(#10n', $monthly) ?></b></h3> <br><br>
<a href="buy.php?contestID=3&ticket=1&cost=<? print $price_monthly ?>" class="button orange">1 Ticket for <? print money_format('%n', $price_monthly) ?></a><br>
<a href="buy.php?contestID=3&ticket=3&cost=<? print $price2_monthly ?>" class="button blue">3 Tickets for <? print money_format('%n', $price2_monthly) ?></a><br>
<a href="buy.php?contestID=3&ticket=5&cost=<? print $price3_monthly ?>" class="button green">5 Tickets for <? print money_format('%n', $price3_monthly) ?></a><br><br></td></tr>
<tr><td colspan="2" align="center">
<h3><b> <? echo $monthly_number; ?></b></h3>
</td>

  <?

				}
				
				?>

</tr></table></div></center>
                
                
       
       
       
       

 <div class="separator"></div>
 

 
 
 <div class="content_prizes">
                <table>
<tr>
<td><img src="images/car.png"></td>
 <td><img src="images/plane.png"></td>
 <td><img src="images/ring.png"></td>
  <td><img src="images/electronics.png"></td>
   <td><img src="images/sports.png"></td></tr>



 <?php
 //get current raffle
	$query_raffle = "SELECT * FROM Raffle WHERE RaffleStatus = 'open' AND RaffleMax >= Amount";
	@$result_raffle = mysql_query($query_raffle);
	@$numRows_raffle = mysql_num_rows($result_raffle);
	$i='0';
	$car='0';
	$ti='0';
	$ji='0';
	$di='0';
	$si='0';
  while ($raffle = mysql_fetch_array($result_raffle)){
$rid = $raffle['RaffleID'];
$category = $raffle['RaffleCategory'];
if ($rid!=NULL and $category=='Car'){
	
	$car++;
	$carlink = 'There is '.$car.' Current Raffles!!';
}
elseif ($rid!=NULL and $category=='Celebrity'){
	
	$ti++;
	$triplink = 'There is '.$ti.' Current Raffles!!';
}
elseif ($rid!=NULL and $category=='Jewelry'){
	
	$ji++;
	$jewelrylink = 'There is '.$ji.' Current Raffles!!';
}
elseif ($rid!=NULL and $category=='Electronics'){
	$di++;
	$electroniclink = 'There is '.$di.' Current Raffles!!';
}
elseif ($rid!=NULL and $category=='Sports'){
	$si++;
	$sportslink = 'There is '.$si.' Current Raffles!!';
}
else {
	$sportslink = 'No Raffles at this time.';
	$carlink = 'No Raffles at this time.';
	$triplink = 'No Raffles at this time.';
	$electroniclink = 'No Raffles at this time.';
	$jewelrylink = 'No Raffles at this time.';
	
}



  }
  
 ?>  
 <tr>
<td><a href="raffle_index.php?category=Car"><? echo $carlink ?></a></td>
<td> <a href="raffle_index.php?category=Trip"><? echo $triplink ?></a></td>
<td> <a href="raffle_index.php?category=Jewelry"><? echo $jewelrylink ?></a></td>
<td><a href="raffle_index.php?category=Electronics"> <? echo $electroniclink ?></a></td>
<td> <a href="raffle_index.php?category=Sports"><? echo $sportslink ?></a></td>

</tr></table>  



 </div>



<?php
// connect to database 
require("footer.php"); 

  
  

?>




	


	
        
  </body>
</HTML>