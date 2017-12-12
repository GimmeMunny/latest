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
<script type="text/JavaScript">
<!-- Begin
function TestFileType( files, fileTypes ) {
if (!files) return;

dots = files.split(".")
//get the part AFTER the LAST period.
fileType = "." + dots[dots.length-1];

return (fileTypes.join(".").indexOf(fileType) != -1) ?
alert('That file is OK!') : 
alert("Please only upload files that end in types: \n\n" + (fileTypes.join(" .")) + "\n\nPlease select a new file and try again.");
}
// -->
</script>

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
	
	//my SQL query strings
	$query_raffle = "SELECT * FROM Raffle";
	//$query_selectAllItems = 'SELECT * FROM ContestAmount WHERE DATE(Date)=CURDATE()';
	@$result_raffle = mysql_query($query_raffle);
	@$numRows_raffle = mysql_num_rows($result_raffle);


	
	
//output each row 
  while ($contest_row = mysql_fetch_array($result_all)){

      $cid = $contest_row['ContestID'];
	  if ($cid == '1')
	  {
		  	$daily = $contest_row['Amount'];
		   $dailystatus = $contest_row['Status'];
		   $dailyid = $contest_row['ContestAmountID'];
		   $dailydate = $contest_row['DrawingEnd'];
		   
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
                <h2><a href="#">Dashboard</a> &raquo; <a href="#" class="active">Create Raffle</a></h2>
                
                <div id="main">
                
                                	<h3>Create Raffle</h3>
                                    <form method="post" action="submitraffle.php" enctype='multipart/form-data'>
                    	<fieldset>
                        	<p><label>Raffle Name:</label><input type="text" class="text-long" name="name"/></p>
                            <p><label>Raffle Category:</label><select name="category">
                            <option value="none">Please Select</option>
                            <?
							//my SQL query strings
	$query_cat = "SELECT * FROM RaffleCategory";
	@$result_cat = mysql_query($query_cat);
	@$numRows_cat = mysql_num_rows($result_cat);

	
					//output each row 
  while ($cat_row = mysql_fetch_array($result_cat)){
					
					
					?>

  <option value="<? print $cat_row['CategoryName'] ?>"><? print $cat_row['CategoryName'] ?></option>

	                      
	                        
							          
                        
                    
                    <?
  }
					
					?>
                            
                            
                            </select></p>
                            <p><label>Raffle Value:</label><input type="text" class="text-medium" name="rafflevalue"/></p>
                        	<p><label>Raffle Max:</label><input type="text" class="text-medium" name="raffleamount"/></p>
                            <p><label>Raffle Ticket Price:</label><input type="text" class="text-medium" name="price"/></p>
                            <p><label>Raffle 3 Bundle Price:</label><input type="text" class="text-medium" name="bundle3"/></p>
                            <p><label>Raffle 5 Bundle Price:</label><input type="text" class="text-medium" name="bundle5"/></p>
                        	<p><label>Raffle Description:</label><textarea rows="1" cols="1" name="desc"></textarea></p>
                            <p><label>CHOOSE IMAGES(ONLY JPG OR JPEG IMAGES):</label></p>
                            <p><label>Image 1 (should be main image): </label><input type='file' name='files[]'><input type="button" name="Test" value="Test" onclick="TestFileType(this.form.uploadfile.value, ['gif', 'jpg', 'png', 'jpeg'])"></p>
                            <p><label>Image 2: </label><input type='file' name='files[]'></p>
                            <p><label>Image 3: </label><input type='file' name='files[]'></p>
                            <p><label>Image 4: </label><input type='file' name='files[]'></p>
                            <p><label>Image 5: </label><input type='file' name='files[]'></p>
                            <input type="submit" value="Create Raffle" />
                        </fieldset>
                    </form>
                    <h3>Existing Raffles/Edit Raffles</h3>
                    <table cellpadding="0" cellspacing="0">
                                     <?
					//output each row 
  while ($raffle_row = mysql_fetch_array($result_raffle)){
					
					
					?>
							<tr>
                                <td>Raffle Name:  <b><? print $raffle_row['RaffleName'] ?></b>  - Status <b><? print $raffle_row['RaffleStatus'] ?></b>  </td>
                                <td class="action"><a href="editraffle.php?id=<? print $raffle_row['RaffleID'] ?>&action=edit" class="view">Edit</a><a href="updateraffle.php?id=<? print $raffle_row['RaffleID'] ?>&action=disable" class="view">Disable</a><a ><a href="updateraffle.php?id=<? print $raffle_row['RaffleID'] ?>&action=enable" class="edit">Enable</a></td>
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


