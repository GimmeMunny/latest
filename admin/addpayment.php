<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>GimmeMunny|Admin</title>
<script src="include/ckeditor.js"></script>
	
	<style>

		/* Style the CKEditor element to look like a textfield */
		.cke_textarea_inline
		{
			padding: 10px;
			height: 200px;
			overflow: auto;
			width:600px;

			border: 1px solid gray;
			-webkit-appearance: textfield;
		}

	</style>

<!-- CSS -->
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style/css/sample.css" rel="stylesheet" type="text/css" media="screen" />

<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>

<?php
// connect to database 
include("include/conn.php"); 



//get time
//my SQL query strings
	$query_timezone = "SELECT * FROM TimeZone";
	@$result_time = mysql_query($query_timezone);
	@$numRows_time = mysql_num_rows($result_time);
$time_row = mysql_fetch_array($result_time);

$timezone = $time_row['TimeZone'];

$date = new DateTime("now", new DateTimeZone($time_row['TimeZone']) );
$now = $date->format('Y-m-d');
$cid = $_GET['id'];


	
	//my SQL query strings
	$query_selectAllItems = "SELECT * FROM Content WHERE ContentID = '$cid'";
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$content = mysql_fetch_array($result_all);


	
	
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

?>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                
               
                <h2><a href="#">Design</a> &raquo; <a href="#" class="active">Create Payment Processor</a></h2>
                
                <div id="main">

	<form action="createpayment.php" method="post">
		<h2>Build your payment processor below below:</h2>
		<p>
			BankName:<br>
			<input type="text" name="name" /></p>
            	
	<p>
			CardBrand:<br>
			<input type="text" name="brand" /></p>
        		<p>
        		<p>
			MerchantNumber:<br>
			<input type="text" name="merchantnumber" /></p>
        		<p>
			GatewayNumber:<br>
			<input type="text" name="gatewaynumber" /></p>
        		<p>
			SignKey:<br>
			<input type="text" name="signkey" /></p>
        		<p>
			Bank Url:<br>
			<input type="text" name="url" /></p>
		<p>
        Enable Payment</label><input type="checkbox" name="enabled" value="Yes"   />
        </p>
        <p>
			<input type="submit" value="Submit">
		</p>
       
	</form>

	
    
  
	
					
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


