<?php
//We are sending mail to ourself to see when this page is called.
$to      = 'derek@alliedwallet.com';
$subject = 'Postback received from AlliedWallet - Derek';
$message = 'POST: ' . print_r($_POST, true) . 'GET' . print_r($_GET, true) . 'Server: ' . print_r($_SERVER,true);
mail($to, $subject, $message);

if ($_POST['MerchantReference'])
                echo '1:success';
else
                echo '0:invalid request';
?>

<?= $message ?>
