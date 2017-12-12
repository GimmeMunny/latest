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
print $_SESSION["username"];

$cid = $_GET['id'];
	
	
	//my SQL query strings
	$query_raffle = "SELECT * FROM Company";
	//$query_selectAllItems = 'SELECT * FROM ContestAmount WHERE DATE(Date)=CURDATE()';
	@$result_raffle = mysql_query($query_raffle);
	@$numRows_raffle = mysql_num_rows($result_raffle);


  $page="admin";	
	
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
                
                                	<h3>Edit Company</h3>
                                    
                                               <?
               
                //output each row 
  while ($raffle_row = mysql_fetch_array($result_raffle)){
	  
	  ?>
                                    <form method="post" action="updatecompany.php">
                    	<fieldset>
                        	<p><label>Company Name:</label><input type="text" class="text-long" name="name" value="<? print $raffle_row['CompanyName'] ?>"/></p>
                        	<p><label>Company URL:</label><input type="text" class="text-long" name="url" value="<? print $raffle_row['CompanyURL'] ?>"/></p>
                            <p><label>Company No Reply Email:</label><input type="text" class="text-long" name="noreply" value="<? print $raffle_row['CompanyNoReplyEmail'] ?>"/></p>
                            <p><label>Company Main Email:</label><input type="text" class="text-long" name="email" value="<? print $raffle_row['CompanyEmail'] ?>"/></p>
                            <p><label>Company Company Time Zone:</label><input type="text" class="text-long" name="time" value="<? print $raffle_row['CompanyTimeZone'] ?>"/></p>
                            <p><label>Company Jackpot Split:</label><input type="text" class="text-medium" name="split" value="<? print $raffle_row['CompanySplit'] ?>"/></p>
                            <p><label>Company Charity Split:   &nbsp;&nbsp;&nbsp;
                            <?
							if ($raffle_row['CharityEnabled']=='Yes')
							{
								
								?>
                                Enable Charity</label><input type="checkbox" name="enabled" value="Yes"  checked="checked" />
                                <?
							}
                            else{
                            ?>
                                Enable Charity</label><input type="checkbox" name="enabled" value="Yes" />
                                <?
                                }
                                ?>
                            
 <input type="text" class="text-medium" name="charity" value="<? print $raffle_row['CompanyCharity'] ?>"/></p>
                            <input name="id" type="hidden" value="<? print $raffle_row['CompanyID'] ?>" />
                            <input type="submit" value="Edit Company" />
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
        
    </div>
    <!-- // #wrapper -->
</body>
</html>


