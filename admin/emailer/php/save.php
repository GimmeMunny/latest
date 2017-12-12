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
// Initialize variable.
// ================================================================
$success = 0;


// ================================================================
// Specify the whole path to the address file.
// ================================================================
$address_path_file = $list_dir.$address_file;


// ================================================================
// Create the bigin of the save table.
// ================================================================
echo "<table class=\"savetable\" width=\"600\">\n";
echo "<tr>\n";
echo "<td>\n";


// ================================================================
// Check if the address file exists.
// ================================================================
if (@file_exists($address_path_file)) {


  // ==============================================================
  // Try to open the selected address file.
  // ==============================================================
  $open_address_file = @fopen ($address_path_file, "w");
  if($open_address_file == true) {
    $success = 1;
  } else {


    // ============================================================
    // Message that the address file could not be opened.
    // ============================================================
    echo "The file <strong>\"".$address_path_file."\"</strong> could not be opened !<br>\n";
  }
} else {


  // ==============================================================
  // Message that the address file does not exist.
  // ==============================================================
  echo "There is no file <strong>\"".$address_path_file."\"</strong> !<br>\n";
}
echo "</td>\n";
echo "</tr>\n";


// ================================================================
// Write data in to the address file.
// ================================================================
if ($success == 1) {
  echo "<tr>\n";
  echo "<td>\n";
  if (!@fwrite($open_address_file, $email_recipient)) {


    // ============================================================
    // Message that the data can not be written to the address
    // file.
    // ============================================================
    echo "Cannot write to file <strong>\"".$address_path_file."\"</strong> !<br>\n";
    echo "</td>\n";
    echo "</tr>\n";
    echo "<tr>\n";
    echo "<td>\n";
    echo "Please check the file permissions !\n";
    echo "</td>\n";
    echo "</tr>\n";
  } else {


    // ============================================================
    // Message that the data could successfully be written to the
    // address file.
    // ============================================================
    echo "The file <strong>\"".$address_path_file."\"</strong> was saved successfully !\n";
  }
  echo "</td>\n";
  echo "</tr>\n";


  // ==============================================================
  // Close the address file.
  // ==============================================================
  echo "<tr>\n";
  echo "<td>\n";
  if(!@fclose ($open_address_file)) {


    // ============================================================
    // Message that the address file could not be closed.
    // ============================================================
    echo "The file <strong>\"".$address_path_file."\"</strong> could not be closed !<br>\n";
  }


  // ==============================================================
  // Display the table end.
  // ==============================================================
  echo "</td>\n";
  echo "</tr>\n";
  echo "</table>\n";
}