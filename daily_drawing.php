<?php

// connect to database 
include("include/conn.php"); 
//my SQL query strings

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
$timezone = $company_row['CompanyTimeZone'];
$date = new DateTime("now", new DateTimeZone($company_row['CompanyTimeZone']) );
$cid = '1';

 $drawing_date = $date->format('Y-m-d');



	/*$query_status = "SELECT Status FROM Contest WHERE ContestID = '1'";
			$result_status = mysql_query($query_status);
			$status_row = mysql_fetch_array($result_status);
			$status = $status_row['Status'];
			print $contest;*/

	
	$query_amount = "SELECT * FROM ContestAmount WHERE ContestID = '1' AND Status = 'open'";
	@$result_amount = mysql_query($query_amount);
	@$numRows_amount = mysql_num_rows($result_amount);
	$amount_row = mysql_fetch_array($result_amount);
	if ($amount_row == NULL and $status == 'enabled')
	{
		//create contest
			//Update contest to say its done;
	$query_update = "UPDATE ContestAmount SET Status = 'drawn' WHERE ContestID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);

	$now = $date->format('Y-m-d H:i:s');
    $drawing_date = $date->format('Y-m-d');
        echo $drawing_date;
	$newstart = strtotime (strtotime ( $now ) ) ;
	$newstart = date ( 'Y-m-d H:i:s' , $newstart );
	$newend = strtotime ( '+1 day -1 hour' , strtotime ( $now ) ) ;
	$newend = date ( 'Y-m-d H:i:s' , $newend );
	//echo $newend;
    $query_insertItem = "INSERT INTO ContestAmount (Date, DrawingStart, DrawingEnd, ContestID, Amount, Status) VALUES ('$drawing_date', '$now', '$newend', '$cid', '0.00', 'open')";
	$dberror = "";
	$ret = mysql_query($query_insertItem);
	//print "should work";
		
	}
	else if($amount_row == NULL and $status == 'disabled')
	{
		print 'done';
	}
	else if ($amount_row['DrawingStart'] == '0000-00-00 00:00:00' and $status == 'enabled')
	
		{
		//create contest
	//Update contest to say its done;
	$query_update = "UPDATE ContestAmount SET Status = 'drawn' WHERE ContestID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);
	$now = $date->format('Y-m-d H:i:s');
	$newstart = strtotime (strtotime ( $now ) ) ;
	$newstart = date ( 'Y-m-d H:i:s' , $newstart );
	$newend = strtotime ( '+1 day -1 hour' , strtotime ( $now ) ) ;
	$newend = date ( 'Y-m-d H:i:s' , $newend );
    
	echo $newend;
    $query_insertItem = "INSERT INTO ContestAmount (Date, DrawingStart, DrawingEnd, ContestID, Amount, Status) VALUES ('$drawing_date', '$now', '$newend', '$cid', '0.00', 'open')";
	$dberror = "";
	$ret = mysql_query($query_insertItem);
	print "should work";

		
	}
	else
	
	{
//output each row 
  
			$cid = $amount_row['ContestID'];
		  	$start = $amount_row['DrawingStart'];
			$end = $amount_row['DrawingEnd'];
			$newstart = strtotime ( '+1 day' , strtotime ( $start ) ) ;
			$newstart = date ( 'Y-m-d H:i:s' , $newstart );
			$newend = strtotime ( '+1 day' , strtotime ( $end ) ) ;
			$newend = date ( 'Y-m-d H:i:s' , $newend );
		  	$daily = $amount_row['Amount'];
			$contest= $amount_row['ContestAmountID'];
			
	 

 



	$query_selectAllItems = "SELECT * FROM Ticket WHERE Status = 'paid' AND ContestID = '$cid' AND PurchasedTime BETWEEN '$start' AND '$end' ORDER BY RAND() LIMIT 1";
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$contest_row = mysql_fetch_array($result_all);
	$ticketnumber = $contest_row['TicketNumber'];
	$name = $contest_row['Fname'].' '.$contest_row['Lname'];
	$winner_email = $contest_row['Email'];
	
        echo $ticketnumber;
	
	if ($ticketnumber == '')
	{
	$query_order = "SELECT DISTINCT (EmailAddress) AS EmailAddress FROM Email";
	$result_order = mysql_query($query_order);
	
	//Update contest to say its done;
	$query_update = "UPDATE ContestAmount SET Status = 'drawn' WHERE ContestID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);
		  if ($status == 'disabled')
		  {
			  echo "skip";
		  }
		  else
		  {
		$now = $date->format('Y-m-d H:i:s');
	$newstart = strtotime (strtotime ( $now ) ) ;
	$newstart = date ( 'Y-m-d H:i:s' , $newstart );
	$newend = strtotime ( '+1 day -1 hour' , strtotime ( $now ) ) ;
	$newend = date ( 'Y-m-d H:i:s' , $newend );
	// insert a new contest
	$query_insertItem = "INSERT INTO ContestAmount (Date, DrawingStart, DrawingEnd, ContestID, Amount, Status) VALUES ('$drawing_date', '$now', '$newend', '$cid', '0.00', 'open')";
	$dberror = "";
	$ret = mysql_query($query_insertItem);
	}
	
	//output each ticket
  while ($row = mysql_fetch_array($result_order)){
	  $email_to = ($row['EmailAddress']);
	  $submitter = ($row['Submitter']);

	$to = $email_to; 
    $from = $companynoreplyemail;
    $subject = "There is no winner for the daily drawing "; 


//We are sending this email to say no winners
   $message = '<html><head>';
    $message .='<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>';
	$message .= '<title>Someone always wins.</title>';
    $message .= '</head>';
    $message .= '<body bgcolor="#FFFFFF"><center>';
    $message .= '<table width="100%" height="300" bgcolor="#FFFFFF"><tr><td>';
    $message .= '<table>';
    $message .= '<tr><td><font color="#000000"><b>There was no winners for this drawing.<br><br>Go to '.$companyurl.' to buy yours today and GOOD LUCK to all who enter!</b></td><td></td></tr>';
	$message .= '<tr><td><font color="#000000">Remember, there is a single winning ticket guaranteed every draw!<br><br></td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br>You can win today, buy some tickets now!!</td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br><br>If you do not wish to receive these emails, please click <a href=http://'.$companyurl.'/optout.php?email='.$email_to.'>here</a></td></tr>';
	$message .= '</table></td></tr><tr><td>';
    $message .= '</table></body></html>';
	
	

	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
  }
		
	}
	else
	{
		
	
	$to = $winner_email;
	$from = $companynoreplyemail;
    $subject = 'Congrats!!!!  You won the daily drawing from '.$companyurl.'!!'; 


//We are sending mail to winner.
   $message = '<html><head>';
    $message .='<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>';
	$message .= '<title>Someone always wins.</title>';
    $message .= '</head>';
    $message .= '<body bgcolor="#FFFFFF"><center>';
    $message .= '<table width="100%" height="300" bgcolor="#FFFFFF"><tr><td>';
    $message .= '<table>';
    $message .= '<tr><td><font color="#000000"><b>Congratulations!  You won! Your winning ticket '.$ticketnumber.' was drawn!  You Won $'.money_format('%(#10n', $daily).'</b><br><br></td><td></td></tr>';
	$message .= '<tr><td><font color="#000000">Click <a href=http://'.$companyurl.'/pdf/PayoutRequestFormFV_09_2013.pdf>here</a> to collect your winnings!<br><br></td></tr>';
	$message .= '</table></td></tr><tr><td>';
    $message .= '</table></body></html>';
	
	
	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
	
	$amount=$c_row['Amount']+$amount;
	
	//Update ticket to winner;
	$winner_update = "UPDATE Ticket SET Winner = 'Winner' WHERE TicketNumber= '$ticketnumber'";
	$dberror = "";
	$winner = mysql_query($winner_update);
	
	//we are also sending an email to everyone saying that there was a winner
	$query_order = "SELECT DISTINCT (EmailAddress) AS EmailAddress FROM Email";
	$result_order = mysql_query($query_order);
	
	
	//output each ticket
  while ($row = mysql_fetch_array($result_order)){
	  $email_to = ($row['EmailAddress']);
	  $submitter = ($row['Submitter']);

	$to = $email_to; 
    $from = $companynoreplyemail;
    $subject = "There was a winner!! "; 


//We are sending this email to say there was a winner
   $message = '<html><head>';
    $message .='<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>';
	$message .= '<title>Someone always wins.</title>';
    $message .= '</head>';
    $message .= '<body bgcolor="#FFFFFF"><center>';
    $message .= '<table width="100%" height="300" bgcolor="#FFFFFF"><tr><td>';
    $message .= '<table>';
	$message .= '<tr><td><font color="#000000"><b>There was a winning ticket for the daily drawing!!  The winning ticket is '.$ticketnumber.'  The drawing amount was $'.money_format('%(#10n', $daily).'</b></td><td></td></tr>';
	$message .= '<tr><td><font color="#000000"><b>There is always chances to win!  <br><br>Go to '.$companyurl.' to buy yours today and GOOD LUCK to all who enter!</b><br><br></td><td></td></tr>';
	$message .= '<tr><td><font color="#000000"><b>Remember, there is a single winning ticket guaranteed every draw!</b><br><br></td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br><b>You can win today, buy some tickets now!!</b></td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br><br>If you do not wish to receive these emails, please click <a href=http://'.$companyurl.'/optout.php?email='.$email_to.'>here</a></td></tr>';
	$message .= '</table></td></tr><tr><td>';
    $message .= '</table></body></html>';
	
	

	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
  }
	
	//Update contest to say its done;
	$query_update = "UPDATE ContestAmount SET Status = 'drawn' WHERE ContestID= '$cid'";
	$dberror = "";
	$ret = mysql_query($query_update);
		  
	// insert a new contest

    $query_insertItem = "INSERT INTO ContestAmount (Date, DrawingStart, DrawingEnd, ContestID, Amount, Status) VALUES ('$drawing_date', '$newstart', '$newend', '$cid', '0.00', 'open')";
	$dberror = "";
	$ret = mysql_query($query_insertItem);
	
	}
	
	
	}

	
	
	
?>
<? print $ticketnumber; ?><br />
<? print $today; ?><br />
<? print $endDate; ?><br />
<? print $query_selectAllItems ?><br />
<? print $status; ?><br />
<? print $email; ?><br />
<? print $to; ?><br />
<? print $winner_email; ?><br />
<? print $a_daily ?><br />
<? print $query_amount ?><br />
<? print $from ?>
