<?php

// Set this anytime before the mail() function is called
//ini_set('sendmail_from', 'user@domain.tld'); // Set only on Windows
//ini_set('SMTP', 'relay-hosting.secureserver.net');



$form_name=$_POST['name'];
$form_to=$_POST['to'];
$form_phone=$_POST['web'];
$form_email=$_POST['email'];
$form_request=$_POST['text'];

if (empty($form_name)){
	
	
	header("LOCATION: contact.html");
	exit;
	
}
	else;



	//$to = "john.buckle@gimmemunny.com"; 
	$to = $form_to; 
    $from = "mail@gimmemunny.com"; 
    $subject = "New Contact Form."; 

    $message = '<html><head>';
    $message .= '<title>Someone always wins.</title>';
    $message .= '</head>';
    $message .= '<body bgcolor="#000000"><center>';
    $message .= '<table width="100%" height="300" bgcolor="#000000"><tr><td>';
    $message .= '<table>';
    $message .= '<tr><td><font color="#FFFFFF"><b>You got a new contact form!</b></td><td></td></tr>';
    $message .= '<tr><td><font color="#FFFFFF">Name:</td><td><font color="#FFFFFF">'.$form_name.'</td></tr>';
    $message .= '<tr><td><font color="#FFFFFF">Email:</td><td><font color="#FFFFFF">'.$form_email.'</td></tr>';
    $message .= '<tr><td><font color="#FFFFFF">Request:</td><td><font color="#FFFFFF">'.$form_request.'</td></tr>';
	$message .= '</table></td></tr><tr><td>';
	$message .= '<table bgcolor="#333333"><tr><td>';	
    $message .= '</td></tr></table></td></tr></table>';	
    $message .= '</table></body></html>';

	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
	

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>
  <HEAD>
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
<title>GimmeMunny.com - Someone Always Wins!</title>
        
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
        
        <div class="content_images"><img src="images/images.png"></div>
        
        <div id="content_holder">
        
                <div class="drop-shadow-content5 raised">
  
      

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
            Thank you for your email!
            

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
  </div>

 <div class="content_prizes">
                <table><tr><td>
                
                <img src="images/car.png"><td>
 </td><td><img src="images/plane.png"></td>
 <td><img src="images/ring.png"></td>
  <td><img src="images/dinner.png"></td>
   <td><img src="images/sports.png"></td></tr></table></div>

<?php
// connect to database 
require("footer.php"); 

?>








	


	
        
  </body>
</HTML>