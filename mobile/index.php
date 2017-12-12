<?php
// connect to database 
include("include/conn.php"); 


//get company info
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

	//get current contest amounts
	$query_selectAllItems = "SELECT * FROM ContestAmount WHERE '$now' between DrawingStart and DrawingEnd";
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);

	setlocale(LC_MONETARY, 'en_US');

	
	
//output each row for contest amounts
  while ($contest_row = mysql_fetch_array($result_all)){

      $cid = $contest_row['ContestID'];
	  if ($cid == '1')
	  {	  	
	  	$daily = $contest_row['Amount'];
		$dailystatus = $contest_row['Status'];
		}

	    if ($cid == '2')
	{
		  
		  $weekly = $contest_row['Amount'];
		  $weeklystatus = $contest_row['Status'];

	  }
	    if ($cid == '3')
	  {
		  $monthly = $contest_row['Amount'];
		  $monthlystatus = $contest_row['Status'];
	}
	  
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
    </div>
<div class="content">

<br><br><hr>

        
  
      <center>
      
      

                <table align="center" width="210" valign="top">
                <?
				if ($dailystatus==NULL)
				{
					?><tr valign="top"><td>
				UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>This drawing is coming soon!  Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
                
                }
				Else if ($time=='20')
				{
					?><tr valign="top"><td>
				UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>Drawing will resume in an hour.  Please check back!</b> <br><br><br><br><br><br><br><br>
</td></tr>
				<?
				}
				else
				
				{
					
					//contest stuff
	$query_selectcontest = "SELECT * FROM Contest";
	@$result_contest = mysql_query($query_selectcontest);
	@$numRows_contest = mysql_num_rows($result_contest);
//output each row 
  while ($contest = mysql_fetch_array($result_contest)){
$cid = $contest['ContestID'];
	  if ($cid == '1')
	  {	 
	  $price=$contest['Price'];
	  $price2=$contest['Bundle1Price'];
	  $price3=$contest['Bundle2Price'];
	  }
	  if ($cid == '2')
	  {	 
	  $price_weekly=$contest['Price'];
	  $price2_weekly=$contest['Bundle1Price'];
	  $price3_weekly=$contest['Bundle2Price'];
	  }
	    if ($cid == '3')
	  {	 
	  $price_monthly=$contest['Price'];
	  $price2_monthly=$contest['Bundle1Price'];
	  $price3_monthly=$contest['Bundle2Price'];
	  }
  }
					
					
					?>
                    <tr valign="top">
<td align="center"><br><b>Daily BIG Draw!</b><br><b><h3>Current Jackpot:  <br><? print money_format('%(#10n', $daily) ?></b></h3> <br><br>
<a href="buy.php?contestID=1&ticket=1&cost=<? print $price ?>" class="button orange">1 Ticket for <? print money_format('%n', $price) ?></a><br>
<a href="buy.php?contestID=1&ticket=3&cost=<? print $price2 ?>" class="button blue">3 Tickets for <? print money_format('%n', $price2) ?></a><br>
<a href="buy.php?contestID=1&ticket=5&cost=<? print $price3 ?>" class="button green">5 Tickets for <? print money_format('%n', $price3) ?></a><br><br></td></tr>
<tr><td colspan="2" align="center">
<h3><b>UP TO 1,000,000 TICKETS SOLD DAILY WORLDWIDE!</b></h3>
</td>


<?
	 
 
				}
				
				?>
    </tr></table>             

	
       </center>
       <hr>

     
        <center>
               <table align="center" width="212">
                
                <?
				if ($weeklystatus==NULL)
				{
					?>
				<tr valign="top"><td>UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>This drawing is coming soon!   Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
                
                }
				Else if ($time=='20')
				{
					?>
				<tr valign="top"><td>UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>Drawing will resume in an hour.  Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
				}
				else
				{
					
					
					
					?>
                    <tr valign="top">
                    
                   <td align="center"><br><b>Weekly JUMBO Draw!</b><br><b><h3>Current Jackpot:  <br><? print money_format('%(#10n', $weekly) ?></b></h3> 
<a href="buy.php?contestID=2&ticket=1&cost=<? print $price_weekly ?>" class="button orange">1 Ticket for <? print money_format('%n', $price_weekly) ?></a><br>
<a href="buy.php?contestID=2&ticket=3&cost=<? print $price2_weekly ?>" class="button blue">3 Tickets for <? print money_format('%n', $price2_weekly) ?></a><br>
<a href="buy.php?contestID=2&ticket=5&cost=<? print $price3_weekly ?>" class="button green">5 Tickets for <? print money_format('%n', $price3_weekly) ?></a><br><br></td></tr>
<tr><td colspan="2" align="center">
<h3><b>UP TO 10,000,000 TICKETS SOLD WEEKLY WORLDWIDE!</b></h3>
</td>


<?

				}
				
				?>
</tr></table> </center>

<hr>
<center><table align="center" width="215">
                <?
				if ($monthlystatus==NULL)
				{
					?><tr valign="top"><td>
				UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>This drawing is coming soon!   Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
                
                }
				Else if ($time=='20')
				{
					?><tr valign="top"><td>
				UP TO 1,000, 000 TICKETS DAILY 1 TICKET WINS HALF THE CASH GUARANTEED!!! <br><br><b>Drawing will resume in an hour.  Please check back!</b> <br><br><br><br><br><br><br><br>
</td>	</tr>
				<?
				}
				else
				{
					?>
                    
                   <tr valign="top"><td align="center"><br><b>Monthly MONSTER Draw!</b><br><b><h3>Current Jackpot: <br> <? print money_format('%(#10n', $monthly) ?></b></h3> <br><br>
<a href="buy.php?contestID=3&ticket=1&cost=<? print $price_monthly ?>" class="button orange">1 Ticket for <? print money_format('%n', $price_monthly) ?></a><br>
<a href="buy.php?contestID=3&ticket=3&cost=<? print $price2_monthly ?>" class="button blue">3 Tickets for <? print money_format('%n', $price2_monthly) ?></a><br>
<a href="buy.php?contestID=3&ticket=5&cost=<? print $price3_monthly ?>" class="button green">5 Tickets for <? print money_format('%n', $price3_monthly) ?></a><br><br></td></tr>
<tr><td colspan="2" align="center">
<h3><b>UP TO 100,000,000 TICKETS SOLD MONTHLY WORLDWIDE!</b></h3>
</td>

  <?

				}
				
				?>

</tr></table></div><hr>
</center><br><br>
<!--  don't forget to borrow the Facebook, Twitter, RSS, and Creative Commons icons  -->
<?php
// connect to database 
require("footer.php"); 

 

?>
</div>
  
</body>
</html>