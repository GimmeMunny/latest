<?php   	 
             
             
             
             if ($page == 'index')
	  {
      ?>
		   <li><a href="index.php" class="active">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="index_admin.php">ADMINISTRATION</a></li>
        	<li><a href="index_design.php">DESIGN</a></li>
        	<li><a href="index_email.php">DATABASE/EMAIL</a></li>
            <li><a href="index_trouble.php">SUBMIT TROUBLE TICKET</a></li>
        	<li class="logout"><a href="#">LOGOUT</a></li>
            
            <?
	  }
	    if ($page == 'email')
	  {
		  ?>
	   <li><a href="index.php">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="index_admin.php">ADMINISTRATION</a></li>
        	<li><a href="index_design.php">DESIGN</a></li>
        	<li><a href="index_email.php" class="active">DATABASE/EMAIL</a></li>
            <li><a href="index_trouble.php">SUBMIT TROUBLE TICKET</a></li>
        	<li class="logout"><a href="#">LOGOUT</a></li>
			
			<?
	  }
            
    if ($page == 'admin')
	  {
		  ?>
	   <li><a href="index.php">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="index_admin.php" class="active">ADMINISTRATION</a></li>
        	<li><a href="index_design.php">DESIGN</a></li>
        	<li><a href="index_email.php">DATABASE/EMAIL</a></li>
            <li><a href="index_trouble.php">SUBMIT TROUBLE TICKET</a></li>
        	<li class="logout"><a href="#">LOGOUT</a></li>
			
			<?
	  }
	  if ($page == 'design')
	  {
		  ?>
	   <li><a href="index.php">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="index_admin.php">ADMINISTRATION</a></li>
        	<li><a href="index_design.php" class="active">DESIGN</a></li>
        	<li><a href="index_email.php">DATABASE/EMAIL</a></li>
            <li><a href="index_trouble.php">SUBMIT TROUBLE TICKET</a></li>
        	<li class="logout"><a href="#">LOGOUT</a></li>
			
			<?
	  }if ($page == 'trouble')
	  {
		  ?>
	   <li><a href="index.php">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="index_admin.php">ADMINISTRATION</a></li>
        	<li><a href="index_design.php">DESIGN</a></li>
        	<li><a href="index_email.php">DATABASE/EMAIL</a></li>
            <li><a href="index_trouble.php" class="active">SUBMIT TROUBLE TICKET</a></li>
        	<li class="logout"><a href="#">LOGOUT</a></li>
			
			<?
	  }
            
        ?>     
        
        
            
            
           