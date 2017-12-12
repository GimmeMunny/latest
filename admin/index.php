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

<!-- CSS -->
<link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->

<!-- JavaScripts-->
<script type="text/javascript" src="style/js/jquery.js"></script>
<script type="text/javascript" src="style/js/jNice.js"></script>

<?php
print $_SESSION["username"];

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

	  }
	    if ($cid == '2')
	  {
		  $weekly = $contest_row['Amount'];
		  $weeklystatus = $contest_row['Status'];
		  $weeklyid = $contest_row['ContestAmountID'];
		  $weeklydate = $contest_row['DrawingEnd'];
	
	 
	  }
	    if ($cid == '3')
	  {
		  $monthlystatus = $contest_row['Status'];
		  $monthlyid = $contest_row['ContestAmountID'];
		  $monthlydate = $contest_row['DrawingEnd'];
		  $monthly = $contest_row['Amount'];
		  $monthlystatus = $contest_row['Status'];
		  	  
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

?>
                    </ul>
                    <!-- // .sideNav -->
                </div>    
                <!-- // #sidebar -->
                
                <!-- h2 stays for breadcrumbs -->
                <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Drawings</a></h2>
                
                <div id="main">
                
                                	<form action="" class="jNice">
					<h3>Current Drawings</h3>
                    	<table cellpadding="0" cellspacing="0">
							<tr>
                                <td>Daily Draw - Current Amount <b>$<? print $daily ?></b> - Status <b><? print $dailystatus ?></b> - Next Drawing <b><? print $dailydate ?></b></td>
                                
                            </tr>                        
							<tr class="odd">
                                <td>Weekly Draw - Current Amount <b>$<? print $weekly ?></b> - Status <b><? print $weeklystatus ?></b> - Next Drawing <b> <? print $weeklydate ?></b></td>
                        
                            </tr>                        
							<tr>
                                              <td>Monthly Draw - Current Amount <b>$<? print $monthly ?></b> - Status <b><? print $monthlystatus ?></b> - Next Drawing <b> <? print $monthlydate ?></b></td>
                           
                            </tr>
                            
                            
                            <?
							//my SQL query strings
	$query_raffle = "SELECT * FROM Raffle";
	@$result_raffle = mysql_query($query_raffle);
	@$numRows_raffle = mysql_num_rows($result_raffle);
							
   //output each row 
  while ($raffle_row = mysql_fetch_array($result_raffle)){

      $raffleid = $raffle_row['RaffleID'];
	  
		  	$raffle = $raffle_row['Amount'];
			$raffle_company = $raffle_row['CompanyAmount'];
			$raffle_charity = $raffle_row['CharityAmount'];
			$raffle_status = $raffle_row['RaffleStatus'];
			$raffle_name = $raffle_row['RaffleName'];
?>               
						<tr>
                                              <td>Raffle <? print $raffle_name ?> - Current Amount <b>$<? print $raffle ?></b> - Status <b><? print $raffle_status ?></b> </b></td></td>
                                <td class="action"><a href="updateraffle.php?id=<? print $raffleid ?>&action=disable" class="view">Disable</a><a href="updateraffle.php?id=<? print $raffleid ?>&action=enable" class="edit">Enable</a></td>
                            </tr>  
                            <?
							
  }
  ?>
							          
                        </table>
                        
                        <?
                //get all volume from drawn contests
	$query_drawn = "SELECT * FROM ContestAmount";
	@$result_drawn = mysql_query($query_drawn);
	@$numRows_drawn = mysql_num_rows($result_drawn);

//output each row 
  while ($drawn = mysql_fetch_array($result_drawn)){
   
      $cid = $drawn['ContestID'];
	  
	  if ($cid == '1')
	  {
 	$dcontest_amount = $drawn['Amount'];
	$dtotal_contest_amount = ($dtotal_contest_amount + $dcontest_amount);
	$dcompany_amount = $drawn['CompanyAmount'];
	$dtotal_company_amount = ($dtotal_company_amount + $dcompany_amount);
	$dcharity_amount = $drawn['CharityAmount'];
	$dtotal_charity_amount = ($dtotal_charity_amount + $dcharity_amount);

	

	  }
	  if ($cid == '2')
	  {
 	$wcontest_amount = $drawn['Amount'];
	$wtotal_contest_amount = ($wtotal_contest_amount + $wcontest_amount);
	$wcompany_amount = $drawn['CompanyAmount'];
	$wtotal_company_amount = ($wtotal_company_amount + $wcompany_amount);
	$wcharity_amount = $drawn['CharityAmount'];
	$wtotal_charity_amount = ($wtotal_charity_amount + $wcharity_amount);

	

	  }
	  if ($cid == '3')
	  {
 	$mcontest_amount = $drawn['Amount'];
	$mtotal_contest_amount = ($mtotal_contest_amount + $mcontest_amount);
	$mcompany_amount = $drawn['CompanyAmount'];
	$mtotal_company_amount = ($mtotal_company_amount + $mcompany_amount);
	$mcharity_amount = $drawn['CharityAmount'];
	$mtotal_charity_amount = ($mtotal_charity_amount + $mcharity_amount);

	

	  }
  }
  
  
  ?>
                
                	<form action="" class="jNice">
					<h3>YTD Processing</h3>
                    	<table cellpadding="0" cellspacing="0">
							<tr>
                                <td>Daily Draw - Total Amount <b>$<? print $dtotal_contest_amount ?></b> - Total Company Amount <b><? print $dtotal_company_amount ?></b> - Total Charity Amount <b><? print $dtotal_charity_amount ?></b></td>
                                
                            </tr>                        
							<tr class="odd">
                                <td>Weekly Draw - Total Amount <b>$<? print $wtotal_contest_amount ?></b> - Total Company Amount <b><? print $wtotal_company_amount ?></b> - Total Charity Amount <b><? print $wtotal_charity_amount ?></b></td>
                                
                            </tr>                        
							<tr>
                                              <td>Monthly Draw - Total Amount <b>$<? print $mtotal_contest_amount ?></b> - Total Company Amount <b><? print $mtotal_company_amount ?></b> - Total Charity Amount <b><? print $mtotal_charity_amount ?></b></td></td></tr>
                                              
                                              <?
							//my SQL query strings
	$query_raffle = "SELECT * FROM Raffle";
	@$result_raffle = mysql_query($query_raffle);
	@$numRows_raffle = mysql_num_rows($result_raffle);
							
   //output each row 
  while ($raffle_row = mysql_fetch_array($result_raffle)){

      $raffleid = $raffle_row['RaffleID'];
	  
		  	$raffle = $raffle_row['Amount'];
			$raffle_company = $raffle_row['CompanyAmount'];
			$raffle_charity = $raffle_row['CharityAmount'];
			$raffle_status = $raffle_row['RaffleStatus'];
			$raffle_name = $raffle_row['RaffleName'];
			
?>               
						<tr>
                    <td>Raffle - <? print $raffle_name ?> Total Amount <b>$<? print $raffle ?></b> - Total Company Amount <b><? print $raffle_company ?></b> - Total Charity Amount <b><? print $raffle_charity ?></b></td></td>
                            </tr>  
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


