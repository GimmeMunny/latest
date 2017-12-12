<? 
// connect to database 
include("include/conn.php");

//get any variables from browser query string
	$email=$_GET['email'];
	
	//my SQL query strings
	$query_deleteItem = "DELETE FROM Email WHERE EmailAddress='$email'";
	mysql_query($query_deleteItem);
	

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
  <HEAD>
  <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
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
	
 }
 

//-->
</script>
<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/master.css";</style>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
	

	<script src="js/jquery-1.2.6.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/form-fun.jquery.js" type="text/javascript" charset="utf-8"></script>
        
  </HEAD>
<body>

<div id="menuheader"> 
<a href="index.php" onmouseover="document.rollover.src=button2.src" onmouseout="document.rollover.src=button1.src"><img src="images/home.png" border=0 name="rollover"></a>
<a href="about.php" onmouseover="document.rollover2.src=button4.src" onmouseout="document.rollover2.src=button3.src"><img src="images/about.png" border=0 name="rollover2"></a>
<a href="contact.php" onmouseover="document.rollover4.src=button8.src" onmouseout="document.rollover4.src=button7.src"><img src="images/contact.png" border=0 name="rollover4"></a>
</div>




        <div id="logo">
<a href="index.php"><img src="images/logos.png" border="0"/></a>
        </div>




                
        <div class="separator"></div>
        
        <div id="content_holder">
        
               
               
		
		
 <div class="drop-shadow-white raised">
                <table width="100%"><tr><td><b>You have been removed from the mailing list:</b><br>

        We hope you keep buying tickets, because there is a single winning ticket guaranteed every draw!
        
        
       <? print $query_deleteItem; ?>

</b>  


<div class="row">
  <div class="col left">
  
  </div>
  <div class="col right">
  
  </div>
</div>
</td>
 <td>
 <div class="row">
  <div class="col left">
  <h1><font color="#000000">Tell a Friend!</font></h1>
    <p><small>
      Spread the word, tell a friend today!
    </small></p>
  </div>
  <div class="col right">
  <button class="btn facebook" data-provider="facebook"><i></i><span>Facebook</span></button>
  <button class="btn twitter" data-provider="twitter"><i></i><span>Twitter</span></button>
  <button class="btn plus" data-provider="google plus"><span class="i"><i></i></span><span>Google Plus</span></button>
  </div>
</div>
 
 
 </td></tr></table></div>
        
        
                        
  <div class="content_prizes">
                <table><tr><td>
                
                <img src="images/car.png"><td>
 </td><td><img src="images/plane.png"></td>
 <td><img src="images/ring.png"></td>
  <td><img src="images/dinner.png"></td>
   <td><img src="images/sports.png"></td></tr></table></div>


<div id="footer">
<div class="separator4"></div>

Pricing Structure | Privacy | Transaction Processing | Non Operatering Hours | Responsible Gaming | Disclaimers | FAQ's | Contact Us | Charity Software</div>





	


	
        
  </body>
</HTML>