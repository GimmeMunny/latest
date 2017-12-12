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
        <center>
                <div class="drop-shadow-content3 raised">
  
      

                 Contact Us</strong>
          <table width="1200"><tr valign="top"><td rowspan="4"><b>Tell a Friend about <? print $companyurl ?>!!
          
                  <section class="main">
				<form class="form-1" action="signup.php">
                <p>Tell A Friend!</p>
                <p class="field">
						<input type="text" name="name" placeholder="Your Name">
						<i class="icon-user icon-large"></i>
					</p>
					<p class="field">
						<input type="text" name="email" placeholder="Your Friend's Email Address">
						<i class="icon-user icon-large"></i>
					</p>
				<p>Enter Email Address</p>
					<p class="submit">
						<button type="submit" name="submit"><i class="icon-arrow-right icon-large"></i></button>
					</p>
				</form>
			</section></td><td width="700"></td></tr>
            <tr><td>
            <div id="form-div">
    <form class="form" id="form1" action="sendmail.php" method="post">
    <select>
    <option value="FranchiseeSales@gimmemunny.com">FranchiseeSales@gimmemunny.com</option>
    <option value="InvestorRelations@gimmemunny.com">InvestorRelations@gimmemunny.com</option>
    <option value="Marketing@gimmemunny.com">Marketing@gimmemunny.com</option>
    <option value="Advertising@gimmemunny.com">Advertising@gimmemunny.com</option>
    <option value="CharitySoftware@gimmemunny.com">CharitySoftware@gimmemunny.com</option>
    <option value="CustomerRelations@gimmemunny.com">CustomerRelations@gimmemunny.com</option>
    </select><label for="to">To</label>
      <p class="name">
        <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] text-input" id="name" value="My Name" />
        <label for="name">Name</label>
      </p>
      <p class="email">
        <input name="email" type="text" class="validate[required,custom[email]] text-input" id="email" value="email@email.com" />
        <label for="email">E-mail</label>
      </p>
  
      <p class="text">
        <textarea name="text" class="validate[required,length[6,300]] text-input" id="comment"></textarea>
      </p>
      <p class="submit">
        <input type="submit" value="Send" />
      </p>
    </form>
            

</td></tr><tr><td>


    
    <br>
    
    UK Office
72 High Street, 
Haslemere, Surrey GU27 2LA

<br><br>
**DO NOT send regular post / ground mail to above address. <br>Please forward all ground correspondence to:<br><br>
Office of the President<br>
76 Wyman Crescent<br>
Bradford, ON, Canada<br>
L3Z 3J6


</td></tr></table>
 

</p>
  </div></center>

  </div>
       
       
       
       

 <div class="separator"></div>
 

 
 
 <div class="content_prizes"><center>
                <table><tr><td>
                
                <img src="images/car.png"><td>
 </td><td><img src="images/plane.png"></td>
 <td><img src="images/ring.png"></td>
  <td><img src="images/dinner.png"></td>
   <td><img src="images/sports.png"></td></tr></table></center></div>

<?php
// connect to database 
require("footer.php"); 

?>








	


	
        
  </body>
</HTML>