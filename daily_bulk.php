<?php

// connect to database 
include("include/conn.php"); 
//get company info
//my SQL query strings
	$query_company = "SELECT * FROM Company";
	@$result_company = mysql_query($query_company);
	@$numRows_company = mysql_num_rows($result_company);
$company_row = mysql_fetch_array($result_company);
$company = $company_row['CompanyName'];
$companyurl = $company_row['CompanyURL'];
$companyemail = $company_row['CompanyEmail'];
$companynoreplyemail = $company_row['CompanyNoReplyEmail'];

$date = new DateTime("now", new DateTimeZone($company_row['CompanyTimeZone']) );
$now = $date->format('Y-m-d');
$time = $date->format('H');

//set money format
setlocale(LC_MONETARY,"en_US");
//echo money_format("The price is %i", $number);

if ($time=="14")
{
	$additional_message = $companyurl." CASH JACKPOTS ARE ON!! BUY YOUR TICKETS NOW!!  THERE'S ONLY 6 HOURS LEFT";
    $secondemail = "no";
}
else if ($time=="19")
{
	$additional_message = $companyurl." CASH JACKPOTS ARE ON!! BUY YOUR TICKETS NOW!!  THERE'S ONLY 1 HOUR LEFT";
    $secondemail = "no";
}
else if ($time=="9")
{
	$additional_message = $companyurl." CASH JACKPOTS ARE ON!! BUY YOUR TICKETS NOW!!  THERE'S ONLY 11 HOURS LEFT";
    $secondemail = "yes";
}
else
{
	$additional_message = $companyurl." drawing is now open!  Get your tickets bought now!";
	
}

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

	
	//my SQL query strings
	$query_selectAllItems = "SELECT * FROM ContestAmount WHERE '$now' between DrawingStart and DrawingEnd AND Status = 'open'";
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	
	
	
	
	

		
	while ($contest_row = mysql_fetch_array($result_all)){

      $cid = $contest_row['ContestID'];
	
	  if ($cid == '1')
	  {
		  $daily = '0';
		  $daily = $contest_row['Amount'];
		  if ($daily == '0.00')
		 {
			 $daily_message = $number."  The more tickets purchased the higher the jackpot grows, buy your tickets NOW!!  &quot;SOMEONE ALWAYS WINS....GUARANTEED!!&quot;";
		 }
		 else
		 {
			$daily_message = $number."  The more tickets purchased the higher the jackpot grows, buy your tickets NOW!!  &quot;SOMEONE ALWAYS WINS....GUARANTEED!!&quot;  The jackpot is now valued at ".money_format('%(#10n', $daily) ;
			
		 }
		 
		  
	  }
	    if ($cid == '2')
	  {
		  $weekly = $contest_row['Amount'];
		  	  if ($weekly == '0.00')
		 {
			 $weekly_message = $weekly_number."  The more tickets purchased the higher the jackpot grows, buy your tickets NOW!!  &quot;SOMEONE ALWAYS WINS....GUARANTEED!!&quot;";
		 }
		 else
		 {
			$weekly_message = $weekly_number."  The more tickets purchased the higher the jackpot grows, buy your tickets NOW!!  &quot;SOMEONE ALWAYS WINS....GUARANTEED!!&quot;  The jackpot is now valued at ".money_format('%(#10n', $weekly) ;
			
		 }
		  
	  }
	    if ($cid == '3')
	  {
		  
		  $monthly = $contest_row['Amount'];
		  	  if ($monthly == '0.00')
		 {
			 $monthly_message = $monthly_number."  The more tickets purchased the higher the jackpot grows, buy your tickets NOW!!  &quot;SOMEONE ALWAYS WINS....GUARANTEED!!&quot;";
		 }
		 else
		 {
			$monthly_message = $monthly_number."  The more tickets purchased the higher the jackpot grows, buy your tickets NOW!!  &quot;SOMEONE ALWAYS WINS....GUARANTEED!!&quot;  The jackpot is now valued at ".money_format('%(#10n', $monthly) ;
		 }
		 
 
		  
	  }
	  
	 
	 $c_amount = $d_daily + $d_monthly + $d_weekly;

  }
  
  $query_order = "SELECT DISTINCT (EmailAddress) AS EmailAddress FROM InvestorDatabase";
	$result_order = mysql_query($query_order);
	
	//output each ticket
  while ($row = mysql_fetch_array($result_order)){
	  $email_to = ($row['EmailAddress']);

	$to = $email_to; 
     $from = $companynoreplyemail;
    $subject = $additional_message; 


//We are sending mail to ourself to see when this page is called.
   $message = '<html><head>';
    $message .='<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>';
	$message .= '<title>Someone always wins.</title>';
    $message .= '</head>';
    $message .= '<body bgcolor="#FFFFFF"><center>';
    $message .= '<table width="100%" height="300" bgcolor="#FFFFFF"><tr><td>';
    $message .= '<table>';
     $message .= '<tr><td><font color="#000000"><b>Welcome to GimmeMunny.com the world&#39;s first 50/50 CASH PRIZE DRAW and PRODUCTS DRAW....&quot;SOMEONE ALWAYS WINS!!&quot;  GimmeMunny.com is a wholly owned subsidiary of Gold Hill Resources, Inc., a Publicly Trade US Corporation on the OTCMarkets.com - Ticker Symbol &quot;GULD&quot;.   GimmeMunny.com always donates a portion of our ticket sales to children&#39;s hospital charities.</b><br><br><b>OUR MISSION &quot;Making people wealthy, while making children healthy.&quot;</b><br> </td><td></td></tr>';  
      
       
      
    $message .= '<tr><td><font color="#000000"><b> '.$companyurl.' GUARANTEES a SINGLE winning ticket each draw!'.$companyurl.' 50/50 CASH JACKPOT ticket windows are open!</b><br><br></td><td></td></tr>';
	$message .= '<tr><td><font color="#000000"> <b>'.$daily_message.'</b></td></tr>';
	$message .= '<tr><td><br></td></tr>';
	$message .= '<tr><td><font color="#000000"> <b>'.$weekly_message.'</b></td></tr>';
	$message .= '<tr><td><br></td></tr>';
	$message .= '<tr><td><font color="#000000"><b>'.$monthly_message.'</b></td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br><b>&quot;REAL MONEY&quot;  games are NOT open to. U.S. Citizens. </b></td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br><br>If you do not wish to receive these emails, please click <a href='.$companyurl.'/optout.php?email='.$to.'>here</a></td></tr>';
	$message .= '</table></td></tr><tr><td>';
    $message .= '</table></body></html>';
	
	

	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
      
   
      
      
  }


 
?>
<? print $message; ?>
<? print $to; ?>
