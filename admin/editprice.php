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
	$query_raffle = "SELECT * FROM Contest where ContestID = '$cid'";
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
                                    <form method="post" action="updateprice.php">
                    	<fieldset>
                        	<p><label>Contest Name:</label><input type="text" class="text-long" name="name" value="<? print $raffle_row['Name'] ?>"/></p>
                            <p><label>Contest Ticket Price:</label><input type="text" class="text-medium" name="price" value="<? print $raffle_row['Price'] ?>"/></p>
                            <p><label>Contest 3 Bundle Price:</label><input type="text" class="text-medium" name="price2" value="<? print $raffle_row['Bundle1Price'] ?>"/></p>
                            <p><label>Contest 5 Bundle Price:</label><input type="text" class="text-medium" name="price3" value="<? print $raffle_row['Bundle2Price'] ?>"/></p>
                            <p><label>Max Price:</label><input type="text" class="text-medium" name="max" value="<? print $raffle_row['Max'] ?>"/></p>
                            <p><label>Bottom Copy:</label><input type="text" class="text-medium" name="number" value="<? print $raffle_row['NumberTickets'] ?>"/></p>
                            <input name="id" type="hidden" value="<? print $raffle_row['ContestID'] ?>" />
                            <input type="submit" value="Edit Price" />
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


