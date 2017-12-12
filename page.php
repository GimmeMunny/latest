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
		$content_title = htmlspecialchars($content['ContentName']);	
	}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
  <HEAD>
  
		<script src="js/modernizr.custom.63321.js"></script>
  <script language="Javascript">
<!--
//Slide Show script (this notice must stay intact)
//For this and more scripts
//visit java-scripts.net or http://wsabstract.com

if (document.images) {
     button1 = new Image
     button2 = new Image

     button1.src = 'images/home.png'
     button2.src = 'images/althome.png'
	 
	 button3 = new Image
     button4 = new Image

     button3.src = 'images/about.png'
     button4.src = 'images/altabout.png'
	 
	
	 
	 button7 = new Image
     button8 = new Image

     button7.src = 'images/contact.png'
     button8.src = 'images/altcontact.png'
	 
	 button9 = new Image
     button10 = new Image

     button9.src = 'images/tell.png'
     button10.src = 'images/alttell.png'
	
 }
//-->
</script>
<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>
<title>GimmeMunny.com - Someone Always Wins!</title>
        
   </HEAD>
<body>

<div id="menuheader"> 
<a href="index.php" onmouseover="document.rollover.src=button2.src" onmouseout="document.rollover.src=button1.src"><img src="images/home.png" border=0 name="rollover"></a>
<a href="page.php?id=49" onmouseover="document.rollover2.src=button4.src" onmouseout="document.rollover2.src=button3.src"><img src="images/about.png" border=0 name="rollover2"></a>
<a href="contact.php" onmouseover="document.rollover4.src=button8.src" onmouseout="document.rollover4.src=button7.src"><img src="images/contact.png" border=0 name="rollover4"></a>
    <br>
 <a href="contact.php"><img src="images/tell.png" border=0></a><br>


</div>

                            


        <div id="logo">
<a href="index.php"><img src="images/logos.png" border="0"/></a>
        </div><br><br><br>
        
         <div class="content_images"><img src="images/images.png"></div>
        

 


        
       
        
        <div id="content_holder">
        
                <div class="drop-shadow-content3 raised">
  
                 <h1><? print $content_title ?></h1>

<p>
<? print $content_blog ?>

</p>
  </div>
       
       
       
       

 <div class="separator"></div>
 

 
 
 <div class="content_prizes">
                <table><tr><td>
                
                <img src="images/car.png"><td>
 </td><td><img src="images/plane.png"></td>
 <td><img src="images/ring.png"></td>
  <td><img src="images/dinner.png"></td>
   <td><img src="images/sports.png"></td></tr></table></div>

<?php
 //get current raffle
	$query_raffle = "SELECT * FROM Raffle WHERE RaffleStatus = 'open' AND RaffleMax >= Amount";
	@$result_raffle = mysql_query($query_raffle);
	@$numRows_raffle = mysql_num_rows($result_raffle);
	$i='0';
	$car='0';
	$ti='0';
	$ji='0';
	$di='0';
	$si='0';
  while ($raffle = mysql_fetch_array($result_raffle)){
$rid = $raffle['RaffleID'];
$category = $raffle['RaffleCategory'];
if ($rid!=NULL and $category=='Car'){
	
	$car++;
	$carlink = 'There is '.$car.' Current Raffles!!';
}
elseif ($rid!=NULL and $category=='Trip'){
	
	$ti++;
	$triplink = 'There is '.$ti.' Current Raffles!!';
}
elseif ($rid!=NULL and $category=='Jewelry'){
	
	$ji++;
	$jewelrylink = 'There is '.$ji.' Current Raffles!!';
}
elseif ($rid!=NULL and $category=='Electronics'){
	$di++;
	$electroniclink = 'There is '.$di.' Current Raffles!!';
}
elseif ($rid!=NULL and $category=='Sports'){
	$si++;
	$sportslink = 'There is '.$si.' Current Raffles!!';
}
else {
	$sportslink = 'No Raffles at this time.';
	$carlink = 'No Raffles at this time.';
	$triplink = 'No Raffles at this time.';
	$electroniclink = 'No Raffles at this time.';
	$jewelrylink = 'No Raffles at this time.';
	
}



  }
  
 ?>  
 <tr>
<td><a href="raffle_index.php?category=Car"><? echo $carlink ?></a></td>
<td> <a href="raffle_index.php?category=Trip"><? echo $triplink ?></a></td>
<td> <a href="raffle_index.php?category=Jewelry"><? echo $jewelrylink ?></a></td>
<td><a href="raffle_index.php?category=Electronics"> <? echo $electroniclink ?></a></td>
<td> <a href="raffle_index.php?category=Sports"><? echo $sportslink ?></a></td>

</tr></table>  



 </div>



<?php
// connect to database 
require("footer.php"); 

  
  

?>




	


	
        
  </body>
</HTML>