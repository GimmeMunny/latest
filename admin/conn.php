<?php
$user = "gimmemun_databas";

$pass = "winter2017!!";

$db = "gimmemun_database";



$connect = mysql_connect( "localhost", $user, $pass );

if (! $connect )

	die("could not connect");

mysql_select_db($db, $connect )

	or die("couldnt open $db: ".mysql_error() );

?>