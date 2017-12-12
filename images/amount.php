<?php

// connect to database 
include("include/conn.php"); 

$amount=$_POST['Amount'];
$ordernumber=$_POST['MerchantReference'];
$today = date('Y-m-d');



//my SQL query strings

	$query_order = "SELECT * FROM Ticket WHERE OrderNumber='$ordernumber'";
	@$result_order = mysql_query($query_order);
	@$numRows_order = mysql_num_rows($result_order);
	$o_row = mysql_fetch_array($result_order);
	$query_update = "UPDATE Ticket SET Status = 'paid' WHERE OrderNumber= '$ordernumber'";
	$dberror = "";
	$ret = mysql_query($query_update);
	//We are sending mail to customer to give them ticket numbers.
$to      = 'derek.baehr@gmail.com';
$subject = 'Here are your ticket numbers!';
//output each ticket
  while ($o_row = mysql_fetch_array($result_order)){


	


$message = $message . 'POST: ' . print($o_row['OrderNumber']);
  }
mail($to, $subject, $message);
	
	$contest=$o_row['ContestID'];
	
	$query_selectAllItems = "SELECT * FROM ContestAmount WHERE DATE='$today' AND ContestID = '$contest'";
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$c_row = mysql_fetch_array($result_all);

if ($c_row > 0) {
  // update
	$amount=$c_row['Amount']+$amount;
	$query_update = "UPDATE ContestAmount SET Amount = '$amount' WHERE ContestID= '$contest' AND DATE(Date)=CURDATE()";
	$dberror = "";
	$ret = mysql_query($query_update);
}
else {
  // insert
    $query_insertItem = "INSERT INTO ContestAmount (Date, Amount, ContestID) VALUES ('$today', '$amount', '$contest')";
	$dberror = "";
	$ret = mysql_query($query_insertItem);
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
