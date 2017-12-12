<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

    include("include/conn.php"); 
    $info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];

$current_date = "$date/$month/$year == $hour:$min:$sec";
    
    echo $current_date;
    
    
    
    
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
    $message .= '<tr><td><font color="#000000"><b>We sold over our set limit of the jackpot set for todays draw!!!  The jackpot is now at '.$c_row['Amount'].'<br><br>Go to '.$companyurl.' to buy yours today and GOOD LUCK to all who enter!</b></td><td></td></tr>';
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
    echo $to
?>

</body>
</html>