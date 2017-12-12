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
// If the variable $todo is not set or set we set it to "Form" so
// that the email form will be displayed.
// ================================================================
if(isset($_POST['todo'])) {
  $todo = $_POST['todo'];
} else {
  $todo = "Form";
}


// ================================================================
// Get the variables from the email form.
// ================================================================
if(isset($_POST['address_file'])) {
  $address_file = $_POST['address_file'];
}
if(isset($_POST['special_file'])) {
  $special_file = $_POST['special_file'];
}
if(isset($_POST['wait_time'])) {
  $wait_time = $_POST['wait_time'];
}
if(isset($_POST['email_format'])) {
  $email_format = $_POST['email_format'];
} elseif ($todo == 'Send' || $todo == 'Edit') {
  $email_format = 'text';
}
if(isset($_POST['email_sender'])) {
  $email_sender = $_POST['email_sender'];
}
if(isset($_POST['email_confirmation'])) {
  $email_confirmation = $_POST['email_confirmation'];
}
if(isset($_POST['email_subject'])) {
  $email_subject = $_POST['email_subject'];
}
if(isset($_POST['email_message'])) {
  $email_message = $_POST['email_message'];
}


// ================================================================
// Get the variables from the edit form.
// ================================================================
if(isset($_POST['email_recipient'])) {
  $email_recipient = $_POST['email_recipient'];
}


?>