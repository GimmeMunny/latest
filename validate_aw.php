<?php

// Set this anytime before the mail() function is called
//ini_set('sendmail_from', 'user@domain.tld'); // Set only on Windows
//ini_set('SMTP', 'relay-hosting.secureserver.net');



$form_fname=$_POST['FirstName'];
$form_lname=$_POST['LasttName'];
$form_email=$_POST['email'];
$form_number1=$_POST['number1'];
$form_number2=$_POST['number2'];
$form_answer=$_POST['answer'];
$form_desc=$_POST['desc'];
$form_cost=$_POST['cost'];
$form_order=$_POST['order'];

$answer = $form_number1 + $form_number2;

if ($form_answer != $answer){
    
    header("Location: http://www.gimmemunny.com/buy.php");
    
}

elseif ($form_answer == $answer){

    

    
    
    header("Location: https://sale.alliedwallet.com/custompay.aspx?SiteID=93648a0f-6504-44ab-ad33-767cc6d78d1a&MerchantId=b5418e23-f5a7-4e0b-8834-c81c235af6b1&MerchantReference=$form_order&AmountTotal=$form_cost&CurrencyID=USD&AmountShipping=0.00&ShippingRequired=False&$string&NoMembership=1&FirstName=$form_fname&LastName=$form_lname&Email=$form_email&ItemName[0]=Ticket&ItemQuantity[0]=1&ItemDesc[0]=$form_desc&ItemAmount[0]=$form_cost&ConfirmURL=http://www.gimmemunny.com/confirm.php&ReturnURL=http://www.gimmemunny.com/return.php&DeclinedURL=http://www.gimmemunny.com/decline.php");
    
}

?>