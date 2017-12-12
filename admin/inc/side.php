<?php   	    
             
             
             if ($page == 'index')
	  {
      ?>
		 	<li><a href="index.php" class="active">Drawings</a></li>
            <li><a href="ticketprices.php" class="active">Ticket Prices</a></li>
                    	<li><a href="raffle.php">Create a Raffle</a></li>
                    	
            
            <?
	  }
	    if ($page == 'email')
	  {
		  ?>
	   <li><a href="index_email.php">Create Email Blast</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="database.php">Import Investor Database</a></li>
			<li><a href="database_player.php">Import Player Database</a></li>
                    <?
		$query_order = "SELECT * FROM InvestorDatabase ORDER BY EmailID DESC LIMIT 1";
	$result_order = mysql_query($query_order);
	//output each ticket
  while ($row = mysql_fetch_array($result_order)){
	  $email=$row['EmailID'];
 
	  
		?>
        <li>Investor Database - <? print $email ?> Records</li>
  
    <?
	 }
		$query_order2 = "SELECT * FROM Email ORDER BY EmailID DESC LIMIT 1";
	$result_order2 = mysql_query($query_order2);
	//output each ticket
  while ($row2 = mysql_fetch_array($result_order2)){
	  $email2=$row2['EmailID'];

		?>
<li>Player Database - <? print $email2 ?> Records</li>
<?
  }
?>
			
			<?
	  }
            
    if ($page == 'admin')
	  {
		  ?>
          <li><a href="index_admin.php" class="active">Edit Company</a></li>
<li><a href="payment.php">Payment Processor</a></li>
        	<li><a href="users.php">User Management</a></li>

			
			<?
	  }
       
        
        if ($page == 'design')
	  {
		  ?>
       
          
          
            
           <li><a href="addpage.php">Add Page</a></li>
           
           <?
	  }
	   if ($page == 'trouble')
	  {
		  ?>
       
          
          
            
          
           
           <?
	  }
	  ?>
           