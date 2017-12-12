<?php

// connect to database 
include("include/conn.php"); 

$amount=$_POST['Amount'];
$ordernumber=$_POST['MerchantReference'];
$fname=$_POST['CustomerFirstName'];
$lname=$_POST['CustomerLastName'];
$email=$_POST['CustomerEmail'];
//get time
//my SQL query strings
	$query_timezone = "SELECT * FROM Company";
	@$result_time = mysql_query($query_timezone);
	@$numRows_time = mysql_num_rows($result_time);
$time_row = mysql_fetch_array($result_time);

$timezone = $time_row['CompanyTimeZone'];
$split = $time_row['CompanySplit'];
$companyurl = $time_row['CompanyURL'];
$companynoreplyemail = $time_row['CompanyNoReplyEmail'];
$companyamount = $amount * $split;
$amount = $amount - $companyamount;
if ($time_row['CharityEnabled']=='Yes'){
	$charityamount = $companyamount * $time_row['CompanyCharity'];
	$companyamount = $companyamount - $charityamount;
}
else
{
$charityamount = '0.00';
$companyamount = $companyamount - $charityamount;
}

$date = new DateTime("now", new DateTimeZone($time_row['CompanyTimeZone']) );
$now = $date->format('Y-m-d H:i:s');

//update email table for anyone who buys
//my SQL query strings
	$query_email = "SELECT * FROM Email where EmailAddress='$email'";
	@$result_email = mysql_query($query_email);
	@$numRows_email = mysql_num_rows($result_email);
$email_row = mysql_fetch_array($result_email);

$emailDB = $email_row['EmailAddress'];

if ($emailDB==''){
	
	$query_insertItem = "INSERT INTO Email (EmailAddress, Submitter) VALUES ('$email', 'Macau')";
	$dberror = "";
	$ret = mysql_query($query_insertItem);
	//echo $ticketNumber;
	
	
}


//my SQL query strings

	$query_order = "SELECT * FROM Ticket WHERE OrderNumber='$ordernumber'";
	@$result_order = mysql_query($query_order);
	@$numRows_order = mysql_num_rows($result_order);
	$o_row = mysql_fetch_array($result_order);
	$raffle = $o_row['Raffle'];
	$contest = $o_row['ContestID'];
	$query_update = "UPDATE Ticket SET Status = 'paid', Fname = '$fname', Lname = '$lname', Email = '$email' WHERE OrderNumber= '$ordernumber'";
	$dberror = "";
	$ret = mysql_query($query_update);
	echo $raffle;
	
	if ($raffle=='yes'){
		
		
	
	
	
	
	$query_selectAllItems = "SELECT * FROM Raffle WHERE RaffleID= '$contest' AND  RaffleStatus = 'open'";
	echo $query_selectAllItems;
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$c_row = mysql_fetch_array($result_all);


  // update
    
	$amount=$c_row['Amount']+$amount;
	$company=$c_row['CompanyAmount']+$companyamount;
	$charity=$c_row['CharityAmount']+$charityamount;
	//"SELECT * FROM ContestAmount WHERE '$now' between DrawingStart and DrawingEnd";
	$query_update = "UPDATE Raffle SET Amount = '$amount', CompanyAmount = '$company', CharityAmount = '$charity' WHERE RaffleID= '$contest'";
	$dberror = "";
	$ret = mysql_query($query_update);
	
	
	
	
	}
	
	else {
		
	$contest=$o_row['ContestID'];
	
	$query_selectAllItems = "SELECT * FROM ContestAmount WHERE ContestID= '$contest' AND '$now' between DrawingStart and DrawingEnd and Status = 'open'";
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$c_row = mysql_fetch_array($result_all);
        $jackpot=$c_row['Amount'];
        
$query_contestamount = "SELECT Max FROM Contest WHERE ContestID= '$contest'";
        @$result_amount = mysql_query($query_contestamount);
	@$contestamount = mysql_num_rows($result_amount);
	$amount_row = mysql_fetch_array($result_amount);
        
  if ($c_row['Amount'].$amount_row['Max']){
      
     $to      = 'derek.baehr@gmail.com';
$subject = 'Contest over max!';
$message = 'we sold over max ' ;
mail($to, $subject, $message);

$query_order = "SELECT DISTINCT (EmailAddress) AS EmailAddress FROM Email";
	$result_order = mysql_query($query_order);
      
      while ($row = mysql_fetch_array($result_order)){
	  $email_to = ($row['EmailAddress']);
	  $submitter = ($row['Submitter']);

	$to = $email_to; 
    $from = $companynoreplyemail;
    $subject = "The Drawing has sold more than our set limit! "; 


//We are sending this email to say no winners
   $message = '<html><head>';
    $message .='<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>';
	$message .= '<title>Someone always wins.</title>';
    $message .= '</head>';
    $message .= '<body bgcolor="#FFFFFF"><center>';
    $message .= '<table width="100%" height="300" bgcolor="#FFFFFF"><tr><td>';
    $message .= '<table>';
    $message .= '<tr><td><font color="#000000"><b>We sold over our set limit of the jackpot set for todays draw!!!  The jackpot is now at '.$jackpot.'<br><br>Go to '.$companyurl.' to buy yours today and GOOD LUCK to all who enter!</b></td><td></td></tr>';
	$message .= '<tr><td><font color="#000000">Remember, there is a single winning ticket guaranteed every draw!<br><br></td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br>You can win today, buy some tickets now!!</td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br><br>If you do not wish to receive these emails, please click <a href=https://'.$companyurl.'/optout.php?email='.$email_to.'>here</a></td></tr>';
	$message .= '</table></td></tr><tr><td>';
    $message .= '</table></body></html>';
	
	

	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
  }
      
      
  }
        

  // update
	$amount=$c_row['Amount']+$amount;
	$company=$c_row['CompanyAmount']+$companyamount;
	$charity=$c_row['CharityAmount']+$charityamount;
	//"SELECT * FROM ContestAmount WHERE '$now' between DrawingStart and DrawingEnd";
	$query_update = "UPDATE ContestAmount SET Amount = '$amount', CompanyAmount = '$company', CharityAmount = '$charity' WHERE ContestID= '$contest' AND '$now' between DrawingStart and DrawingEnd";
	$dberror = "";
	$ret = mysql_query($query_update);	
		
	}

//We are sending mail to ourself to see when this page is called.
$to      = 'derek.baehr@gmail.com';
$subject = 'Postback received from AlliedWallet';
$message = 'POST: ' . print_r($_POST, true) . 'GET' . print_r($_GET, true) . 'Server: ' . print_r($_SERVER,true);
mail($to, $subject, $message);

if ($_POST['MerchantReference'])
                echo '1:success';
else
                echo '0:invalid request';
?>

<?= $message ?>
<? 
