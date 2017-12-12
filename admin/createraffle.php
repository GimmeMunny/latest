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



//get time
//my SQL query strings
	$query_timezone = "SELECT * FROM TimeZone";
	@$result_time = mysql_query($query_timezone);
	@$numRows_time = mysql_num_rows($result_time);
$time_row = mysql_fetch_array($result_time);

$timezone = $time_row['TimeZone'];

$date = new DateTime("now", new DateTimeZone($time_row['TimeZone']) );
$now = $date->format('Y-m-d');


	
	//my SQL query strings
	$query_selectAllItems = "SELECT * FROM ContestAmount WHERE '$now' between DrawingStart and DrawingEnd";
	//$query_selectAllItems = 'SELECT * FROM ContestAmount WHERE DATE(Date)=CURDATE()';
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);


	
	
//output each row 
  while ($contest_row = mysql_fetch_array($result_all)){

      $cid = $contest_row['ContestID'];
	  if ($cid == '1')
	  {
		  	$daily = $contest_row['Amount'];
		   $dailystatus = $contest_row['Status'];
		   $dailyid = $contest_row['ContestAmountID'];
		   $dailydate = $contest_row['DrawingEnd'];
		   echo $dailystatus;
		  $a_daily = $daily - .02;
		  $d_daily = $daily * .02;
	  }
	    if ($cid == '2')
	  {
		  $weekly = $contest_row['Amount'];
		  $weeklystatus = $contest_row['Status'];
		  $weeklyid = $contest_row['ContestAmountID'];
		  $weeklydate = $contest_row['DrawingEnd'];
		  if ($weekly == '0.00')
		  {
		   $a_weekly = $weekly;
		  $d_weekly = $weekly;
	  }
		  else
		  {
		  $a_weekly = $weekly - .02;
		  $d_weekly = $weekly * .02;
		  }
	  }
	    if ($cid == '3')
	  {
		  $monthlystatus = $contest_row['Status'];
		  $monthlyid = $contest_row['ContestAmountID'];
		  $monthlydate = $contest_row['DrawingEnd'];
		  $monthly = $contest_row['Amount'];
		  $monthlystatus = $contest_row['Status'];
		  	  if ($monthly == '0.00')
		  {
		   $a_monthly = $monthly;
		  $d_monthly = $monthly;
	  }
		  else
		  {
		  $a_monthly = $monthly - .02;
		  $d_monthly = $monthly * .02;
		  }
	  }
	  
	 
	 $c_amount = $d_daily + $d_monthly + $d_weekly;

  }
  
  if ($d_daily == "")
  {
	  $statement = "";
  }
  Else
  {
  $statement = "The monthly jackpot now stands at $".$a_monthly." with Gimmemunny";
  }

?>

</head>

<body>
	<div id="wrapper">
    	<!-- h1 tag stays for the logo, you can use the a tag for linking the index page -->
    	<h1><a href="#"><span>GimmeMunny Admin</span></a></h1>
        
        <!-- You can name the links with lowercase, they will be transformed to uppercase by CSS, we prefered to name them with uppercase to have the same effect with disabled stylesheet -->
        <ul id="mainNav">
        	<li><a href="#" class="active">DASHBOARD</a></li> <!-- Use the "active" class for the active menu item  -->
        	<li><a href="#">ADMINISTRATION</a></li>
        	<li><a href="#">DESIGN</a></li>
        	<li><a href="#">OPTION</a></li>
        	<li class="logout"><a href="#">LOGOUT</a></li>
        </ul>
        <!-- // #end mainNav -->
        
        <div id="containerHolder">
			<div id="container">
        		<div id="sidebar">
                	<ul class="sideNav">
                    	<li><a href="index.php">Drawings</a></li>
                    	<li><a href="#" class="active">Create a Raffle</a></li>
                    	<li><a href="#">Books</a></li>
                    	<li><a href="#">Safari books online</a></li>
                    	<li><a href="#">Events</a></li>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Drawings</a></h2>
                
                <div id="main">
                
                                	<h3>Create Raffle</h3>
                                    <form method="post" action="submitraffle.php">
                    	<fieldset>
                        	<p><label>Raffle Name:</label><input type="text" class="text-long" name="name"/></p>
                        	<p><label>Raffle Max:</label><input type="text" class="text-medium" name="raffleamount"/></p>
                            <p><label>Raffle Ticket Price:</label><input type="text" class="text-medium" name="price"/></p>
                        	<p><label>Raffle Description:</label><textarea rows="1" cols="1" name="desc"></textarea></p>
                            <input type="submit" value="Submit Query" />
                        </fieldset>
                    </form>
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


