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
// CONFIGURATION BEGIN
// ================================================================


// ================================================================
// If $demo_mode is set to 1 there will be sent just a confirmation
// message to the address you specified for the variable
// "$default_email_confirmation". All other e-mails will not be
// sent ! This mode is only for installation and testing. Normally
// this setting should be set to 0 (disabled).
// ================================================================
$demo_mode = 0;


// ================================================================
// Enables  the debug mode to show the variable values in a table.
// First the values before running the script are displayed in a
// table and then after the script the values after running the
// script are displayed. So you can see what changes the script
// made to the values of each variable. There are allways just
// displayed the variables which contain a value. The other
// variables are hidden. This mode is just for debugging. Normally
// this setting should be set to 0 (disabled).
// ================================================================
$debug_mode = 0;


// ================================================================
// If you have enabled the debug mode you can here choose if you
// want the settings from this configuration file displayed on the
// screen. Normally this setting should be set to 0 (disabled).
// ================================================================
$conf_settings = 0;


// ================================================================
// Enables or disables writing to the logfile. If you want to have
// written a logfile you have to set this setting to 1. Normally
// this setting should be set to 1 (enabled).
// ================================================================
$log_file = 1;


// ================================================================
// Enables or disables the detail messages when emails are sent.
// If this setting is set to 1 then for every email which is sent
// you will get about 3 messages, so if you send 1000 emails you
// will get 3000 messages on the screen and in the logfile. If you
// set this setting to 0 then just error messages and a a little
// report about how many emails were sent will be displayed.
// Normally this setting should be set to 0 (disabled).
// ================================================================
$detail_messages = 0;


// ================================================================
// Type of writing to the logfile. If you choose "append", every
// log is just added to the existing logfile. So the logfile will
// get bigger and bigger. Better is if you choose "overwrite" so
// every log overwrites the log before. Normally this setting
// should be set to "overwrite".
// ================================================================
$log_type = 'overwrite';


// ================================================================
// This setting specifies the time for a break between each email
// when sending. This can be necessary, depends on your mailserver.
// The time has to be in seconds but you can specify "0.1" so
// there will be a break of 1/10 of a second between the emails.
// Normally this setting should be set to 0 (disabled).
// ================================================================
$default_wait_time = 0;


// ================================================================
// Here you can choose which address list is selected per default.
// If you select 4 then on the email form the list number 4 will
// be selected as default.
// ================================================================
$default_address_list = 1;


// ================================================================
// Here you can choose the default e-mail address of the sender.
// Normally this is your email address.
// ================================================================
$default_email_sender = "robert.newton@example.com";


// ================================================================
// Here you can choose the address for the confirmation e-mail.
// Normally this is also your email address.
// ================================================================
$default_email_confirmation = "robert.newton@example.com";


// ================================================================
// Here you can choose the default value of the email subject
// which is displayed on the email form.
// ================================================================
$default_email_subject = "Information";


// ================================================================
// Here you have to specify the path to the list directory.
// Normally you dont have to change this setting "../lists/".
// ================================================================
$list_dir = "../lists/";


// ================================================================
// Here you have to specify the path to the logfile. This includes
// the name of the logfile. Normally you dont have to change this
// setting "../log/emailer.txt".
// ================================================================
$log_path = "../log/emailer.txt";


// ================================================================
// Here you can choose the default email format (text / html).
// ================================================================
$default_email_format = 'text';


// ================================================================
// Here you have to specify the names of the address files.
// ================================================================
$file[0] = "post.txt";



// ================================================================
// Here you can specify a signature which will be attached to each
// email. If you want a blank line you have to put a space " "
// there !
// ================================================================
$signature[0] = " ";


// ================================================================
// Here we can set the php timeout limit. If the value is set to 0
// then there is no limit set with "set_time_limit()".
// ================================================================
set_time_limit(0);


// ================================================================
// CONFIGURATION END
// ================================================================


?>
