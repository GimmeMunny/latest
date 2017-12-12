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
// Check if the logfile exists.
// ================================================================
if ($log_file == 1) {


  // ==============================================================
  // Try to open the log file.
  // ==============================================================
  $open_log_file = @fopen($log_path, 'a');
  if($open_log_file == true) {


    // ============================================================
    // Writing the header of the log file.
    // ============================================================
    $message  = "\n\n";
    $message .= "====================================================================\n";
    $message .= "= Mass E-Mailer Debug-File  |  Date: ".date('d.m.Y')."  |  Time: ".date('H:i:s')." =\n";
    $message .= "====================================================================\n";
    $message .= "\$page: ".$page."\n";
    writelog('l');
  }
}


// ================================================================
// Create the begin of the debug table.
// ================================================================
echo "<br>\n";
echo "<hr>\n";
echo "<br>\n";
echo "<table class=\"debugtable\" width=\"700\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
echo "<tr>\n";
echo "<td colspan=\"2\" class=\"debugtitle\">\n";
echo $page."\n";
echo "</td>\n";
echo "</tr>\n";


// ================================================================
// Create the array for storing the variables which have to be
// displayed on the debug screen. If a variable is not set it will
// not be displayed.
// ================================================================
if(isset($version) && $version != "" && $conf_settings == 1) {
  $variable_array['$version'] = $version;
}
if(isset($page) && $page != "" && $conf_settings == 1) {
  $variable_array['$page'] = $page;
}
if(isset($demo_mode) && $demo_mode != "" && $conf_settings == 1) {
  $variable_array['$demo_mode'] = $demo_mode;
}
if(isset($debug_mode) && $debug_mode != "" && $conf_settings == 1) {
  $variable_array['$debug_mode'] = $debug_mode;
}
if(isset($conf_settings) && $conf_settings != "" && $conf_settings == 1) {
  $variable_array['$conf_settings'] = $conf_settings;
}
if(isset($log_file) && $log_file != "" && $conf_settings == 1) {
  $variable_array['$log_file'] = $log_file;
}
if(isset($detail_messages) && $detail_messages != "" && $conf_settings == 1) {
  $variable_array['$detail_messages'] = $detail_messages;
}
if(isset($log_type) && $log_type != "" && $conf_settings == 1) {
  $variable_array['$log_type'] = $log_type;
}
if(isset($default_wait_time) && $default_wait_time != "" && $conf_settings == 1) {
  $variable_array['$default_wait_time'] = $default_wait_time;
}
if(isset($default_address_list) && $default_address_list != "" && $conf_settings == 1) {
  $variable_array['$default_address_list'] = $default_address_list;
}
if(isset($default_email_sender) && $default_email_sender != "" && $conf_settings == 1) {
  $variable_array['$default_email_sender'] = $default_email_sender;
}
if(isset($default_email_confirmation) && $default_email_confirmation != "" && $conf_settings == 1) {
  $variable_array['$default_email_confirmation'] = $default_email_confirmation;
}
if(isset($default_email_subject) && $default_email_subject != "" && $conf_settings == 1) {
  $variable_array['$default_email_subject'] = $default_email_subject;
}
if(isset($list_dir) && $list_dir != "" && $conf_settings == 1) {
  $variable_array['$list_dir'] = $list_dir;
}
if(isset($log_path) && $log_path != "" && $conf_settings == 1) {
  $variable_array['$log_path'] = $log_path;
}
if(isset($default_email_format) && $default_email_format != "" && $conf_settings == 1) {
  $variable_array['$default_email_format'] = $default_email_format;
}
for($counter = 0; $counter < 10; $counter++) {
  if(isset($file[$counter]) && $file[$counter] != "" && $conf_settings == 1) {
    $variable_array['$file['.$counter.']'] = $file[$counter];
  }
}
for($counter = 0; $counter < 10; $counter++) {
  if(isset($signature[$counter]) && $signature[$counter] != "" && $conf_settings == 1) {
    $variable_array['$signature['.$counter.']'] = $signature[$counter];
  }
}
if(isset($address_file) && $address_file != "") {
  $variable_array['$address_file'] = $address_file;
}
if(isset($special_file) && $special_file != "") {
  $variable_array['$special_file'] = $special_file;
}
if(isset($wait_time) && $wait_time != "") {
  $variable_array['$wait_time'] = $wait_time;
}
if(isset($email_format) && $email_format != "") {
  $variable_array['$email_format'] = $email_format;
}
if(isset($email_sender) && $email_sender != "") {
  $variable_array['$email_sender'] = $email_sender;
}
if(isset($email_confirmation) && $email_confirmation != "") {
  $variable_array['$email_confirmation'] = $email_confirmation;
}
if(isset($email_subject) && $email_subject != "") {
  $variable_array['$email_subject'] = $email_subject;
}
if(isset($email_message) && $email_message != "") {
  if(strlen($email_message) > 45) {
    $e_message = substr($email_message, 0, 45)." ...";
  } else {
    $e_message = $email_message;
  }
  $variable_array['$email_message'] = $e_message;
}
if(isset($email_recipient) && $email_recipient != "") {
  $position = stripos(trim($email_recipient), "\n");
  if($position == false) {
    $e_recipient = $email_recipient;
  } else {
    $e_recipient = substr($email_recipient, 0, $position-1)." ...";
  }
  $variable_array['$email_recipient'] = $e_recipient;
}
if(isset($todo) && $todo != "") {
  $variable_array['$todo'] = $todo;
}
if(isset($address_path_file) && $address_path_file != "") {
  $variable_array['$address_path_file'] = $address_path_file;
}


// ================================================================
// Sorting the array.
// ================================================================
ksort($variable_array);


// ================================================================
// Set the array pointer to the begin of the array.
// ================================================================
reset($variable_array);


// ================================================================
// Print the contents of the array.
// ================================================================
while (list($key, $val) = each($variable_array)) {


  // ==============================================================
  // Trim the value and set the appropriate spaces.
  // ==============================================================
  $val = str_replace("\n", "", $val);
  $val = str_replace("\r", "", $val);

  $s_val = trim($val);
  $s_val = str_replace(" ", "&nbsp;", $val);

  $l_val = str_replace("&nbsp;", " ", $val);
  $l_val = trim($val);


  // ==============================================================
  // Show the variable with the value.
  // ==============================================================
  echo "<tr>\n";
  echo "<td class=\"debugleft\">\n";
  echo $key."\n";
  echo "</td>\n";
  echo "<td class=\"debugright\">\n";
  echo $s_val."\n";
  echo "</td>\n";
  echo "</tr>\n";


  // ==============================================================
  // Create the message for the logfile.
  // ==============================================================
  $message = $key." = ".$l_val."\n";


  // ==============================================================
  // Write message to the logfile if the logfile is open.
  // ==============================================================
  if($open_log_file == true) {
    writelog('l');
  }
}



// ================================================================
// If the logfile is open, close it.
// ================================================================
if($open_log_file == true) {
  if(!@fclose($open_log_file)) {
    echo "The logfile <strong>\"".$log_path."\"</strong> could not be closed !<br>";
  }
}


// ================================================================
// Create the end of the debug table.
// ================================================================
echo "<tr>\n";
echo "<td colspan=\"2\" class=\"debughint\">\n";
echo "To disable this debugscreen, please set the option \"debug_mode = 0\" in the configuration section !\n";
echo "</td>\n";
echo "</tr>\n";
echo "</table>\n";
echo "<br>\n";
echo "<hr>\n";
echo "<br>\n";


?>