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
// Initialize the email status.
// ================================================================
$status = 1;


// ================================================================
// Display title for the protocol.
// ================================================================
echo "<table class=\"sendtable\" width=\"600\">\n";
echo "<tr>\n";
echo "<td>\n";
echo "<hr>\n";


// ================================================================
// Specify the logtype.
// ================================================================
if($log_type == 'overwrite' && $debug_mode != 1) {
  $log_type = 'w';
} else {
  $log_type = 'a';
}


// ================================================================
// Check if logging is enabled.
// ================================================================
if ($log_file == 1) {


  // ==============================================================
  // Try to open the log file.
  // ==============================================================
  $open_log_file = @fopen($log_path, $log_type);
  if($open_log_file == true) {


    // ============================================================
    // Writing the header of the log file.
    // ============================================================
    if ($log_file == 1) {
      $message  = "\n\n";
      $message .= "====================================================================\n";
      $message .= "=  Mass E-Mailer Log-File  |  Date: ".date('d.m.Y')."  |  Time: ".date('H:i:s')."  =\n";
      $message .= "====================================================================\n";
      writelog('l');
    }


    // ============================================================
    // Message that the log file could be opened.
    // ============================================================
    $message = "The logfile <strong>\"".$log_path."\"</strong> was opened successfully !<br>";
    writelog('b');
  } else {


    // ============================================================
    // Message that the log file could not be opened.
    // ============================================================
    $message = "The logfile <b>\"".$log_path."\"</b> could not be opened !<br>";
    writelog('b');
    $log_file = 0;
  }
}


// ================================================================
// Message about the e-mail format.
// ================================================================
$message = "The E-Mails will be sent in format ";
if ($email_format == 'html') {
  $message .= "<strong>html</strong>.<br>";
} else {
  $message .= "<strong>plain text</strong>.<br>";
}
writelog('b');


// ================================================================
// Check if there is a special file to open or if it's necessary
// to choose a address list from the drop down menu.
// ================================================================
if ($special_file != "" && $special_file != "&nbsp;") {


  // ==============================================================
  // Message that there was an input in the special path field.
  // ==============================================================
  $message = "There was an input in the \"special path\" field ...<br><br>";
  $address_path_file = $special_file;
} else {


  // ==============================================================
  // Message that there was no input in the special path field.
  // ==============================================================
  $message = "There was no input in the \"special path\" field ... but that's ok.<br><br>";
  $address_path_file = $list_dir.$address_file;
}
writelog('b');


// ================================================================
// Try to open the selected address file.
// ================================================================
$message = "Try to open the addressfile <strong>\"".$address_path_file."\"</strong> ...<br>";
writelog('b');
if (@file_exists($address_path_file)) {


  // ==============================================================
  // Message that the address file was found.
  // ==============================================================
  $message = "The addressfile <strong>\"".$address_path_file."\"</strong> was found ...<br>";
  writelog('b');
  $open_address_file = @fopen ($address_path_file, "r");


  // ==============================================================
  // Try to open the address file.
  // ==============================================================
  if($open_address_file == true) {


    // ============================================================
    // Message that the address file could be opened.
    // ============================================================
    $message = "The addressfile <strong>\"".$address_path_file."\"</strong> was opened successfully !<br>";
  } else {


    // ============================================================
    // Message that the address file could not be opened.
    // ============================================================
    $message = "The addressfile <strong>\"".$address_path_file."\"</strong> could not be opened !<br>";
  }
  writelog('b');
} else {


  // ==============================================================
  // Message that the address file was not found.
  // ==============================================================
  $message = "There is no addressfile <strong>\"".$address_path_file."\"</strong> !<br>";
  writelog('b');
  $status = 0;
}


// ================================================================
// Prepare the signature for attaching it to the email message.
// ================================================================
if($email_format == 'html') {
  $linebreak = "<br>";
  $email_message .= "<br><br>";
} else {
	$linebreak = "\n";
  $email_message .="\r\n";
}


// ================================================================
// Put signature at the end of the message.
// ================================================================
$counter = 0;
for ($counter = 0;$counter <= 9;$counter++) {
	if($signature[$counter] != "") {
	  if($counter > 0) {
	    $email_message .= $linebreak;
	  }
	  $email_message .= $signature[$counter];
	}
}


// ================================================================
// Check if the address file exists.
// ================================================================
if (@file_exists($address_path_file)) {
  $counter = 0;


  // ==============================================================
  // Try to read the address file.
  // ==============================================================
  $message = "Trying to read the addressfile <strong>\"".$address_path_file."\"</strong> ...<br>";
  writelog('b');


  // ==============================================================
  // Header for sending emails in HTML format.
  // ==============================================================
  if($email_format == 'html') {
    $header = "Content-type: text/html\n";
  } else {
    $header = "Content-type: text/plain\n";
  }


  // ==============================================================
  // Prepare the rest of the header for the e-mail.
  // ==============================================================
  $header .= "From: ".$email_sender."\n";
  $header .= "Reply-To: ".$email_sender."\n";
  $header .= "Errors-To: ".$email_sender."\n";
  $header .= "X-Mailer: PHP / ".phpversion()."\n";


  // ==============================================================
  // Create test pattern.
  // ==============================================================
  $pattern = "#^[-!\#$%&\"*+\\./\d=?A-Z^_|'a-z{|}~]+";
  $pattern .= "@";
  $pattern .= "[-!\#$%&\"*+\\/\d=?A-Z^_|'a-z{|}~]+\.";
  $pattern .= "[-!\#$%&\"*+\\./\d=?A-Z^_|'a-z{|}~]+$#";


  // ==============================================================
  // Set the start time.
  // ==============================================================
  $start_time = time();


  // ==============================================================
  // Looping for reading line by line.
  // ==============================================================
  while (!feof($open_address_file)) {


    // ============================================================
    // Reads one line.
    // ============================================================
    $recipient = fgets($open_address_file, 1024);
    $recipient = trim($recipient);


    // ============================================================
    // If the address is not empty we display a message.
    // ============================================================
    if($recipient != "" && $detail_messages == 1) {
      $message = "<br>Reading the address <strong>\"".$recipient."\"</strong> ...<br>";
      writelog('b');
    }


    // ============================================================
    // Check if recipient E-Mail address is not empty.
    // ============================================================
    if($recipient != "") {


      // ==========================================================
      // Check if recipient E-Mail address is valid.
      // ==========================================================
      if(preg_match($pattern,$recipient)) {


        // ========================================================
        // Sending the e-mail to the recipient.
        // ========================================================
        if($detail_messages == 1) {
          $message = "Sending an E-Mail to <strong>\"".$recipient."\"</strong> ...<br>";
          writelog('b');
        }
        if($demo_mode != "1") {
          if(@mail($recipient, stripslashes($email_subject), stripslashes($email_message), stripslashes($header))) {
            $counter = $counter + 1;
            if($detail_messages == 1) {
              $message = "E-Mail <strong>\"".$counter."\"</strong> at ".date("H:i:s")." was sent successfully !<br>";
            }
          } else {
            $message = "E-mail message to <strong>\"".$recipient."\"</strong> could not be sent !<br>";
          }
          if($detail_messages == 1) {
            writelog('b');
          }
        } else {
          $counter = $counter + 1;
          if($detail_messages == 1) {
            $message = "E-Mail <strong>\"".$counter."\"</strong> at ".date("H:i:s")." was sent successfully (Testmode) !<br>";
            writelog('b');
          }
        }
      } else {
        $message = "<br>The recipient E-Mail address <strong>\"".$recipient."\"</strong> is not valid !<br>";
        writelog('b');
      }
    }


    // ============================================================
    // If necessary and the E-Mails can not send that fast here
    // is a loop to make a little break after all E-Mails.
    // ============================================================
    usleep($wait_time * 1000000);
  }


  // ==============================================================
  // Check if confirmation E-Mail address is not empty.
  // ==============================================================
  if($email_confirmation != "") {


    // ============================================================
    // Check if confirmation E-Mail address is valid.
    // ============================================================
    if(preg_match($pattern, $email_confirmation)) {


      // ==========================================================
      // Sending a confirmation E-Mail.
      // ==========================================================
      $message = "<br>Sending a confirmation E-Mail to <strong>\"".$email_confirmation."\"</strong> ...<br>";
      writelog('b');
      $email_subject = "Confirmation - ".$email_subject;
      if(@mail($email_confirmation, stripslashes($email_subject), stripslashes($email_message), stripslashes($header))) {
        $counter = $counter + 1;
        $message = "E-Mail <strong>\"".$counter."\"</strong> at ".date("H:i:s")." was sent successfully !<br>";
      } else {
        $message = "This E-Mail could not be sent !<br>";
      }
      writelog('b');
    } else {
      $message = "<br>The confirmation E-Mail address is not valid !<br>";
      writelog('b');
    }
  } else {
    $message = "<br>The confirmation E-Mail address is empty !<br>";
    writelog('b');
  }


  // ==============================================================
  // Set the end time.
  // ==============================================================
  $end_time = time();


  // ==============================================================
  // Close the address file.
  // ==============================================================
  if($open_log_file == true) {
    if(@fclose ($open_address_file)) {
      $message = "<br>The addressfile <strong>\"".$address_path_file."\"</strong> was closed successfully !<br>";
    } else {
      $message = "<br>The addressfile <strong>\"".$address_path_file."\"</strong> could not be closed !<br>";
    }
    writelog('b');
  }
} else {
  $message = "Could not read the addressfile <strong>\"".$address_path_file."\"</strong> ...<br>";
  writelog('b');
}



// ================================================================
// Check the status.
// ================================================================
if ($status == 1) {


  // ==============================================================
  // Message about the number of sent E-Mails.
  // ==============================================================
  $message = "Status: <strong>".$counter." E-Mails</strong> were sent !<br><br>";
  writelog('b');


  // ==============================================================
  // Message about the job time.
  // ==============================================================
  $diff_time = $end_time - $start_time;
  $minutes = floor($diff_time / 60);
  $seconds = $diff_time -($minutes * 60);
  $message = "The job has completed in ".$minutes." minutes and ".$seconds." seconds !<br>";
  writelog('b');


  // ==============================================================
  // Close the logfile.
  // ==============================================================
  if(@fclose($open_log_file)) {
    echo "<br>The logfile <strong>\"".$log_path."\"</strong> was closed successfully !<br>\n";
  } else {
    echo "<br>The logfile <strong>\"".$log_path."\"</strong> could not be closed !<br>\n";
  }
  echo "<hr>\n";
}


// ================================================================
// Display the table end.
// ================================================================
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";


?>
