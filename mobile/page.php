<?php
// connect to database 
include("include/conn.php"); 
//get company info
//my SQL query strings
	$query_company = "SELECT * FROM Company";
	@$result_company = mysql_query($query_company);
	@$numRows_company = mysql_num_rows($result_company);
$company_row = mysql_fetch_array($result_company);
$company = $company_row['CompanyName'];
$companyurl = $company_row['CompanyURL'];
$companyemail = $company_row['CompanyEmail'];
$companynoreplyemail = $company_row['CompanyNoReplyEmail'];
$companysplit = $company_row['CompanySplit'];


$timezone = $company_row['CompanyTimeZone'];

$date = new DateTime("now", new DateTimeZone($company_row['CompanyTimeZone']) );
$now = $date->format('Y-m-d');
$time = $date->format('H');
$id = $_GET['id'];





	
	//my SQL query strings
	$query_selectAllItems = "SELECT * FROM Content WHERE ContentID = '$id'";
	//$query_selectAllItems = 'SELECT * FROM ContestAmount WHERE DATE(Date)=CURDATE()';
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$content = mysql_fetch_array($result_all);
	if ($content == NULL)
	{
		$content_blog = "Page Not Found";
		$content_title = "Topic Not Found";
		
	}
	Else
	{
		$content_blog = $content['Content'];
		$content_title = $content['ContentName'];	
	}

?>
<!DOCTYPE html> 
<html> 
<!--  Noir HTML5 mobile template  www.QRdvark.com  10jun11  -->
<!-- 'Noir' by Azalea Software, Inc. is licensed under the Creative Commons Attribution 3.0 Unported License (CC BY 3.0) -->

<head>
<!--  the title tag is extremely important in search engine optimization (SEO)  -->
<title>gimmemnunny.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>
<link href="style.css" rel="stylesheet" type="text/css"/>
<!-- you can apply different style sheets for mobile vs. computer browsers -->
<!--  <link href="style-mobile.css" rel="stylesheet" type="text/css" media="handheld" > -->
<!--  <link href="style-computer.css" rel="stylesheet" type="text/css" media="screen" > -->
<!--  the favicon & iOS home screen icon are both 57x57 PNG's. Use a full URL file path for Android devices.  -->
<!--  <link rel="apple-touch-icon-precomposed" href="http://yoursite.com/apple-touch-icon.png"/>  -->
<!--  <link rel="icon" type="image/vnd.microsoft.icon" href="http://yoursite.com/favicon.png" />  -->
<!--  always make a site map for your mobile site  www.xml-sitemaps.com  -->
<!--  <link rel="alternate" type="application/rss+xml" title="ROR" href="ror.xml" /> -->
</head>

<body>
<div class="header">
	<div id="navButtons"><br>
		<ul>
        
			<li><a href="index.php">&nbsp;&nbsp;home</a></li>
			<li><a href="page.php?id=1">about</a></li>
            <li><a href="contact.php">contact</a></li>
		</ul>
	</div>
   

	<center><img src="images/logo.png" alt="logo" /></center>


<br><br><hr>
 <center>

        <div id="content_holder">
  
     
      
      
<h1><? print $content_title ?></h1>

<p>
<? print $content_blog ?>

</p>
                
           </div>     
                
                </center><br><br>
<!--  don't forget to borrow the Facebook, Twitter, RSS, and Creative Commons icons  -->
<?php
// connect to database 
require("footer.php"); 

 

?>

  
</body>
</html>