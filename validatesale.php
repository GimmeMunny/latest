 <?php

include("include/conn.php"); 

 /***********************************************************************
       Description：1、Please transafer interface parameters to our payment gateway by using POST.
                    2、Testing datas,Signkey,MerchantNo.,GatewayNo. have been writen into other parameters in demo.Please write down your value in following variate accordingly.
                    3、After payment, it will return XML
  
      ************************************************************************/
 

     


        //customer's IP
		//$ip 		   = '109.203.126.124';  


        $ip = $_SERVER['REMOTE_ADDR'];

		$interfaceInfo='mystore';



       
      $orderNo          = trim($_POST['orderNo']);

        $orderCurrency    = "USD";
       
      //$orderCurrency    = trim($_POST['orderCurrency']);

      $orderAmount      = trim($_POST['orderAmount']);

      $firstName        = trim($_POST['firstName']);

      $lastName         = trim($_POST['lastName']);

      $cardNo           = trim($_POST['cardNo']);


$number =  $cardNo[0];  

  $url  = "https://co.onlineb2cmall.com/TPInterface"; // Test Interface ---> https://xx.com/TestTPInterface - visa live
        $merNo            = "20367"; //MerchantNo.
        $gatewayNo        = "20367001"; //GatewayNo.
        $signkey          = "T088th40"; //SignKey

/*if ($number == "4"){
    //visa
        //$url  = "https://co.onlineb2cmall.com/TestTPInterface"; // Test Interface ---> https://xx.com/TestTPInterface - visa test
        $url  = "https://co.onlineb2cmall.com/TPInterface"; // Test Interface ---> https://xx.com/TestTPInterface - visa live
        $merNo            = "20367"; //MerchantNo.
        $gatewayNo        = "20367001"; //GatewayNo.
        $signkey          = "T088th40"; //SignKey
}
elseif  ($number == "5"){
        //mastercard
        //$url  = "https://shoppingingstore.com/TestTPInterface"; // Test Interface ---> https://xx.com/TestTPInterface  mc test
        $url  = "https://shoppingingstore.com/TPInterface"; // Test Interface ---> https://xx.com/TestTPInterface  mc live
        $merNo            = "33423"; //MerchantNo.
        $gatewayNo        = "33423001"; //GatewayNo.
        $signkey          = "f24h6FH8"; //SignKey
    
}
echo $url;*/

      $cardExpireYear   = trim($_POST['cardExpireYear']);

      $cardExpireMonth  = trim($_POST['cardExpireMonth']);

      $cardSecurityCode = trim($_POST['cardSecurityCode']);

      $email            = trim($_POST['email']);

      $issuingBank      = "LocalBank";

      $phone            = trim($_POST['phone']);

        //$ip               = "109.203.126.124";

      //$ip               = trim($_POST['ip']);

      $signInfo         = hash('sha256' , $merNo.$gatewayNo.$orderNo.$orderCurrency.$orderAmount.$firstName.$lastName.$cardNo.$cardExpireYear.$cardExpireMonth.$cardSecurityCode.$email.$signkey );

//echo $signInfo;


       
      $country          = trim($_POST['country']);

      $state            = trim($_POST['state']);

      $city             = trim($_POST['city']);

      $address          = trim($_POST['address']);

      $zip              = trim($_POST['zip']);

      $returnUrl        = trim($_POST['returnUrl']); //real trading websites

      //$csid             = trim($_POST['csid']);
     /****************************** 
       Submitting parameters by using curl and get returned XML parameters
      
     ****************************/
      $arr = array(
             'merNo'            => $merNo,            //MerchantNo.
             'gatewayNo'        => $gatewayNo,        //GatewayNo.
             'orderNo'          => $orderNo,          //OrderNo.
             'orderCurrency'    => $orderCurrency,    //OrderCurrency
             'orderAmount'      => $orderAmount,      //OrderAmount
             'firstName'        => $firstName,        //FirstName
             'lastName'         => $lastName,         //lastName
             'cardNo'           => $cardNo,           //CardNo
             'cardExpireMonth'  => $cardExpireMonth,  //CardExpireMonth
             'cardExpireYear'   => $cardExpireYear,   //CardExpireYear
             'cardSecurityCode' => $cardSecurityCode, //CVV
             'issuingBank'      => $issuingBank,      //IssuingBank
             'email'            => $email,            //EmailAddress
             'ip'               => $ip,               //ip
             'returnUrl'        => $returnUrl,          //real trading websites
             'phone'            => $phone,            //Phone Number 
             'country'          => $country,          //Country
             'state'            => $state,            //State
             'city'             => $city,             //City
             'address'          => $address,          //Address
             'zip'              => $zip,              //Zip Code
             'signInfo'         => $signInfo          //SignInfo 
             //'csid'             => $csid
            );
      
       $data =  http_build_query($arr);

       
        
        





      //$url  = "http://beevip.com/post.php"; // Test Interface ---> https://xx.com/TestTPInterface  
       
            
            //===============================
                $curl = curl_init($url);
            curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl,CURLOPT_HEADER, 0 ); // Colate HTTP header
            curl_setopt($curl,CURLOPT_RETURNTRANSFER, 1);// Show the output
            curl_setopt($curl,CURLOPT_POST,true); // Transmit datas by using POST
            curl_setopt($curl,CURLOPT_POSTFIELDS,$data);//Transmit datas by using POST
            curl_setopt($curl,CURLOPT_REFERER,$returnUrl);
            $xmlrs = curl_exec($curl);
            curl_close ($curl); 

            $xmlob = simplexml_load_string(trim($xmlrs));

            
            $merNo        = (string)$xmlob->merNo; //return merNo    
            $gatewayNo    = (string)$xmlob->gatewayNo;//return gatewayNo
            $tradeNo      = (string)$xmlob->tradeNo;//return tradeNo
            $orderNo      = (string)$xmlob->orderNo;//return orderno
            $orderAmount  = (string)$xmlob->orderAmount;//return orderAmount
            $orderCurrency= (string)$xmlob->orderCurrency;//return orderCurrency
            $orderStatus  = (string)$xmlob->orderStatus;//return orderStatus
            $orderInfo    = (string)$xmlob->orderInfo;//return orderInfo
            $signInfo     = (string)$xmlob->signInfo;//return signInfo
            $riskInfo     = (string)$xmlob->riskInfo;//return riskInfo
 
//===============================

            $xmlob = simplexml_load_string(trim($xmlrs));

            
            $merNo        = (string)$xmlob->merNo; //return merNo    
            $gatewayNo    = (string)$xmlob->gatewayNo;//return gatewayNo
            $tradeNo      = (string)$xmlob->tradeNo;//return tradeNo
            $orderNo      = (string)$xmlob->orderNo;//return orderno
            $orderAmount  = (string)$xmlob->orderAmount;//return orderAmount
            $orderCurrency= (string)$xmlob->orderCurrency;//return orderCurrency
            $orderStatus  = (string)$xmlob->orderStatus;//return orderStatus
            $orderInfo    = (string)$xmlob->orderInfo;//return orderInfo
            $signInfo     = (string)$xmlob->signInfo;//return signInfo
            $riskInfo     = (string)$xmlob->riskInfo;//return riskInfo

            //signInfocheck
            $signInfocheck=hash('sha256',$merNo.$gatewayNo.$tradeNo.$orderNo.$orderCurrency.$orderAmount.$orderStatus.$orderInfo.$signkey);

            //Returned signinfo of the encrypted string is capitalized, converted to lowercase, having returned encrypted signinfo string compare with the generated encrypted signainfo.
            if (strtolower($signInfo) == strtolower($signInfocheck)){

                  //if return success
                  if($orderStatus == "1"){
                        /* payment success,update orderInfo */
                        //echo 'success'.$orderInfo.'<br>'.$orderStatus;
                      //echo $orderAmount;
                      //echo $orderNo;
                      $message = $orderInfo;
                      //echo '<br>'.$orderInfo;
                      
 $query_order = "SELECT * FROM Ticket WHERE OrderNumber='$orderNo'";
	@$result_order = mysql_query($query_order);
	@$numRows_order = mysql_num_rows($result_order);
	$o_row = mysql_fetch_array($result_order);
	$raffle = $o_row['Raffle'];
	$contest = $o_row['ContestID'];
	$query_update = "UPDATE Ticket SET Fname = '$firstName', Lname = '$lastName', Address = '$address', City = '$city', State = '$state', Zip = '$zip', Country = '$country', Phone = '$phone', IP = '$ip', Email = '$email' WHERE OrderNumber= '$orderNo'";
	$dberror = "";
	$ret = mysql_query($query_update);                     

//get time
//my SQL query strings
	$query_timezone = "SELECT * FROM Company";
	@$result_time = mysql_query($query_timezone);
	@$numRows_time = mysql_num_rows($result_time);
$time_row = mysql_fetch_array($result_time);

$timezone = $time_row['CompanyTimeZone'];
$split = $time_row['CompanySplit'];
$companyurl = $time_row['CompanyURL'];
$companynoreplyemail = $time_row['CompanyNoReplyEmail'];
$companyamount = $orderAmount * $split;
$orderAmount = $orderAmount - $companyamount;
if ($time_row['CharityEnabled']=='Yes'){
	$charityamount = $companyamount * $time_row['CompanyCharity'];
	$companyamount = $companyamount - $charityamount;
}
else
{
$charityamount = '0.00';
$companyamount = $companyamount - $charityamount;
}

$date = new DateTime("now", new DateTimeZone($time_row['CompanyTimeZone']) );
$now = $date->format('Y-m-d H:i:s');

//update email table for anyone who buys


//my SQL query strings

	$query_order = "SELECT * FROM Ticket WHERE OrderNumber='$orderNo'";
	@$result_order = mysql_query($query_order);
	@$numRows_order = mysql_num_rows($result_order);
	$o_row = mysql_fetch_array($result_order);
	$raffle = $o_row['Raffle'];
	$contest = $o_row['ContestID'];
	$query_update = "UPDATE Ticket SET Status = 'paid' WHERE OrderNumber= '$orderNo'";
	$dberror = "";
	$ret = mysql_query($query_update);
	echo $raffle;
	
	if ($raffle=='yes'){
		
		
	
	
	
	
	$query_selectAllItems = "SELECT * FROM Raffle WHERE RaffleID= '$contest' AND  RaffleStatus = 'open'";
	echo $query_selectAllItems;
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$c_row = mysql_fetch_array($result_all);


  // update
    
	$amount=$c_row['Amount']+$orderAmount;
	$company=$c_row['CompanyAmount']+$companyamount;
	$charity=$c_row['CharityAmount']+$charityamount;
	//"SELECT * FROM ContestAmount WHERE '$now' between DrawingStart and DrawingEnd";
	$query_update = "UPDATE Raffle SET Amount = '$amount', CompanyAmount = '$company', CharityAmount = '$charity' WHERE RaffleID= '$contest'";
	$dberror = "";
	$ret = mysql_query($query_update);
	
	
	
	
	}
	
	else {
		
	$contest=$o_row['ContestID'];
	
	$query_selectAllItems = "SELECT * FROM ContestAmount WHERE ContestID= '$contest' AND '$now' between DrawingStart and DrawingEnd and Status = 'open'";
	@$result_all = mysql_query($query_selectAllItems);
	@$numRows_all = mysql_num_rows($result_all);
	$c_row = mysql_fetch_array($result_all);
        $jackpot=$c_row['Amount'];
        
$query_contestamount = "SELECT Max FROM Contest WHERE ContestID= '$contest'";
        @$result_amount = mysql_query($query_contestamount);
	@$contestamount = mysql_num_rows($result_amount);
	$amount_row = mysql_fetch_array($result_amount);
        
  if ($c_row['Amount'].$amount_row['Max']){
      
     $to      = 'derek.baehr@gmail.com';
$subject = 'Contest over max!';
$message = 'we sold over max ' ;
mail($to, $subject, $message);

$query_order = "SELECT DISTINCT (EmailAddress) AS EmailAddress FROM Email";
	$result_order = mysql_query($query_order);
      
      while ($row = mysql_fetch_array($result_order)){
	  $email_to = ($row['EmailAddress']);
	  $submitter = ($row['Submitter']);

	$to = $email_to; 
    $from = $companynoreplyemail;
    $subject = "The Drawing has sold more than our set limit! "; 


//We are sending this email to say no winners
   $message = '<html><head>';
    $message .='<style type="text/css" media="all">@import "css/master.css";</style>  <style type="text/css" media="all">@import "css/style.css";</style>';
	$message .= '<title>Someone always wins.</title>';
    $message .= '</head>';
    $message .= '<body bgcolor="#FFFFFF"><center>';
    $message .= '<table width="100%" height="300" bgcolor="#FFFFFF"><tr><td>';
    $message .= '<table>';
    $message .= '<tr><td><font color="#000000"><b>We sold over our set limit of the jackpot set for todays draw!!!  The jackpot is now at '.$jackpot.'<br><br>Go to '.$companyurl.' to buy yours today and GOOD LUCK to all who enter!</b></td><td></td></tr>';
	$message .= '<tr><td><font color="#000000">Remember, there is a single winning ticket guaranteed every draw!<br><br></td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br>You can win today, buy some tickets now!!</td></tr>';
	$message .= '<tr><td><font color="#000000"><br><br><br>If you do not wish to receive these emails, please click <a href=https://'.$companyurl.'/optout.php?email='.$email_to.'>here</a></td></tr>';
	$message .= '</table></td></tr><tr><td>';
    $message .= '</table></body></html>';
	
	

	$headers = "From: $from\r\n"; 
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers); 
  }
      
      
  }
        

  // update
	$amount=$c_row['Amount']+$orderAmount;
	$company=$c_row['CompanyAmount']+$companyamount;
	$charity=$c_row['CharityAmount']+$charityamount;
	//"SELECT * FROM ContestAmount WHERE '$now' between DrawingStart and DrawingEnd";
	$query_update = "UPDATE ContestAmount SET Amount = '$amount', CompanyAmount = '$company', CharityAmount = '$charity' WHERE ContestID= '$contest' AND '$now' between DrawingStart and DrawingEnd";
	$dberror = "";
	$ret = mysql_query($query_update);	
		
	}

//We are sending mail to ourself to see when this page is called.
$to      = 'derek.baehr@gmail.com';
$subject = 'Postback received from AlliedWallet';
$message = 'POST: ' . print_r($_POST, true) . 'GET' . print_r($_GET, true) . 'Server: ' . print_r($_SERVER,true);
mail($to, $subject, $message);


                      
        

include("include/conn.php");

//$ordernumber=$_GET['MerchantReference'];


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
                <table width="900"><tr align="center"><td>
  
      <b><h2>Thank you for playing <? print $company ?>!!</h2></b><br><br>
      
      Here are your ticket numbers:<br><br>

                 <?php
	
		
	$query_order = "SELECT * FROM Ticket WHERE OrderNumber='$orderNo'";
	$result_order = mysql_query($query_order);
	
	//We are sending mail to customer to give them ticket numbers.
	
$subject = 'Here are your ticket numbers!';
$message = "Thank you for joining GimmeMunny!  Here are your ticket numbers, and Good Luck!!\n";

	
//output each ticket
  while ($row = mysql_fetch_array($result_order)){
$message = $message . 'TicketNumber:  ' . ($row['TicketNumber']) . "\n";
echo ($row['TicketNumber']) . "<br>";
 	$email = ($row['Email']);
	$to      = $email;
  }
 
	mail($to, $subject, $message);


?>
</td></tr></table><br>
                    <? echo $message ?><br>
                    
You will be receiving an email with these in a moment.  Please watch your emails for the winner's announcement!<br>

<br>

Gimmemunny.com is U.K. an E.U. based online wagering company and is the world's first and ONLY fully automated online 50/50 eRaffle draw. Gimmemunny.com GUARANTEES A SINGLE WINNING TICKET is randomly and electronically drawn from each draw every time. Gimmemunny.com is NOT a lottery. In certain circumstances lotteries might not have a winning ticket for weeks and winnings at times may have multiple ticket winners - with gimmemunny.com - we only ever have a single winning ticket each draw - GUARANTEED! <br><br>

Additionally, Gimmemunny.com donates a portion of our ticket sales to various children's healthcare charities; and as such, we provide an accurate and up to date window to present how much we have donated. This charity window is directly linked in real-time to each ticket purchase and we keep a running tab online. Upon written request we can provide which children's charity and how much we have donated. At Gimmemunny.com our mission is "To make people wealthy, while keeping children healthy". Whether you are in Real Estate, Pawn Shop, Jewellery, Automotive Restoration, Professional Sports, Amateur Sports or Charity Organization - click on the "Contact US" button and email our Franchisee Group or Charity Sales group to discuss acquiring your own software license. In some circumstances we can assist you with financing.


  </div>
  
  </center>
       
       
       
       

 <div class="separator"></div>
 

 
 
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
                      
                                }else{
                        /* payment fail,update orderInfo */
                       //echo 'fail'.$orderInfo;
                      $message = $orderInfo;
                      
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

        
  </HEAD>
<body>

<div id="menuheader"> 
<a href="index.php" onmouseover="document.rollover.src=button2.src" onmouseout="document.rollover.src=button1.src"><img src="images/home.png" border=0 name="rollover"></a>
<a href="about.php" onmouseover="document.rollover2.src=button4.src" onmouseout="document.rollover2.src=button3.src"><img src="images/about.png" border=0 name="rollover2"></a>
<a href="contact.php" onmouseover="document.rollover4.src=button8.src" onmouseout="document.rollover4.src=button7.src"><img src="images/contact.png" border=0 name="rollover4"></a><br>
 <a href="contact.php" onmouseover="document.rollover5.src=button10.src" onmouseout="document.rollover5.src=button9.src"><img src="images/tell.png" border=0 name="rollover4"></a><br>



</div>

                            


        <div id="logo">
<a href="index.php"><img src="images/logos.png" border="0"/></a>
        </div><br><br><br>
        
         <div class="content_images"><img src="images/images.png"></div>
        

 


        
       
        
        <div id="content_holder">
        <center>
                <div class="drop-shadow-content3 raised">
                <table width="900"><tr align="center"><td>
  

</td></tr></table><br>
                    <? echo $message ?><br>
                    
Sorry, your transaction was declined.  Please try again.<br>

<br>

Gimmemunny.com is U.K. an E.U. based online wagering company and is the world's first and ONLY fully automated online 50/50 eRaffle draw. Gimmemunny.com GUARANTEES A SINGLE WINNING TICKET is randomly and electronically drawn from each draw every time. Gimmemunny.com is NOT a lottery. In certain circumstances lotteries might not have a winning ticket for weeks and winnings at times may have multiple ticket winners - with gimmemunny.com - we only ever have a single winning ticket each draw - GUARANTEED! <br><br>

Additionally, Gimmemunny.com donates a portion of our ticket sales to various children's healthcare charities; and as such, we provide an accurate and up to date window to present how much we have donated. This charity window is directly linked in real-time to each ticket purchase and we keep a running tab online. Upon written request we can provide which children's charity and how much we have donated. At Gimmemunny.com our mission is "To make people wealthy, while keeping children healthy". Whether you are in Real Estate, Pawn Shop, Jewellery, Automotive Restoration, Professional Sports, Amateur Sports or Charity Organization - click on the "Contact US" button and email our Franchisee Group or Charity Sales group to discuss acquiring your own software license. In some circumstances we can assist you with financing.


  </div>
  
  </center>
       
       
       
       

 <div class="separator"></div>
 

 
 
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
                      
                      
                  }
            }else{
                $message = $orderInfo;
                  //Encryption validate failure
                
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

        
  </HEAD>
<body>

<div id="menuheader"> 
<a href="index.php" onmouseover="document.rollover.src=button2.src" onmouseout="document.rollover.src=button1.src"><img src="images/home.png" border=0 name="rollover"></a>
<a href="about.php" onmouseover="document.rollover2.src=button4.src" onmouseout="document.rollover2.src=button3.src"><img src="images/about.png" border=0 name="rollover2"></a>
<a href="contact.php" onmouseover="document.rollover4.src=button8.src" onmouseout="document.rollover4.src=button7.src"><img src="images/contact.png" border=0 name="rollover4"></a><br>
 <a href="contact.php" onmouseover="document.rollover5.src=button10.src" onmouseout="document.rollover5.src=button9.src"><img src="images/tell.png" border=0 name="rollover4"></a><br>



</div>

                            


        <div id="logo">
<a href="index.php"><img src="images/logos.png" border="0"/></a>
        </div><br><br><br>
        
         <div class="content_images"><img src="images/images.png"></div>
        

 


        
       
        
        <div id="content_holder">
        <center>
                <div class="drop-shadow-content3 raised">
                <table width="900"><tr align="center"><td>
  

</td></tr></table><br>
                    <? echo $message ?><br>
Sorry, your transaction was declined.  Please try again.<br>

<br>

Gimmemunny.com is U.K. an E.U. based online wagering company and is the world's first and ONLY fully automated online 50/50 eRaffle draw. Gimmemunny.com GUARANTEES A SINGLE WINNING TICKET is randomly and electronically drawn from each draw every time. Gimmemunny.com is NOT a lottery. In certain circumstances lotteries might not have a winning ticket for weeks and winnings at times may have multiple ticket winners - with gimmemunny.com - we only ever have a single winning ticket each draw - GUARANTEED! <br><br>

Additionally, Gimmemunny.com donates a portion of our ticket sales to various children's healthcare charities; and as such, we provide an accurate and up to date window to present how much we have donated. This charity window is directly linked in real-time to each ticket purchase and we keep a running tab online. Upon written request we can provide which children's charity and how much we have donated. At Gimmemunny.com our mission is "To make people wealthy, while keeping children healthy". Whether you are in Real Estate, Pawn Shop, Jewellery, Automotive Restoration, Professional Sports, Amateur Sports or Charity Organization - click on the "Contact US" button and email our Franchisee Group or Charity Sales group to discuss acquiring your own software license. In some circumstances we can assist you with financing.


  </div>
  
  </center>
       
       
       
       

 <div class="separator"></div>
 

 
 
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
                
                
                
            }
 ?>
            
</body>
</HTML>