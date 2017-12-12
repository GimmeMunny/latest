<?php
// connect to database 
include("include/conn.php"); 
		$query_order = "SELECT DISTINCT(Country) AS Country FROM InvestorDatabase ORDER BY Country";
        //SELECT DISTINCT(Date) AS Date FROM buy ORDER BY Date DESC;
	$result_order = mysql_query($query_order);
	//output each ticket
  while ($row = mysql_fetch_array($result_order)){
	  $country=$row['Country'];
 
	  
		?>
			<select>
  <option value="investor" name="database">Investor Database - <? print $country ?> Records</option>
  
    <?
	 }