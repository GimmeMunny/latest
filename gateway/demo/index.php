<?php
	/***********************************************************************	
		Note: 1.用来获取csid的值的 javascript 必须放在 form的下面
			  2.<input name="csid"    type="hidden" id='csid'> 的 id值必须也是 csid
	************************************************************************/
       /* $merNo            = "33423"; //MerchantNo.
 
      $gatewayNo        = "33423001"; //GatewayNo.

      $signkey          = "f24h6FH8"; //SignKey*/

    $merNo            = "20367"; //MerchantNo.
 
      $gatewayNo        = "20367001"; //GatewayNo.

      $signkey          = "T088th40"; //SignKey





		//payment Method
		$paymentMethod = "Credit Card";

		//firstname
		$firstName     = "jack";
		
		//lastname
		$lastName      = "buckle";

		//email
		$email         = "jacknbuckle123@gmail.com";

		//phone
		$phone         = "1388888888";

		
		//order No.
		$num = mt_rand(1,10000);
		$orderNo       = $num;
		
		//order Currency
		$orderCurrency = "USD";
		
		//order Amount
		$orderAmount   = "2.00";
		
		// Transaction Url
		$returnUrl     = "http://beevip.com/post.php"; 

		//remark
		$remark        = "remark";

		//billing country
		$country       = "canada";
		
		//billing state
		$state         = "bradford";
		
		//billing city
		$city          = "ontario";
		
		//billing address
		$address       = "76 wyman crescent";
		
		//billing zip
		$zip           = "L3z3j6";
		
		//customer's IP
		$ip 		   = '109.203.126.124';  

		$interfaceInfo='mystore';
		
		//
        //$cardNo ='4342561974869471';
        $cardNo ='4520157334242717';
		//$cardNo ='5165110021052383';

		//
		$cardExpireMonth = '03';
		//
		$cardExpireYear = '2021';
		//
		$cardSecurityCode = '572';
		//
		$issuingBank = 'abc bank';

		
			 

?>

<form  method="post" name='creditcard_checkout' action='demo1.2.php'>
         <input name="merNo"    value="<?php echo $merNo;?>"  type="hidden">
    <input name="gatewayNo"    value="<?php echo $gatewayNo;?>"  type="hidden">
    <input name="signkey"    value="<?php echo $signkey;?>"  type="hidden">

      <input name="orderNo"           value="<?php echo $orderNo;?>" type="hidden">
      <input name="orderCurrency"     value="<?php echo $orderCurrency;?>" type="hidden">    
      <input name="orderAmount"       value="<?php echo $orderAmount;?>" type="hidden">	
      <input name="returnUrl"         value="<?php echo $returnUrl;?>" type="hidden">
      <input name="ip"          	  value="<?php echo $ip;?>" type="hidden">
      <input name="firstName"         value="<?php echo $firstName;?>" type="hidden">
      <input name="lastName"          value="<?php echo $lastName;?>" type="hidden">
      <input name="email"             value="<?php echo $email;?>" type="hidden">
      <input name="phone"             value="<?php echo $phone;?>" type="hidden">
	  <input name="remark"            value="<?php echo $remark;?>" type="hidden">
	  <input name="paymentMethod"     value="<?php echo $paymentMethod;?>" type="hidden">
      <input name="country"           value="<?php echo $country;?>" type="hidden">
      <input name="cardNo"            value="<?php echo $cardNo;?>" type="hidden">
      <input name="state"             value="<?php echo $state;?>" type="hidden">
      <input name="city"              value="<?php echo $city;?>" type="hidden">
      <input name="address"           value="<?php echo $address;?>" type="hidden">
      <input name="cardExpireMonth"   value="<?php echo $cardExpireMonth;?>" type="hidden">
      <input name="cardExpireYear"    value="<?php echo $cardExpireYear;?>" type="hidden">
      <input name="cardSecurityCode"  value="<?php echo $cardSecurityCode;?>" type="hidden">
      <input name="zip"               value="<?php echo $zip;?>" type="hidden">
	  <input name="issuingBank"       value="<?php echo $issuingBank;?>" type="hidden">
	 
	  <input name="interfaceInfo"     value="<?php echo $interfaceInfo;?>" type="hidden">
	  <input  type='submit' value='submit' />
</form>	


<script type='text/javascript' charset='utf-8' src='https://shoppingingstore.com/pub/sps.js'></script>