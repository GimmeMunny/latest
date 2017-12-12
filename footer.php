<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<div id="footer">

<div class="separator4"></div>

<?

// connect to database 
include("include/conn.php"); 
		  						//my SQL query strings
	$query_content = "SELECT * FROM Content";
	@$result_content = mysql_query($query_content);
	@$numRows_content = mysql_num_rows($result_content);
							
   //output each row 
  while ($content_row = mysql_fetch_array($result_content)){

      $contentid = $content_row['ContentID'];
	  $name = $content_row['ContentName'];
		  
		  
		  ?>
             <a href="page.php?id=<? print $contentid ?>"><? print $name ?></a> | 
          
        	

			
			<?
	  }
            
        ?>   

<a href="contact.php">Contact Us</a></div><br />
</body>
</html>