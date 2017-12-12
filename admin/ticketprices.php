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
	$query_raffle = "SELECT * FROM Company";
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
                <h2><a href="#">Administration</a> &raquo; <a href="#" class="active">Company Info</a></h2>
    
                <div id="main">
                
                                	<h3>Edit Prices</h3>
                          
                    	<table cellpadding="0" cellspacing="0">
											   
											   <?
							//my SQL query strings
	$query_contest = "SELECT * FROM Contest";
	@$result_contest = mysql_query($query_contest);
	@$numRows_contest = mysql_num_rows($result_contest);
							
   //output each row 
  while ($contestrow = mysql_fetch_array($result_contest)){

      		$contestid = $contestrow['ContestID'];
			$contest_name = $contestrow['Name'];
			$contestprice = $contestrow['Price'];
			$contestprice2 = $contestrow['Bundle1Price'];
			$contestprice3 = $contestrow['Bundle2Price'];
            $max = $contestrow['Max'];     
			$status = $contestrow['Status'];
			
			
?>               
						<tr>
                                              <td><? print $contest_name ?> - 1 Ticket <b>$<? print $contestprice ?></b> - 3 Ticket <b>$<? print $contestprice2 ?></b> - 5 Ticket <b>$<? print $contestprice3 ?></b>   Max: <b>$<? print $max ?></b>  </b></td></td>
                                <td class="action"><a href="editprice.php?id=<? print $contestid ?>" class="view">Edit</a></td>
    <?                            
           
           if ($status == 'disabled')
	{

?>
<td class="action"><a href="updatedrawing.php?id=<? print $contestid ?>&action=enable" class="edit">Enable</a></td></tr>
<?


	}
	elseif($status == 'enabled')
	{
	
	?>
           
                                
<td class="action"><a href="updatedrawing.php?id=<? print $contestid ?>&action=disable" class="view">Disable</a></td>
                            </tr>  
                            <?
							
  }
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
        
    </div>
    <!-- // #wrapper -->
</body>
</html>


