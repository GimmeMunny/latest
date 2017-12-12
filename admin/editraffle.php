<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GimmeMunny|Admin</title>

<!-- CSS -->
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>

<?php
// connect to database 
include("include/conn.php"); 

$cid = $_GET['id'];
	
	
	//my SQL query strings
	$query_raffle = "SELECT * FROM Raffle where RaffleID = '$cid'";
	//$query_selectAllItems = 'SELECT * FROM ContestAmount WHERE DATE(Date)=CURDATE()';
	@$result_raffle = mysql_query($query_raffle);
	@$numRows_raffle = mysql_num_rows($result_raffle);


	$page="index";
	
?>

</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>GimmeMunny Admin</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
<?php
// connect to database 
require("inc/top.php"); 

?>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    <?php
// connect to database 
require("inc/side.php"); 

?></ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Edit Raffle</a></h2>
    
                <div id="main">
                
                                	<h3>Edit Raffle</h3>
                                    
                                               <?
               
                //output each row 
  while ($raffle_row = mysql_fetch_array($result_raffle)){
	  
	  ?>
                                    <form method="post" action="updateraffle.php">
                    	<fieldset>
                        	<p><label>Raffle Name:</label><input type="text" class="text-long" name="name" value="<? print $raffle_row['RaffleName'] ?>"/></p>
                            <p><label>Raffle Category:</label><select name="category">
                            <?
							//my SQL query strings
	$query_cat = "SELECT * FROM RaffleCategory";
	@$result_cat = mysql_query($query_cat);
	@$numRows_cat = mysql_num_rows($result_cat);

	
					//output each row 
  while ($cat_row = mysql_fetch_array($result_cat)){
					
					
					?>

  <option value="<? print $cat_row['CategoryName'] ?>"<?php if ($raffle_row['RaffleCategory'] === $cat_row['CategoryName']) echo ' selected="selected"' ?>><? print $cat_row['CategoryName'] ?></option>

	                      
	                        
							          
                        
                    
                    <?
  }
					
					?>
                            
                            
                            </select></p>
                        	<p><label>Raffle Max:</label><input type="text" class="text-medium" name="raffleamount" value="<? print $raffle_row['RaffleMax'] ?>"/></p>
                            <p><label>Raffle Ticket Price:</label><input type="text" class="text-medium" name="price" value="<? print $raffle_row['RaffleTicketPrice'] ?>"/></p>
                            <p><label>Raffle 3 Bundle Price:</label><input type="text" class="text-medium" name="bundle3" value="<? print $raffle_row['RaffleBundle3'] ?>"/></p>
                            <p><label>Raffle 5 Bundle Price:</label><input type="text" class="text-medium" name="bundle5" value="<? print $raffle_row['RaffleBundle5'] ?>"/></p>
                        	<p><label>Raffle Description:</label><textarea rows="1" cols="1" name="desc"><? print $raffle_row['RaffleDescription'] ?></textarea></p>
                            <input name="id" type="hidden" value="<? print $raffle_row['RaffleID'] ?>" />
                            <input type="submit" value="Edit Raffle" />
                        </fieldset>
                    </form>
                    <table cellpadding="0" cellspacing="0">
                                     <?
  }
									 
									 ?>
					
   </table>
                    
                    
                    
                    
                    
                </div>
                <!-- // #main -->
                
                <div class="clear"></div>
            </div>
            <!-- // #container -->
        </div>	
        <!-- // #containerHolder -->
        
        <p id="footer">Feel free to use and customize it. <a href="http://www.perspectived.com">Credit is appreciated.</a></p>
    </div>
    <!-- // #wrapper -->
</body>
</html>


