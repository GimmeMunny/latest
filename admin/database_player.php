<?
// connect to database 
include("include/conn.php"); 
//include("auth.php"); 
?>

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


  
  $page="email";

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
                <h2><a href="#">Database</a> &raquo; <a href="#" class="active">Upload <b>Player</b> Database</a></h2>
                
                <div id="main">

	<?php



//$deleterecords = "TRUNCATE TABLE Email3"; //empty the table of its current records
//mysql_query($deleterecords);


//Upload File
if (isset($_POST['submit'])) {
	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		echo "File ". $_FILES['filename']['name'] ." uploaded successfully.  \r\n";
		
		
	}

	//Import uploaded file to Database
	$handle = fopen($_FILES['filename']['tmp_name'], "r");
	$name = $_POST['referrer'];
	$file = $_FILES['filename']['name'];
$i='1';
	while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
		$i++;
		if (mysql_real_escape_string($data[0]) == NULL)
		{
				$import="INSERT INTO Email (EmailAddress) VALUES('NULL')";
//$import="INSERT INTO Email3 (EmailAddress) values ('$data[0]')";
		mysql_query($import) or die(mysql_error());
		}
		else
		{
		$import="INSERT INTO Email (EmailAddress, Referrer, Submitter) VALUES('".mysql_real_escape_string($data[0])."', '$name', '$file')";
//$import="INSERT INTO Email3 (EmailAddress) values ('$data[0]')";
		mysql_query($import) or die(mysql_error());
	}	}

	fclose($handle);

	print "Import done.  Added ".$i." records \r\n";
	$query_order = "SELECT * FROM Email ORDER BY EmailID DESC LIMIT 1";
	$result_order = mysql_query($query_order);
	//output each ticket
  while ($row = mysql_fetch_array($result_order)){
	  $email=$row['EmailID'];
	  print "Total Records is now " .$email;
  }


	//view upload form
}else {

	print "Upload new csv by browsing to file and clicking on Upload<br />\n";

	print "<form enctype='multipart/form-data' action='database_player.php' method='post'>";

	print "File name to import:<br />\n";

	print "<input size='50' type='file' name='filename'><br />\n";
	print "Referrer Code:  <input size='50' type='text' name='referrer'><br />\n";

	print "<input type='submit' name='submit' value='Upload'></form>";

}

?><br /><br /><br /><br />
					
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


