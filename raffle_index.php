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
$category = $_GET['category'];


$timezone = $company_row['CompanyTimeZone'];

$date = new DateTime("now", new DateTimeZone($company_row['CompanyTimeZone']) );
$now = $date->format('Y-m-d');
$time = $date->format('H');
$id = $_GET['id'];





	
	
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
        

 


        
       
        
   <div id="content_holder"><center>
        
                <div class="drop-shadow2 raised">
  
                 
<center>
<table width="900">
       <tr><td colspan="13"><h3><b>Current Raffles</b></h3><br><br>
                            <div class="separator"></div><br><br><br><br>
                            </td></tr>
      </table>
                    	<table cellpadding="0" cellspacing="0">
				                       
		<tr>
                                <td valign="top"><b>Name</b> </td><td width="75"></td>
                                <td><b>Value</b></td><td width="75"></td>
                                <td><b>Description</b></td><td width="75"></td>
                                <td><b>Amount Sold:</b></td><td width="75"></td>
                                <td></td><td width="75"></td><td></td><td><b>Buy Tickets</b></td>
                            </tr> 					
                            
                            
                            <?
							
							//my SQL query strings
	$query_raffle = "SELECT * FROM Raffle where RaffleCategory = '$category' AND RaffleStatus = 'open' AND RaffleMax >= Amount";
	@$result_raffle = mysql_query($query_raffle);
	@$numRows_raffle = mysql_num_rows($result_raffle);
                            //echo $query_raffle;
							
   //output each row 
  while ($raffle_row = mysql_fetch_array($result_raffle)){

      		$raffleid = $raffle_row['RaffleID'];
	  
		  	$raffle = $raffle_row['Amount'];
			$raffle_company = $raffle_row['CompanyAmount'];
			$raffle_charity = $raffle_row['CharityAmount'];
			$raffle_status = $raffle_row['RaffleStatus'];
			$raffle_name = $raffle_row['RaffleName'];
			$path = $raffle_row['GalleryName'];
			$image = $raffle_row['Image0'];
			$image1 = $raffle_row['Image1'];
			$image2 = $raffle_row['Image2'];
			$image3 = $raffle_row['Image3'];
			$image4 = $raffle_row['Image4'];
			$value = $raffle_row['Value'];
			$desc = $raffle_row['RaffleDescription'];
			$amount = $raffle_row['Amount'];
			$raffleprice = $raffle_row['RaffleTicketPrice'];
			$raffleprice3 = $raffle_row['RaffleBundle3'];
			$raffleprice5 = $raffle_row['RaffleBundle5'];
			$id = $raffle_row['RaffleID'];
?>              
 
 
 <tr><td colspan="13"><br><br>
                            <div class="separator"></div>
                            <br><br>
                            </td></tr>

						<tr>
                                <td valign="top"><? print $raffle_name ?> </td><td width="75"></td>
                                <td valign="top"><? print $value ?></td><td width="75"></td>
                                <td valign="top"><? print $desc ?></td><td width="75"></td>
                                <td valign="top"><? print money_format('%(#10n', $amount) ?> </td><td width="75"></td>
                                <td></td><td width="75"></td><td></td>
                                
                                
                                <td align="center">
<a href="buy.php?name=<? print $raffle_name ?>&contestID=<? print $id ?>&ticket=1&cost=<? print $raffleprice ?>&raffle=yes" class="button orange">1 Ticket for <? print money_format('%n', $raffleprice) ?></a><br>
<a href="buy.php?name=<? print $raffle_name ?>&contestID=<? print $id ?>&ticket=3&cost=<? print $raffleprice3 ?>&raffle=yes" class="button blue">3 Tickets for <? print money_format('%n', $raffleprice3) ?></a><br>
<a href="buy.php?name=<? print $raffle_name ?>&contestID=<? print $id ?>&ticket=5&cost=<? print $raffleprice5 ?>&raffle=yes" class="button green">5 Tickets for <? print money_format('%n', $raffleprice5) ?></a><br><br></td></tr>


                                
                                
                                
                            </tr>  
                            <tr><td colspan="13"><center>
                            
                            <table><tr><td><br><br>
                                               <div>
      <a class="example-image-link" href="upload/<? print $path ?>/<? print $image ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="upload/<? print $path ?>/thumbs/<? print $image ?>" alt=""/></a>
            <a class="example-image-link" href="upload/<? print $path ?>/<? print $image1 ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="upload/<? print $path ?>/thumbs/<? print $image1 ?>" alt=""/></a>
                  <a class="example-image-link" href="upload/<? print $path ?>/<? print $image2 ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="upload/<? print $path ?>/thumbs/<? print $image2 ?>" alt=""/></a>
                        <a class="example-image-link" href="upload/<? print $path ?>/<? print $image3 ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="upload/<? print $path ?>/thumbs/<? print $image3 ?>" alt=""/></a>
                              <a class="example-image-link" href="upload/<? print $path ?>/<? print $image4 ?>" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="upload/<? print $path ?>/thumbs/<? print $image4 ?>" alt=""/></a>
 
    </div></center>
    
    <br><br><br><br>
    </td></tr></table>
    </td></tr>
                           
                            <?
							
  }
  ?>
				 <tr><td colspan="13"><br><br>
                            <div class="separator"></div>
                            <br><br>
                            </td></tr>			          
                        </table></center>
  </div></center>
       
  <script src="css/lightbox/js/lightbox-plus-jquery.js"></script>     
       
       

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