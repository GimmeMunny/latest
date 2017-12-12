       <?php
		
		
	$query_order = "SELECT * FROM Ticket WHERE OrderNumber='$ordernumber'";
	@$result_order = mysql_query($query_order);
	@$numRows_order = mysql_num_rows($result_order);
	$o_row = mysql_fetch_array($result_order);
	echo $query_order;
//output each ticket
  while ($o_row = mysql_fetch_array($result_order)){

echo ($o_row['TicketNumber']);
  }

		

?>