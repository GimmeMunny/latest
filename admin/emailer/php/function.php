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
// This function is used to store the log messages into the
// logfile and print the message on the screen.
// ================================================================
function writelog($type) {


  // ==============================================================
  // Specify the global variables.
  // ==============================================================
  global $message;
  global $open_log_file;
  global $log_file;


  // ==============================================================
  // We check if we have to write to the logfile.
  // ==============================================================
  if($type == 'l' || $type == 'b') {


    // ============================================================
    // We check if logging is enabled.
    // ============================================================
    if($log_file == 1) {


      // ==========================================================
      // Specify the html tags which have to be removed.
      // ==========================================================
      $pattern = array("<strong>", "</strong>");


      // ==========================================================
      // Remove html tags from the message.
      // ==========================================================
      $log_message = str_replace("<br>", "\n", $message);
      $log_message = str_replace($pattern, "", $log_message);


      // ==========================================================
      // Writing to the logfile.
      // ==========================================================
      if (!fwrite($open_log_file, $log_message)) {
        echo "Cannot write to the logfile !<br>\n";
      }
    }
  }


  // ==============================================================
  // We check if we have to write to the screen.
  // ==============================================================
  if($type == 's' || $type == 'b') {


    // ============================================================
    // Writing to the screen.
    // ============================================================
    echo $message."\n";
  }
}


?>
