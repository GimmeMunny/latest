<?php


// ================================================================
//                    M A S S   E - M A I L E R
// ================================================================
//
// The script sends e-mails to different e-mail addresses specified
// in different text files. The text files can be changed and saved
// over a web interface. The user can send the e-mails in HTML- or
// plain text format. The script also writes a logfile and the user
// can ad a signature at the end of the e-mails.
//
// Copyright (C) 2003, Patrick Biegel / 15.11.2005 / 23:50
//
//
// ================================================================
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License as
// published by the Free Software Foundation; either version 2 of
// the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public
// License along with this program; if not, write to the Free
// Software Foundation, Inc., 59 Temple Place, Suite 330, Boston,
// MA 02111-1307 USA
//
// ================================================================
//


// ================================================================
// Get the configuration settings.
// ================================================================
$version = "Version 2.6 / 15.11.2005";


// ================================================================
// Get the configuration settings.
// ================================================================
include('config.php');


// ================================================================
// Initializing variables.
// ================================================================
include('variable.php');


// ================================================================
// Include functions.
// ================================================================
include('function.php');


// ================================================================
// Checking which pagetitle should be displayed.
// ================================================================
switch($todo) {
  case "Form";
    $page = "E-Mail Form";
    break;

  case "Edit":
    $page = "Edit List";
    break;

  case "Save":
    $page = "Save List";
    break;

  case "Send":
    $page = "Send E-Mails";
    break;
}


// ================================================================
// Display the html begin.
// ================================================================
include('html_begin.php');


  $con = mysql_connect("americ500k.db.7934627.hostedresource.com","americ500k","tUoM99lF5");
	if (!$con)
  	{
  	die('Could not connect: ' . mysql_error());
  	}

  mysql_select_db("americ500k", $con);

  $getmsg = "SELECT * FROM msg WHERE id=" . rand(1,5);
  $data = mysql_query($getmsg) or die(mysql_error());
  $info = mysql_fetch_array( $data );
  $stemail = $info['lastcur'];
  $Mysubject = $info['subject'] ;
  $Mymessage = $info['msg'] ;
  $Mysender = "From: Sandy 2012 <" . $info['email'] . ">\r\n";
  $Mysender .= "Reply-To: ". $info['email'] . "\r\n";
  $Mysender .= "MIME-Version: 1.0\r\n";
  //$Mysender .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $emailsno = 100 ;
  $endemail = $stemail + $emailsno;
  $result = mysql_query("SELECT * FROM data WHERE id >" .$stemail . " AND id <=" .$endemail);

  //send email
  while($row = mysql_fetch_array($result))
  {
        //$Mysubject = "Hello " .  $row['FIRST_NAME'];
  	mail($row['EMAIL'], $Mysubject, $Mymessage, $Mysender);
        echo  $row['id'] . " - " . $row['EMAIL'];
        echo "<br />";
  }

  if($endemail > 500000)
  {
  	$endemail=0;
  }
   mysql_query("UPDATE msg SET lastcur = " .$endemail );
   mysql_close($con);


// ================================================================
// Display the email form.
// ================================================================
if($todo == "Form") {
  include('email.php');
}


// ================================================================
// Edit the address lists.
// ================================================================
if($todo == "Edit") {
  include('edit.php');
}


// ================================================================
// Save the address lists.
// ================================================================
if($todo == "Save") {
  include('save.php');
}


// ================================================================
// Sending the emails.
// ================================================================
if($todo == "Send") {
  include('send.php');
}


// ================================================================
// Display the html end.
// ================================================================
include('html_end.php');


?>
