<?php
$user = "gimmy";

$pass = "gimmy2000";

$db = "gimmy";



$connect = mysql_connect( "localhost", $user, $pass );

if (! $connect )

	die("could not connect");

mysql_select_db($db, $connect )

	or die("couldnt open $db: ".mysql_error() );

?>